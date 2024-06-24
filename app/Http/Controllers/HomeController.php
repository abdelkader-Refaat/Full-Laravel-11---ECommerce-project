<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Traits\test;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Stripe;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'products' => Product::cursorPaginate(15),
            'comments' => Comment::all(),
        ];
        return view('front.index', $data);
    }

    public function products()
    {
        $products = Product::where('trend', '1')->cursorPaginate(15);

        return view('front.products', compact('products'));
    }

    public function shops()
    {
        $products = Product::cursorPaginate(15);
        return view('front.shops', compact('products'));
    }

    public function category()
    {
        $categories = Category::where('is_popular', '1')->cursorPaginate(15);
        return view('front.category', compact('categories'));
    }
    public function get_category_slug($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $products = Category::where('slug', $slug)->first()->products;
            return view('front.category_slug', compact('products'));
        } else {
            return redirect()->route('front.category')->with('error', 'your searched category not found');
        }
    }
    public function get_single_product_slug($slug)
    {
        if (Product::where('slug', $slug)->exists()) {
            $product = Product::where('slug', $slug)->first();
            return view('front.single_product', compact('product'));
        } else {
            return redirect()->route('front.category_slug', compact('slug'))->with('error', 'your searched category not found');
        }
    }

    public function order()
    {
        $user = optional(Auth::user())->id;
        $carts = Cart::where('user_id', $user)->get();
        foreach ($carts as $cart) {
            Order::create([
                'name' => $cart->name,
                'user_id' => $cart->user_id,
                'email' => $cart->email,
                'address' => $cart->address,
                'phone' => $cart->phone,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'image' => $cart->image,
                'price' => $cart->price,
                'product_title' => $cart->product_title,
            ]);
            $cart->delete();
        }
        return view('front.order')->with('success', 'we recieved your order successfuly will connect with you soon');
    }

    public function stripe($price)
    {
        return view('front.stripe', compact('price'));
    }
    public function stripePost(Request $request, $price)
    {
        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $user = optional(Auth::user())->id;
        $carts = Cart::where('user_id', $user)->get();
        foreach ($carts as $cart) {
            Order::create([
                'name' => $cart->name,
                'user_id' => $cart->user_id,
                'email' => $cart->email,
                'address' => $cart->address,
                'phone' => $cart->phone,
                'product_id' => $cart->product_id,
                'quantity' => $cart->quantity,
                'price' => $cart->price,
                'product_title' => $cart->product_title,
                'image' => $cart->image,
                'order_status' => '1',
                'shipping_status' => '1',
            ]);
            $cart->delete();
        }

        Stripe\Charge::create([
            'amount' => $price * 100,
            'currency' => 'usd',
            'source' => $request->stripeToken,
            'description' => 'thanks for payment',
        ]);

        Session::flash('success', 'Payment successful!');

        return back();
    }

    public function comment(Request $request)
    {
        if (Auth::id()) {
            Comment::insert([
                'comment' => $request->comment,
                'name' => Auth::user()->name,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->back();
        } else {
            return redirect('login');
        }
    }
    public function search(Request $request)
    {
        $products = Product::where('name', 'LIKE', "%$request->search%")->paginate(10);

        return view('front.products', compact('products'));
    }

    //  #####  just for  testing ########

    use Test;
    public function test()
    {
          $user = auth()->user()->name;
        return    Gate::allowIf($user) ? $user : 'not found';

    }

    /*

      $u = Category::select('name')?->withCount('products')->find(2);
    return $mail = Str::of("abdelkader")->mask('*',2,-2);

        return  $u . ':'.$u?->products_count;

       return 'welcome this \'s fuest' ;
    Category::oldest()->ddRawSql();
    return Str::snake(Str::pluralStudly(class_basename($this)));

    function countTo4() {
        yield from [1, 2, 3];
        yield 4;
      }

      foreach(countTo4() as $number) {
        echo $number . " -";
      }

    echo date("h:m:sa"). "</br>";

    return Category::with(['products','currentProduct'])->get();
    return Self::tester();



    return base_path();
    __DIR__';
      return auth()->user()->is_admin;
       */
}
