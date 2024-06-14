@extends('admin.master')

@section('title')
    {{trans('master.order')}}
  @endsection

 @section('content')


<form action="{{route('search')}}" class="max-w-md mx-auto" method="GET">
    @csrf
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input name="search" type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="  Search in orders " required />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
</form>

     {{-- table  --}}
     <div class="">
        <div class="block">
          <div class="table-responsive">
            <table class="table table-striped table-sm">
              <thead>

                <tr>
                  <th>#</th>
                  <th> {{__('order.Name')}}</th>
                  <th> {{__('order.email')}}</th>
                  <th> {{__('order.address')}}</th>
                  <th>Product</th>
                  <th>{{__('order.phone')}}</th>
                  <th>{{__('order.quantity')}}</th>
                  <th>{{__('order.image')}}</th>
                  <th>{{__('order.price')}}</th>
                  <th>{{__('order.shippign_status')}}</th>
                  <th>Send Email </th>
                  <th class="flex justify-center">{{__('order.Action')}}</th>
                  <th>print pdf</th>


                </tr>
              </thead>
              <tbody>
                <?php $i = 1; ?>
                @forelse ($orders as $order)


                <tr>
                  <th scope="row">{{$i++}}</th>
                  <td>{{$order->name}}</td>
                  <td>{{$order->email}}</td>
                  <td>{{$order->address}}</td>
                  <td>{{$order->product_title}}</td>
                  <td>{{$order->phone}}</td>
                  <td>{{$order->quantity}}</td>
                  <td><img class="rounded-full w-10 h-10" src="{{ Storage::url($order->image) }}"></td>
                    <td>{{$order->price}}</td>
                  <td>
                        @if ($order->shippign_status == '1')
                        <span class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{__('order.showing')}}</span>
                        @else
                        <span class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{__('order.hidden')}}</span>
                        @endif
                    </td>
                    <td>
                        <a href="{{route('send_email',$order->id)}}" class="text-white bg-yellow-400 hover:bg-yellow-500 focus:outline-none focus:ring-4 focus:ring-yellow-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:focus:ring-yellow-900"><i class="fa-solid fa-envelope" style="color: #e32b16;"></i>SEND</a>
                      </td>

                  <td class="flex justify-center">

                  <a onclick="return confirm('are you sure')"  href="{{route('order.delivered',$order->id)}}" class="text-white bg-red-700 hover:bg-red-800 focus:outline-none focus:ring-4 focus:ring-red-300 font-medium rounded-full text-sm px-5 py-2.5 text-center me-2 mb-2 dark:bg-red-600 dark:hover:bg-red-700 dark:focus:ring-red-900"><i class="fa-solid fa-cart-shopping" style="color: #FFD43B;"></i>{{__('order.delivered')}}</a>

                  </td>
                  <td><a  href="{{route('order.print',$order->id)}}" class="text-white bg-purple-700 hover:bg-purple-800 focus:outline-none focus:ring-4 focus:ring-purple-300 font-medium rounded-full text-sm px-5 py-2.5 text-center mb-2 dark:bg-purple-600 dark:hover:bg-purple-700 dark:focus:ring-purple-900"><i class="fa-solid fa-print" style="color: #FFD43B;"></i>PRINT</a></td>


                </tr>
                @empty
                 <h1 class="text-gray-200"> your searched product not found </h1>

                @endforelse

              </tbody>
            </table>
          </div>
        </div>
      </div>


     @endsection
