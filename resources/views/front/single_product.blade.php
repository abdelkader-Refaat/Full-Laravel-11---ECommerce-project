@extends('layouts.master')
@section('style')
    <style>
        .old_price {
            text-decoration: line-through;
            color: rgb(188, 80, 80);
        }
    </style>
@endsection

@section('content')
    <!--single product -->
    <div class="single-product mt-150 mb-150">
        <form action="{{ route('cart.store', $product->id) }}" method="POST">
            @csrf
            @method('post')
        <div class="container">

            <div class="row">
                <div class="col-md-5">
                    <div class="single-product-img">
                        <img src="{{ Storage::url($product->image) }}" alt="">
                    </div>
                </div>
                <div class="col-md-6">
                    <span class="ml-6">
                        @if ($product->status == 1)
                            <span
                                class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('product.showing') }}</span>
                        @else
                            <span
                                class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ __('product.hidden') }}</span>
                        @endif
                    </span>
                    <span>
                        @if ($product->trend == 1)
                            <span
                                class="mt-2 bg-green-100 text-green-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-green-900 dark:text-green-300">{{ __('product.trend') }}</span>
                        @else
                            <span
                                class="mt-2 bg-yellow-100 text-yellow-800 text-xs font-medium me-2 px-2.5 py-0.5 rounded dark:bg-yellow-900 dark:text-yellow-300">{{ __('product.nottrend') }}</span>
                        @endif
                    </span>


                    <div class="single-product-content">
                        <h3 class="orange-text"> {{ $product->name }}</h3><span class="old_price text-danger">old price
                            {{ $product->price }}$</span>

                        <div class="row">
                            <div class="col-lg-5 col-md-5 text-center">


                                <p class="single-product-pricing"><span>Per one piece</span> <strong
                                        class="orange-text">{{ $product->selling_price }}$</strong>
                                </p>
                            </div>
                            <div class="col-lg-5 col-md-6 text-center">

                                <p> Category : <strong class="orange-text">{{ $product->category->name }}</strong></p>
                                <p> Available Quanty :<strong class="orange-text">{{ $product->qty }} </strong></p>
                            </div>
                        </div>

                        <div class="row">


                            <div class="col-lg-5 col-md-5 text-center">



                                <div class="flex sm:items-center sm:justify-center w-full">

                                    <button type="button" onclick="decrementQty()"
                                        class="group py-4 px-6 border border-gray-400 rounded-l-full bg-white transition-all duration-300 hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                        <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                            viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M16.5 11H5.5" stroke="" stroke-width="1.6" stroke-linecap="round">
                                            </path>
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                                stroke-linecap="round"></path>
                                            <path d="M16.5 11H5.5" stroke="" stroke-opacity="0.2" stroke-width="1.6"
                                                stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                    <input type="hidden" id="qty" value="{{ $product->qty }}" name="qty">
                                    <input readonly type="text" id="qty_value" name="qty"
                                        class="font-semibold text-gray-900 cursor-pointer text-lg py-[13px] px-6 w-full sm:max-w-[118px] outline-0 border-y border-gray-400 bg-transparent placeholder:text-gray-900 text-center hover:bg-gray-50"
                                        value="1">
                                    <button type="button" onclick="incrementQty()"
                                        class="group py-4 px-6 border border-gray-400 rounded-r-full bg-white transition-all duration-300 hover:bg-gray-50 hover:shadow-sm hover:shadow-gray-300">
                                        <svg class="stroke-gray-900 group-hover:stroke-black" width="22" height="22"
                                            viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="#9CA3AF" stroke-width="1.6"
                                                stroke-linecap="round"></path>
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round"></path>
                                            <path d="M11 5.5V16.5M16.5 11H5.5" stroke="black" stroke-opacity="0.2"
                                                stroke-width="1.6" stroke-linecap="round"></path>
                                        </svg>
                                    </button>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6 text-center">

                                    <button type="submit"
                                        class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                                        + <svg class="w-3.5 h-3.5 me-2" aria-hidden="true"
                                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 21">
                                            <path
                                                d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                        </svg>
                                        {{ trans('master.addToCart') }}
                                    </button>

                                    {{-- <a href="javascript:{}" onclick="document.getElementById('cart').submit();" class="cart-btn ml-1"><i class="fas fa-shopping-cart"></i> +Car</a> --}}
                                </form>


                            </div>



                        </div>

                        <div class="flex justify-center ">
                            <h4 class="mt-0 mr-0">Share With: </h4>
                            <ul class="product-share">
                                <li><a href=""><i class="fab fa-facebook-f"> </i></a></li>
                                <li><a href=""><i class="fab fa-twitter"> </i></a></li>
                                <li><a href=""><i class="fab fa-google-plus-g"></i></a></li>
                                <li><a href=""><i class="fab fa-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end single product -->

    <!-- more products -->
    <div class="more-products mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">Related</span> Products</h3>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque eveniet
                            beatae optio.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="#"><img src="{{ asset('assets/img/products/product-img-1.jpg') }}"
                                    alt=""></a>
                        </div>
                        <h3>samsung</h3>
                        <p class="product-price"><span>Per Kg</span> 85$ </p>
                        <a href="#" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="#"><img src="{{ asset('assets/img/products/product-img-2.jpg') }}"
                                    alt=""></a>
                        </div>
                        <h3>iphone</h3>
                        <p class="product-price"><span>Per Kg</span> 70$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 offset-lg-0 offset-md-3 text-center">
                    <div class="single-product-item">
                        <div class="product-image">
                            <a href="#"><img src="{{ asset('assets/img/products/product-img-3.jpg') }}"
                                    alt=""></a>
                        </div>
                        <h3>bag</h3>
                        <p class="product-price"><span>Per Kg</span> 35$ </p>
                        <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> Add to Cart</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end more products -->

    <!-- logo carousel -->
    <div class="logo-carousel-section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="logo-carousel-inner">
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/1.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/2.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/3.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/4.png" alt="">
                        </div>
                        <div class="single-logo-item">
                            <img src="assets/img/company-logos/5.png" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end logo carousel -->
@endsection

@section('script')
    <script>
        function incrementQty() {
            var qty = $('#qty').val();


            var value = parseInt($('#qty_value').val());
            value = isNaN(value) ? 0 : value;
            if (value < qty) {
                value++;
                $('#qty_value').val(value);
            }


        }

        function decrementQty() {

            var value = $('#qty_value').val();
            value = isNaN(value) ? 0 : value;
            if (value > 1) {
                value--;
                $('#qty_value').val(value);

            }

        }
    </script>
@endsection
