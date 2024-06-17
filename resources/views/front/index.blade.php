@extends('layouts.master')

@section('content')
    <!-- home page slider -->
    <div class="homepage-slider homepage-bg-1">
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-1">
            <div class="container">
                <div class="row">
                    <div class="col-md-12 col-lg-7 offset-lg-1 offset-xl-0">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">best products</p>
                                <h1> Seasonal offers</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">bets Collection</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-center">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">newest Everyday</p>
                                <h1>100% Organic Collection</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- single home slider -->
        <div class="single-homepage-slider homepage-bg-3">
            <div class="container">
                <div class="row">
                    <div class="col-lg-10 offset-lg-1 text-right">
                        <div class="hero-text">
                            <div class="hero-text-tablecell">
                                <p class="subtitle">Mega Sale Going On!</p>
                                <h1>Get December Discount</h1>
                                <div class="hero-btns">
                                    <a href="shop.html" class="boxed-btn">Visit Shop</a>
                                    <a href="contact.html" class="bordered-btn">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end home page slider -->


    <div class="list-section pt-80 pb-80">
        <div class="container">

            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-shipping-fast"></i>
                        </div>
                        <div class="content">
                            <h3>Free Shipping</h3>
                            <p>When order over $75</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6 mb-4 mb-lg-0">
                    <div class="list-box d-flex align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-phone-volume"></i>
                        </div>
                        <div class="content">
                            <h3>24/7 Support</h3>
                            <p>Get support all day</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 col-md-6">
                    <div class="list-box d-flex justify-content-start align-items-center">
                        <div class="list-icon">
                            <i class="fas fa-sync"></i>
                        </div>
                        <div class="content">
                            <h3>Refund</h3>
                            <p>Get refund within 3 days!</p>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- end features list section -->

    <!-- product section -->
    <div class="product-section mt-150 mb-150">
        <div class="container">

            <div class="row">
                @foreach ($products as $product)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('front.single_product', $product->slug) }}"><img
                                        src="{{ Storage::url($product->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $product->name }}</h3>
                            <p class="product-price"><span>Per one piece</span> {{ $product->price }}$ </p>

                            <a href="{{ route('front.single_product', $product->slug) }}" type="submit"
                                class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                                + <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 18 21">
                                    <path
                                        d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                </svg>
                                {{ trans('master.addToCart') }}
                            </a>

                            {{-- <a href="javascript:{}" onclick="document.getElementById('cart').submit();" class="cart-btn ml-1"><i class="fas fa-shopping-cart"></i> +Car</a> --}}

                        </div>
                    </div>
                @endforeach
            </div>
            <div class="row flex justify-center">
                <h3><span class="orange-text">Comments</span> leave your feedback here</h3>

            </div>


                <label for="chat" class="sr-only">Your comment</label>
                <div class="flex items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <button type="button"
                        class="inline-flex justify-center p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 18">
                            <path fill="currentColor"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M18 1H2a1 1 0 0 0-1 1v14a1 1 0 0 0 1 1h16a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1Z" />
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13 5.5a.5.5 0 1 1-1 0 .5.5 0 0 1 1 0ZM7.565 7.423 4.5 14h11.518l-2.516-3.71L11 13 7.565 7.423Z" />
                        </svg>
                        <span class="sr-only">Upload image</span>
                    </button>
                    <button type="button"
                        class="p-2 text-gray-500 rounded-lg cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                        <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="M13.408 7.5h.01m-6.876 0h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0ZM4.6 11a5.5 5.5 0 0 0 10.81 0H4.6Z" />
                        </svg>
                        <span class="sr-only">Add emoji</span>
                    </button>



                    <textarea id="chat" rows="1" name="comment"
                        class=" mx-4 p-2.5 w-full text-sm text-gray-900 bg-white rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-800 dark:border-gray-600 dark:placeholder-gray-400 dark:text-black dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Your comment..."></textarea>

                        <form action="{{route('comment')}}" method="POST">
                            @csrf
                       <button type="submit"
                        class="inline-flex justify-center p-2 text-blue-600 rounded-full cursor-pointer hover:bg-blue-100 dark:text-blue-500 dark:hover:bg-gray-600">
                        <svg class="w-5 h-5 rotate-90 rtl:-rotate-90" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 18 20">
                            <path
                                d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                        </svg>
                        <span class="sr-only">Send comment</span>
                    </button>
                    </form>
                </div>

                @foreach ($comments as $comment)

                <div class="flex justify-center items-center px-3 py-2 rounded-lg bg-gray-50 dark:bg-gray-700">
                    <a href="javascript::void(0);"
                        class="flex flex-col items-center bg-white border border-gray-200 rounded-lg shadow md:flex-row md:max-w-xl hover:bg-gray-100 dark:border-gray-700 dark:bg-gray-800 dark:hover:bg-gray-700">
                        <img class="object-cover w-full rounded-t-lg h-96 md:h-auto md:w-48 md:rounded-none md:rounded-s-lg"
                            src="{{ Storage::url('public/assets/img/products/product-img-1.jpg') }}" alt="">
                        <div class="flex flex-col justify-between p-4 leading-normal">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-black">
                                {{$comment->comment}}
                            </h5>
                            {{-- <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{{$comment->comment}}</p> --}}
                            <a href="javascript::void(0);" onclick="reply(this)">
                                <div class="flex justify-end"> Reply &nbsp <svg class="w-5 h-5 rotate-90 rtl:-rotate-90"
                                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor"
                                        viewBox="0 0 18 20">
                                        <path
                                            d="m17.914 18.594-8-18a1 1 0 0 0-1.828 0l-8 18a1 1 0 0 0 1.157 1.376L8 18.281V9a1 1 0 0 1 2 0v9.281l6.758 1.689a1 1 0 0 0 1.156-1.376Z" />
                                    </svg>
                                </div>
                            </a>
                        </div>
                    </a>
                </div>
                @endforeach


                <div style="display: none;" id="reply"
                    class=" w-full mb-4 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-700 dark:border-gray-600">
                    <div class="px-4 py-2 bg-white rounded-t-lg dark:bg-gray-800">
                        <label for="comment" class="sr-only">Your comment</label>
                        <input  type="hidden" name="comment_id" id ="{{$comments}}">
                        <textarea id="comment" rows="4" name="reply"
                            class="w-full px-0 text-sm text-gray-900 bg-white border-0 dark:bg-gray-800 focus:ring-0 dark:text-black dark:placeholder-gray-800"
                            placeholder="Write a comment..." required></textarea>
                    </div>
                    <div class="flex items-center justify-between px-3 py-2 border-t dark:border-gray-600">
                        <button type="submit"
                            class="inline-flex items-center py-2.5 px-4 text-xs font-medium text-center text-white bg-blue-700 rounded-lg focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-900 hover:bg-blue-800">
                            Post reply
                        </button>
                        <div class="flex ps-0 space-x-1 rtl:space-x-reverse sm:ps-2">
                            <button type="button"
                                class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="none" viewBox="0 0 12 20">
                                    <path stroke="currentColor" stroke-linejoin="round" stroke-width="2"
                                        d="M1 6v8a5 5 0 1 0 10 0V4.5a3.5 3.5 0 1 0-7 0V13a2 2 0 0 0 4 0V6" />
                                </svg>
                                <span class="sr-only">Attach file</span>
                            </button>
                            <button type="button"
                                class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 16 20">
                                    <path
                                        d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                                </svg>
                                <span class="sr-only">Set location</span>
                            </button>
                            <button type="button"
                                class="inline-flex justify-center items-center p-2 text-gray-500 rounded cursor-pointer hover:text-gray-900 hover:bg-gray-100 dark:text-gray-400 dark:hover:text-white dark:hover:bg-gray-600">
                                <svg class="w-4 h-4" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                    fill="currentColor" viewBox="0 0 20 18">
                                    <path
                                        d="M18 0H2a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h16a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2Zm-5.5 4a1.5 1.5 0 1 1 0 3 1.5 1.5 0 0 1 0-3Zm4.376 10.481A1 1 0 0 1 16 15H4a1 1 0 0 1-.895-1.447l3.5-7A1 1 0 0 1 7.468 6a.965.965 0 0 1 .9.5l2.775 4.757 1.546-1.887a1 1 0 0 1 1.618.1l2.541 4a1 1 0 0 1 .028 1.011Z" />
                                </svg>
                                <span class="sr-only">Upload image</span>
                            </button>
                        </div>
                    </div>
                </div>







            <!-- end product section -->

            <!-- cart banner section -->
            {{-- <section class="cart-banner pt-100 pb-100">
                <div class="container">
                    <div class="row clearfix">
                        <!--Image Column-->
                        <div class="image-column col-lg-6">
                            <div class="image">
                                <div class="price-box">
                                    <div class="inner-price">
                                        <span class="price">
                                            <strong>30%</strong> <br> off per kg
                                        </span>
                                    </div>
                                </div>
                                <img src="assets/img/a.jpg" alt="">
                            </div>
                        </div>
                        <!--Content Column-->
                        <div class="content-column col-lg-6">
                            <h3><span class="orange-text">Deal</span> of the month</h3>
                            <h4>Hikan Strwaberry</h4>
                            <div class="text">Quisquam minus maiores repudiandae nobis, minima saepe id, fugit ullam
                                similique! Beatae, minima quisquam molestias facere ea. Perspiciatis unde omnis iste natus
                                error sit voluptatem accusant</div>
                            <!--Countdown Timer-->
                            <div class="time-counter">
                                <div class="time-countdown clearfix" data-countdown="2020/2/01">
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Days</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Hours</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Mins</div>
                                    </div>
                                    <div class="counter-column">
                                        <div class="inner"><span class="count">00</span>Secs</div>
                                    </div>
                                </div>
                            </div>
                            <form id="cart" action="{{ route('cart.store', 4) }}" method="post">
                                @csrf
                                <button type="submit"
                                    class="text-white bg-[#FF9119] hover:bg-[#FF9119]/80 focus:ring-4 focus:outline-none focus:ring-[#FF9119]/50 font-medium rounded-lg text-sm px-5 py-2.5 text-center inline-flex items-center dark:hover:bg-[#FF9119]/80 dark:focus:ring-[#FF9119]/40 me-2 mb-2">
                                    + <svg class="w-3.5 h-3.5 me-2" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                                        fill="currentColor" viewBox="0 0 18 21">
                                        <path
                                            d="M15 12a1 1 0 0 0 .962-.726l2-7A1 1 0 0 0 17 3H3.77L3.175.745A1 1 0 0 0 2.208 0H1a1 1 0 0 0 0 2h.438l.6 2.255v.019l2 7 .746 2.986A3 3 0 1 0 9 17a2.966 2.966 0 0 0-.184-1h2.368c-.118.32-.18.659-.184 1a3 3 0 1 0 3-3H6.78l-.5-2H15Z" />
                                    </svg>
                                    {{ trans('master.addToCart') }}
                                </button>

                    <a href="javascript:{}" onclick="document.getElementById('cart').submit();" class="cart-btn ml-1"><i class="fas fa-shopping-cart"></i> +Car</a>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            --}}


            <!-- end cart banner section -->

            <!-- testimonail-section -->
            {{--
            <div class="testimonail-section mt-150 mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-10 offset-lg-1 text-center">
                            <div class="testimonial-sliders">
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar1.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>Saira Hakim <span>Local shop owner</span></h3>
                                        <p class="testimonial-body">
                                            " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                            beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde
                                            omnis iste natus error sit voluptatem accusantium "
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar2.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>David Niph <span>Local shop owner</span></h3>
                                        <p class="testimonial-body">
                                            " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                            beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde
                                            omnis iste natus error sit voluptatem accusantium "
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-testimonial-slider">
                                    <div class="client-avater">
                                        <img src="assets/img/avaters/avatar3.png" alt="">
                                    </div>
                                    <div class="client-meta">
                                        <h3>Jacob Sikim <span>Local shop owner</span></h3>
                                        <p class="testimonial-body">
                                            " Sed ut perspiciatis unde omnis iste natus error veritatis et quasi architecto
                                            beatae vitae dict eaque ipsa quae ab illo inventore Sed ut perspiciatis unde
                                            omnis iste natus error sit voluptatem accusantium "
                                        </p>
                                        <div class="last-icon">
                                            <i class="fas fa-quote-right"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}
            <!-- end testimonail-section -->

            <!-- advertisement section -->
            {{-- <div class="abt-section mb-150">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-bg">
                                <a href="https://www.youtube.com/watch?v=DBLlFWYcIGQ"
                                    class="video-play-btn popup-youtube"><i class="fas fa-play"></i></a>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-12">
                            <div class="abt-text">
                                <p class="top-sub">Since Year 1999</p>
                                <h2>We are <span class="orange-text">Fruitkha</span></h2>
                                <p>Etiam vulputate ut augue vel sodales. In sollicitudin neque et massa porttitor vestibulum
                                    ac vel nisi. Vestibulum placerat eget dolor sit amet posuere. In ut dolor aliquet,
                                    aliquet sapien sed, interdum velit. Nam eu molestie lorem.</p>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sapiente facilis illo repellat
                                    veritatis minus, et labore minima mollitia qui ducimus.</p>
                                <a href="about.html" class="boxed-btn mt-4">know more</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end advertisement section -->

            <!-- shop banner -->
            <section class="shop-banner">
                <div class="container">
                    <h3>December sale is on! <br> with big <span class="orange-text">Discount...</span></h3>
                    <div class="sale-percent"><span>Sale! <br> Upto</span>50% <span>off</span></div>
                    <a href="shop.html" class="cart-btn btn-lg">Shop Now</a>
                </div>
            </section>
            <!-- end shop banner -->

            <!-- latest news -->
            <div class="latest-news pt-150 pb-150">
                <div class="container">

                    <div class="row">
                        <div class="col-lg-8 offset-lg-2 text-center">
                            <div class="section-title">
                                <h3><span class="orange-text">Our</span> News</h3>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Aliquid, fuga quas itaque
                                    eveniet beatae optio.</p>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news">
                                <a href="single-news.html">
                                    <div class="latest-news-bg news-bg-1"></div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="single-news.html">You will vainly look for fruit on it in autumn.</a></h3>
                                    <p class="blog-meta">
                                        <span class="author"><i class="fas fa-user"></i> Admin</span>
                                        <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                                    </p>
                                    <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus
                                        nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                                    <a href="single-news.html" class="read-more-btn">read more <i
                                            class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6">
                            <div class="single-latest-news">
                                <a href="single-news.html">
                                    <div class="latest-news-bg news-bg-2"></div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="single-news.html">A man's worth has its season, like tomato.</a></h3>
                                    <p class="blog-meta">
                                        <span class="author"><i class="fas fa-user"></i> Admin</span>
                                        <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                                    </p>
                                    <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus
                                        nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                                    <a href="single-news.html" class="read-more-btn">read more <i
                                            class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-6 offset-md-3 offset-lg-0">
                            <div class="single-latest-news">
                                <a href="single-news.html">
                                    <div class="latest-news-bg news-bg-3"></div>
                                </a>
                                <div class="news-text-box">
                                    <h3><a href="single-news.html">Good thoughts bear good fresh juicy fruit.</a></h3>
                                    <p class="blog-meta">
                                        <span class="author"><i class="fas fa-user"></i> Admin</span>
                                        <span class="date"><i class="fas fa-calendar"></i> 27 December, 2019</span>
                                    </p>
                                    <p class="excerpt">Vivamus lacus enim, pulvinar vel nulla sed, scelerisque rhoncus
                                        nisi. Praesent vitae mattis nunc, egestas viverra eros.</p>
                                    <a href="single-news.html" class="read-more-btn">read more <i
                                            class="fas fa-angle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 text-center">
                            <a href="news.html" class="boxed-btn">More News</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end latest news -->

            <!-- logo carousel -->
            <div class="logo-carousel-section ">
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
            </div> --}}

        @section('script')
            <script type="text/javascript"">
                        function reply(caller){
                            $('#reply').insertAfter($(caller));
                            $('#reply').show();


                        }



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
