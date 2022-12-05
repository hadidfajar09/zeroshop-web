@extends('frontend.main_master')

@section('title')
Stripe Payment
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Stripe Payment</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				
				<div class="col-md-6">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Shopping Amount </h4>
		    </div>
		    <div class="">
            
				<ul class="nav nav-checkout-progress list-unstyled">
                   
					<li>
                        @if (Session::has('coupon'))
                            <table class="table table=responsive">
                                <tr>
                                    <td><strong>Sub Total </strong> </td>
                                    <td>:</td>
                                    <td>Rp. {{ $cart_total }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Coupon Name  </strong> </td>
                                    <td>:</td>
                                    <td>{{ Session::get('coupon')['coupon_name'] }}
                                        ({{ Session()->get('coupon')['coupon_discount'] }} %)</td>
                                </tr>
                                <tr>
                                    <td><strong>Coupon Discount  </strong> </td>
                                    <td>:</td>
                                    <td>Rp. {{ Session::get('coupon')['discount_amount'] }}</td>
                                </tr>
                                <tr>
                                    <td><strong>Grand Total  </strong> </td>
                                    <td>:</td>
                                    <td>Rp. {{ Session::get('coupon')['total_amount'] }}</td>
                                </tr>
                                
                            </table>
                        @else
                        <table class="table table=responsive">
                            <tr>
                                <td><strong>Sub Total </strong> </td>
                                <td>:</td>
                                <td>Rp. {{ $cart_total }}</td>
                            </tr>
                            <tr>
                                <td><strong>Grand Total </strong> </td>
                                <td>:</td>
                                <td>Rp. {{ $cart_total }}</td>
                            </tr>
                            
                        </table>
                        @endif
                    </li>
		

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>



<div class="col-md-6">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Metode Pembayaran</h4>
</div>


<div class="row">
	<div class="col-md-4">
		<input id="register" type="radio" name="payment_method" value="stripe">  
		<label for="">Stripe</label>
		<img src="{{ asset('frontend/assets/images/payments/8.png') }}" width="45">
	</div>
	<div class="col-md-4">
		<input id="register" type="radio" name="payment_method" value="transfer">  
		<label for="">Bank</label>
		<img src="{{ asset('frontend/assets/images/payments/9.png') }}" width="45">
	</div>
	<div class="col-md-4">
		<input id="register" type="radio" name="payment_method" value="cod">  
		<label for="">Cash</label>
		<img src="{{ asset('frontend/assets/images/payments/7.png') }}" width="45">
	</div>
</div>


<hr>
<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>

</form>

</div>
</div>
</div> 
<!-- checkout-progress-sidebar -->				
</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->


@endsection