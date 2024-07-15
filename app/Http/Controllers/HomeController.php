<?php

namespace App\Http\Controllers;

use App\Mail\SendWelcomeMail;
use App\Models\{Cart,Category,Order, Product ,Comment};
use App\Models\Role;
use App\Models\Scopes\TrendProductsScope;
use App\Models\User;
use App\Traits\test;
use Carbon\Carbon;
use DateTime;
use Exception;
use Illuminate\Auth\Access\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Number;
use Stripe;
use Throwable;

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
        $products = Product::where('trend', '1')->paginate(15);
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
    public function slug($slug = 'slug')
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
                'product_id' => Product::first()->id,
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
    //  sending sms message to our mobile app .
    public function sendSms(){
        $basic  = new \Vonage\Client\Credentials\Basic("d88a7d65", "3kHcr4W3rNB9UVa9");
        $client = new \Vonage\Client($basic);
        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS("201095650959", 'Eng:Abdelkader', 'Welcome to our laravel Ecommerce application ')
        );

        $message = $response->current();

        if ($message->getStatus() == 0) {
            echo "The message was sent successfully to your mobile \n";
        } else {
            echo "The message failed with status   : " . $message->getStatus() . "\n";
        }

    }

    //  #####  just for  testing ########

    public function test(?Request $request)
    {

            return true;

    }

    /*
     //arguments by name in php ^ 8+
    function  send(string $name, string $title){
     return ' name is ' . $name . ' ' . 'title is '. $title;
    }
    return send(title:'mansoura' , name:'ahmed' );

     $file = Storage::disk('public')->path('assets/img/products/product-img-1.jpg');
     $fileName = basename($file);

     if(empty($fileName)){

     }
$token = $user->createToken('token-name', ['server:update'])->plainTextToken;
$user->update(['remember_token' => $token ]);
return $user->remember_token;

    Cache::put('key', 600);

    return $value = Cache::get('key');
    $arr = [1,2,3,4,5];
    return $name = in_array(6 , $arr) ? 'exists' :'not found';
    return $request->method();
    echo Carbon::now()->format('y-M-D');
if($request->url() == $url = url('test')){
   return $url;
return csrf_token() . 'and lang : '. App::currentLocale();


    Collection::macro('toUpper', function () {
        return $this->map(function (string $value) {
            return str()->upper($value);
        });
    });

    $collection = collect(['first', 'second']);

    return $upper = $collection->toUpper();
    $path = base_path('config/app.php');
    if(File::exists($path)){
        $config = File::get($path);
            return response()->json(['config' => $config]);

         }

    $collection = collect ([1,2,3,4,5]);
   return  $multi = $collection->map(function( int $item , $key){
        return $item * 2;
    });
    return  Product::withoutGlobalScope(TrendProductsScope::class)->get();

    return response()->json(DB::table('categories')->pluck('name'));
$users=  User::with('roles')?->findMany([1,2,3]);
$role =  Role::where('name' , 'admin')->first();
foreach($users as $user){
return $user->roles()->sync($role->id);
    return  class_basename($this);
    $cat = Category::with('products')->find(2);
    try {
      return   $user = Category::findOrFail(1000);

    } catch (\Throwable $th) {
      echo $th->getMessage();
    }
     $pros =  $cat->products;
    foreach($pros as $pro){
        return nl2br($pro->short_description) ;
    }
    return  $formattedCurrency ='£' . number_format( 12345.67); // Output: $12,345.67
    return   Category::inRandomOrder()->take(2)->pluck('name');
    return auth()->user()?->id ? 'true': 'null';
$u = Category::select('name')?->withCount('products')->find(2);
return $mail = Str::of("abdelkader")->mask('*',2,-2);
    return nl2br(implode("\n" , $aar));
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
