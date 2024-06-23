<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use App\Notifications\SendEmailNotification;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Notification;

class AdminController extends Controller
{
    public function index()
    {
         $data['orders'] = Order::count();
         $data['shipping_orders'] = Order::where('shipping_status', '=' , 1)->count();
         $data['products'] = Product::count();
         $data['customers'] =User::count();
         $data['categories'] =Category::count();
         $data['price'] = Order::sum('price');

        //  if (Gate::allows('admin', Auth::user())) {

        return view('admin.dashboard', compact('data'));
        //  } else {
        //     abort(403);}
    }
    public function orders()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.order', compact('orders'));
    }
    public function delivery($id)
    {
        $orders = Order::findOrFail($id);
        $orders->shipping_status = 1;
        $orders->order_status = 1;
        $orders->save();
        return redirect()->back()->with('success', 'succesfuly delivered');
    }
    public function print($id)
    {
        $order = Order::where('id', '=', $id)->get();
        $pdf = Pdf::loadView('admin.pdf', compact('order'));
        return $pdf->download('order_details.pdf');
    }
    public function sendEmail($id)
    {
        $order = Order::findOrFail($id);
        return view('admin.email', compact('order'));
    }
    public function sendUserEmail(Request $request, $id)
    {
        $order = Order::findOrFail($id);
        $details = [
            'greeting' => $request->greeting,
            'first' => $request->first,
            'body' => $request->body,
            'button' => $request->button,
            'url' => $request->url,
            'lastline' => $request->lastline,
        ];

        Notification::send($order, new SendEmailNotification($details));

        return redirect()->back()->with('success', 'email sent');
    }

    public function search(Request $request)
    {
        $orders = Order::where('name', 'lIKE', "%$request->search%")->get();
         return view('admin.order',compact('orders'));




    }
}
