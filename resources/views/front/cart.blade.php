@extends('layouts.master')

@section('content')
    	<!-- breadcrumb-section -->
	<div class="breadcrumb-section breadcrumb-bg">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 offset-lg-2 text-center">
					<div class="breadcrumb-text">
						<p>{{__('master.cart_now')}}</p>
						<h1>{{__('master.cart')}}</h1>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end breadcrumb section -->

	<!-- cart -->
	<div class="cart-section mt-150 mb-150">
		<div class="container">
			<div class="row">
				<div class="col-lg-8 col-md-12">
					<div class="cart-table-wrap">
						<table class="cart-table">
							<thead class="cart-table-head">
								<tr class="table-head-row">
									<th class="product-image">Product Image</th>
									<th class="product-name">Name</th>
                                    <th class="product-image">Product</th>
									<th class="product-quantity">Quantity</th>
									<th class="product-total">Total Price</th>
                                    <th class="product-remove">remove</th>
								</tr>
							</thead>
							<tbody>
                                <?php $total = 0; ?>
                                @foreach ($carts as $cart )

                                <tr class="table-body-row">
									<td class="product-image flex justify-center"><img src="{{ Storage::url($cart->image)}}" alt=""></td>
									<td class="product-name">{{$cart->name}}</td>
                                    <td class="product-name">{{$cart->product_title}}</td>
									<td class="product-quantity">{{$cart->quantity}}</td>
									<td class="product-price">{{$cart->price}}</td>
                                    <form action="{{route('cart.destroy',$cart->id)}}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                    <td class="product-remove"><button onclick="confirm('are yous sure you want to delete from cart')" type="submit"><i class="fa-solid fa-delete-left fa-2xl" style="color: #fc4103;"></i></button></td>


                                    <?php $total = $total + $cart->price ?>

                                </form>
								</tr>

                                @endforeach

							</tbody>
						</table>
					</div>
				</div>

				<div class="col-lg-4">
					<div class="total-section">
						<table class="total-table">
							<thead class="total-table-head">
								<tr class="table-total-row">
									<th>Total</th>
									<th>Price</th>
								</tr>
							</thead>
							<tbody>
								<tr class="total-data">
									<td><strong>Subtotal: </strong></td>
									<td class="product-price">{{$total}}</td>
								</tr>
								<tr class="total-data">
									<td><strong>Shipping: </strong></td>
									<td>45$</td>
								</tr>
								<tr class="total-data">
									<td><strong>Total: </strong></td>
									<td class="product-price">{{$total+45 .'$'}}</td>
								</tr>
							</tbody>
						</table>
						<div class="cart-buttons">
							<a href="{{route('front.order')}}" class="boxed-btn black">Check Out</a>
                            <a href="{{route('front.stripe',$total)}}" class="boxed-btn">Pay with Card</a>

						</div>
					</div>

					<div class="coupon-section">
						<h3>Apply Coupon</h3>
						<div class="coupon-form-wrap">
							<form action="index.html">
								<p><input type="text" placeholder="Coupon"></p>
								<p><input type="submit" value="Apply"></p>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- end cart -->

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
