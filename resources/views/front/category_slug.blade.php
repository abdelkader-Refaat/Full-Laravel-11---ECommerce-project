@extends('layouts.master')

@section('content')

<!-- product section -->
@foreach ($products as  $product)

<div class="product-section mt-150 mb-150">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2 text-center">
                <div class="section-title">
                    <h3><span class="orange-text">{{__('product.trend')}} </span> {{__('product.product')}}  </h3>
                    <p> {{__('category.buy').$product->category->name}}</p>
                </div>
            </div>
        </div>

        <div class="row">


            <div class="col-lg-4 col-md-6 text-center">
                <div class="single-product-item">
                    <div class="product-image">
                        <a href="{{route('front.single_product',$product->slug)}}"><img src="{{Storage::url($product->image)}}" alt=""></a>
                    </div>
                    <h3>{{$product->name}}</h3>
                    <p class="product-price"><span>Per one piece</span> {{$product->price}}$ </p>
                    <a href="cart.html" class="cart-btn"><i class="fas fa-shopping-cart"></i> {{trans('master.addToCart')}}</a>
                </div>
            </div>
            @endforeach
        </div>
        </div>
    </div>
</div>
<!-- end product section -->
@endsection
