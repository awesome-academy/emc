<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Mail;
use App\User;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\PaymentDetail;
use Illuminate\Support\Facades\Session;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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

    public function create(Request $request)
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
            $payment_detail = PaymentDetail::create($payment_detail);

            $order = [
                'id_user' => Auth::user()->id,
                'payment_detail_id' => $payment_detail->id,
                'total_price' => $cart->total_price,
                'status' => Order::PENDING,
            ];
            $order = Order::create($order);
            foreach ($cart->items as $item) {
                $product = Product::findOrFail($item['item']->id);
                $upQty['quantity'] = $product->quantity -= $item['qty'];
                Product::where('id', $item['item']->id)->update($upQty);

                $order_detail = [
                    'id_order' => $order->id,
                    'id_product' => $item['item']->id,
                    'name_product' => $item['item']->name,
                    'quantity' => $item['qty'],
                ];
                OrderDetail::create($order_detail);
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
        $orders = Order::where('id_user', '=' , Auth::user()->id)
            ->orderBy('id', 'DESC')->paginate($paginate);

        return view('orders.history', ['orders' => $orders]);
    }

    public function detail($id)
    {
        try {
            $order = Order::findOrFail($id);
            $payment_detail = PaymentDetail::where('id', '=', $order->payment_detail_id)->first();
            $order_details = OrderDetail::where('id_order', '=', $order->id)->get();

            return view('orders.detail', [
                'order' => $order,
                'paymentDetail' => $payment_detail,
                'orderDetails' => $order_details,
            ]);
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMessage());
        }
    }
}
