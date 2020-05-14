<?php

namespace App\Http\Controllers;

use Mail;
use App\Models\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\PaymentDetail;
use App\Http\Requests\PaymentDetailRequest;
use App\Repositories\Product\ProductRepositoryInterface;
use App\Repositories\Order\OrderRepositoryInterface;
use App\Repositories\OrderDetail\OrderDetailRepositoryInterface;
use App\Repositories\PaymentDetail\PaymentDetailRepositoryInterface;
use Illuminate\Support\Facades\ Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Exception;

class OrderController extends Controller
{
    protected $productRepo;
    protected $orderRepo;

    public function __construct(ProductRepositoryInterface $productRepo, 
                                OrderRepositoryInterface $orderRepo,
                                OrderDetailRepositoryInterface $orderDetailRepo,
                                PaymentDetailRepositoryInterface $paymentDetailRepo)
    {
        $this->middleware('auth');
        $this->productRepo = $productRepo;
        $this->orderRepo = $orderRepo;
        $this->orderDetailRepo = $orderDetailRepo;
        $this->paymentDetailRepo = $paymentDetailRepo;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            return view('orders.index');
        }
        $isset_cart = Session::get('cart');
        $cart = new Cart($isset_cart);

        return view('orders.index', [
            'products' => $cart->items,
            'totalPrice' => $cart->total_price,
        ]);
    }

    public function create(PaymentDetailRequest $request)
    {
        try {
            if (!Session::has('cart')) {
                return view('orders.index');
            }
            $cart = Session::get('cart');

            $payment_detail = [
                'name' => $request->name,
                'phone' => $request->phone,
                'address' => $request->address,
                'email' => $request->email,
                'desc' => $request->desc,
            ];
            $payment_detail = $this->paymentDetailRepo->create($payment_detail);

            $order = [
                'id_user' => Auth::user()->id,
                'payment_detail_id' => $payment_detail->id,
                'total_price' => $cart->total_price,
                'status' => Order::PENDING,
            ];
            $order = $this->orderRepo->create($order);
            foreach ($cart->items as $item) {
                $product = $this->productRepo->findOrFail($item['item']->id);
                $upQty['quantity'] = $product->quantity -= $item['qty'];
                $this->productRepo->update($item['item']->id, $upQty);
                $order_detail = [
                    'id_order' => $order->id,
                    'id_product' => $item['item']->id,
                    'name_product' => $item['item']->name,
                    'quantity' => $item['qty'],
                ];
                $this->orderDetailRepo->create($order_detail);
            }
            Mail::send('mails.order',[
                'items' => $cart->items,
                'totalPrice' => $cart->total_price,
            ], function($mail) use($payment_detail)
            {
                $mail->to($payment_detail['email'], $payment_detail['name']);
                $mail->from('fantasy11230@gmail.com');
                $mail->subject('Email Ordered');
            });
            Session::forget('cart');

            return view('orders.index', [
                'orderConfirm' => trans('home.order-confirm'),
                'payment_detail' => $payment_detail,
                'order' => $order,
            ]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMesseage());
        }
    }

    public function history()
    {
        $paginate = config('setting.paginate');
        $orders = $this->orderRepo->getOrderByUserId($paginate);

        return view('orders.history', ['orders' => $orders]);
    }

    public function detail($id)
    {
        try {
            $order = $this->orderRepo->findOrFail($id);
            $payment_detail = $this->paymentDetailRepo->findOrFail($order->payment_detail_id);

            return view('orders.detail', [
                'order' => $order,
                'paymentDetail' => $payment_detail,
            ]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
