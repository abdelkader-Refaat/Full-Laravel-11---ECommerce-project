<?php

namespace App\Http\Controllers;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function store(Request $request, $id)
    {
        if ($user = Auth::user()) {
            $product = Product::findOrFail($id);
            $product_exist_cart = Cart::where('user_id', $user->id)
                ->where('product_id', $product->id)
                ->first('id');
            if ($product_exist_cart) {
                $cart = Cart::find($product_exist_cart)->first();
                $cart->update([
                    'quantity' => $cart->quantity + $request->qty,
                    'price' => $cart->price + $request->price,
                ]);
            } else {
                Cart::create([
                    'name' => $user->name,
                    'user_id' => $user->id,
                    'email' => $user->email,
                    'address' => $user->address,
                    'phone' => $user->phone,
                    'product_id' => $product->id,
                    'quantity' => $request->qty,
                    'price' => $product->price * $request->qty,
                    'product_title' => $product->slug,
                    'image' => $product->image,
                ]);
            }

            return to_route('cart.show')->with('success', 'Added To Cart Successfuly');
            // return view("front.carts",$product);
        } else {
            return to_route('login');
        }
    }
    public function show()
    {
        $id = Auth::id();
        $carts = Cart::where('user_id', $id)->get();
        return view('front.cart', compact('carts'));
    }
    public function destroy($id)
    {
        Cart::findOrFail($id)->delete();
        return to_route('cart.show')->with('success', 'Product deleted Sucessfuly from cart');
    }
}
