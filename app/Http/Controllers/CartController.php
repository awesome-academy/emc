<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
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
            $product = Product::findOrFail($id);
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
            $product = Product::findOrFail($id);
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
            $product = Product::findOrFail($id);
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
}
