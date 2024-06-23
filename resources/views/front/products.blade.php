@extends('layouts.master')

@section('style')
    <style>
        .old_price {
            text-decoration: line-through;
            color: grey;
        }
    </style>
@endsection
@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>{{ __('product.show_product') }}</p>
                        <h1>{{ __('master.product') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('product.trend') }} </span> {{ __('product.product') }} </h3>
                        <form action="{{route('products.search')}}" class="max-w-md mx-auto" method="GET">
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
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($products as  $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('front.single_product', $product->slug) }}"><img
                                        src="{{ Storage::url($product->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $product->name }}</h3><span class="old_price text-danger" style="">old price
                                {{ $product->price }}$</span>
                            <p class="product-price"><span>Per one piece</span> {{ $product->selling_price }}$ </p>

                                <a href="{{route('front.single_product',$product->slug)}}"  class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                                   + <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                        <path d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z"/>
                                    </svg>
                                    {{ trans('master.addToCart') }}
                                </a>

                                {{-- <a href="javascript:{}" onclick="document.getElementById('cart').submit();" class="cart-btn ml-1"><i class="fas fa-shopping-cart"></i> +Car</a> --}}
                            </form>


                        </div>
                    </div>
                @empty
                    <div class="text-center center breadcrumb-text">
                        <p>sorry no products untill now</p>
                    </div>
                @endforelse
            </div>

        </div>
        <div class="flex justify-center  space-x-px text-s">
            {{$products->links()}}
        </div>

    </div>
    </div>
    <!-- end product section -->
    @section('script')
    <script>
        document.addEventListener("DOMContentLoaded", function(event) {
            var scrollpos = localStorage.getItem('scrollpos');
            if (scrollpos) window.scrollTo(0, scrollpos);
        });

        window.onbeforeunload = function(e) {
            localStorage.setItem('scrollpos', window.scrollY);
        };
    </script>

    @endsection
@endsection
