@extends('layouts.master')

@section('content')
    <div class="breadcrumb-section breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="breadcrumb-text">
                        <p>{{ __('category.show_category') }}</p>
                        <h1>{{ __('master.category') }}</h1>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <<div class="product-section mt-150 mb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 text-center">
                    <div class="section-title">
                        <h3><span class="orange-text">{{ __('product.trend') }} </span> {{ __('product.category_id') }}
                        </h3>
                        <p>تسوق عبر فروعنا</p>
                    </div>
                </div>
            </div>

            <div class="row">
                @forelse ($categories as  $category)
                    <div class="col-lg-4 col-md-6 text-center">
                        <div class="single-product-item">
                            <div class="product-image">
                                <a href="{{ route('front.category_slug', $category->slug) }}"><img
                                        src="{{ Storage::url($category->image) }}" alt=""></a>
                            </div>
                            <h3>{{ $category->name }}</h3>
                            <p class="product-price"><span>the best choice</span> {{ $category->name }}$ </p>
                            <a href="" class="cart-btn"><i class="fas fa-shopping-cart"></i>
                                {{ trans('master.addToCart') }}</a>
                        </div>
                    </div>
                @empty
                    <div class="text-center center breadcrumb-text">
                        <p>sorry no Categories untill now</p>
                    </div>
                @endforelse
            </div>
        </div>
        <div class="flex justify-center  space-x-px text-s">
            {{$categories->links()}}
        </div>
        </div>
        </div>
    @endsection
