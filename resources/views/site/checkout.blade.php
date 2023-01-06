@extends('site.master')

@section('title', 'Cart | ' . config('app.name'))

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<div class="content">
					<h1 class="page-name">Checkout</h1>
					<ol class="breadcrumb">
						<li><a href="index-2.html">Home</a></li>
						<li class="active">checkout</li>
					</ol>
				</div>
			</div>
		</div>
	</div>
</section>

<div class="page-wrapper">
    <div class="checkout shopping">
       <div class="container">
          <div class="row">
             <div class="col-md-8">

                <script src="https://eu-test.oppwa.com/v1/paymentWidgets.js?checkoutId={{ $id }}"></script>
                <form action="{{ route('site.payment') }}" class="paymentWidgets" data-brands="VISA MASTER AMEX MADA STAPLES"></form>

             </div>
             <div class="col-md-4">
                <div class="product-checkout-details">
                   <div class="block">
                      <h4 class="widget-title">Order Summary</h4>
                      {{-- @foreach (Auth::user()->carts as $cart)
                        <div class="media product-card">
                            <a class="pull-left" href="product-single.html">
                                <img class="media-object" src="{{ asset('uploads/products/' .$cart->product->image)  }}" alt="Image">
                            </a>
                            <div   class="media-body">
                                <h4 class="media-heading"><a href="{{ route('site.product', $cart->product_id) }}">{{ $cart->product->trans_name }}</a></h4>
                                <p class="price"></p>
                                <a style="display:inline-block; "  href="{{ route('site.remove_cart', $cart->id) }}">Remove</a>
                            </div>
                        </div>
                      @endforeach --}}
                       <table class="table">
                        @php
                        $total = 0;
                    @endphp

                                @foreach (Auth::user()->carts as $cart)
                                <tr class="">
                                <td class="">
                                    <div class="product-info">
                                    <img width="80" src="{{ asset('uploads/products/'.$cart->product->image) }}" alt="">
                                    <a href="{{ route('site.product', $cart->product_id) }}">{{ $cart->product->trans_name }}</a>
                                    </div>
                                </td>
                                <td class=""><input style="width: 80px " id="qunt"  name="qyt[{{ $cart->product_id }}]" value="{{ $cart->quantity }}" readonly></td>
                                <td id="price" class="">${{ $cart->price }}</td>
                                <td class="">
                                    <a style="color: red" class="product-remove" href="{{ route('site.remove_cart', $cart->id) }}">Remove</a>
                                </td>
                                </tr>
                                @php
                                $total += $cart->price * $cart->quantity;
                            @endphp
                                @endforeach
                       </table>
<hr>


                                 <span>Total :</span>
                                <span style="margin: 0px 100px; color: rgb(12, 81, 5)">${{ $total }}</span>


                   </div>
                </div>
             </div>
          </div>
       </div>
    </div>
 </div>

@stop
