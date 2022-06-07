<?php

namespace App\Http\Controllers;

use App\Http\Requests\CartUpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;
use \Cart;

class CartController extends Controller
{

    public function index(){
        return view('cart.index');
    }


    public function add($product_id)
    {
        $product = Product::findOrfail($product_id);

        $cartRow = Cart::add($product_id, $product->title, 1, $product->price);
        $cartRow->associate(Product::class);

        return redirect()->back();
    }

    public function update(CartUpdateRequest $request)
    {
        Cart::update($request->product_id, $request->qty);

        return redirect()->route('cart.index');
    }

    public function drop(CartDropItemRequest $request)
    {
        Cart::remove($request->product_id);

        return redirect()->route('cart.index');
    }

    public function destroy()
    {
        Cart::destroy();

        return redirect()->route('cart.index');
    }

    public function checkout()
    {
        return view('orders.checkout');
    }

    public function success($orderId)
    {
        $order = Order::findOrfail($orderId);

        return view('cart.success', compact('order'));
    }
}
