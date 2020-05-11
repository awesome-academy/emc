<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use App\Repositories\Product\ProductRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Exception;

class CartController extends Controller
{
    protected $productRepo;

    public function __construct(ProductRepositoryInterface $productRepo)
    {
        $this->middleware('auth');
        $this->productRepo = $productRepo;
    }

    public function index()
    {
        if (!Session::has('cart')) {
            return view('carts.index');
        } else {
            $issetCart = Session::get('cart');
            $cart = new Cart($issetCart);
            return view('carts.index', ['products' => $cart->items, 'totalPrice' => $cart->total_price]);
        }
    }

    public function addToCart(Request $req, $id)
    {
        try {
            $product = $this->productRepo->findOrFail($id);
            $isset_cart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($isset_cart);

            if ($cart->items != null && array_key_exists($id, $cart->items)) {
                return redirect()->back()->with('productExits', trans('home.cart_product_exists'));
            }
            $cart->add($product, $product->id);
            $req->session()->put('cart', $cart);

            return redirect()->back();
        } catch (Exception $e) {
            throw new Exception($e->getMessage());
        }
    }

    public function increaseOne($id){
        try {
            $product = $this->productRepo->findOrFail($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);

            if ($product->quantity <= $cart->items[$id]['qty']) {
                return redirect()->back()
                    ->with(
                        ['out_of_product' => trans('home.out_of_product')],
                        [
                            'quantity' => $product->quantity,
                            'name' => $product->name
                        ]);
            } else {
                $cart->increaseOne($id);
            }
            Session::put('cart', $cart);

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMesseage());
        }
    }

    public function reduceOne($id){
        try {
            $product = $this->productRepo->findOrFail($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->reduceOne($id);

            if (count($cart->items) > config('setting.product-minimum')) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMesseage());
        }
    }

    public function removeItem($id)
    {
        try {
            $product = $this->productRepo->findOrFail($id);
            $oldCart = Session::has('cart') ? Session::get('cart') : null;
            $cart = new Cart($oldCart);
            $cart->removeItem($id);

            if (count($cart->items) > config('setting.product-minimum')) {
                Session::put('cart', $cart);
            } else {
                Session::forget('cart');
            }

            return redirect()->back();
        } catch (ModelNotFoundException $e) {
            throw new Exception($e->getMesseage());
        }
    }
}
