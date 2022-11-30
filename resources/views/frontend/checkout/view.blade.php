@extends('frontend.main_master')

@section('title')
My Checkout
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Checkout</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->


<div class="body-content">
	<div class="container">
		<div class="checkout-box ">
			<div class="row">
				<div class="col-md-8">
					<div class="panel-group checkout-steps" id="accordion">
						<!-- checkout-step-01  -->
<div class="panel panel-default checkout-step-01">

	<!-- panel-heading -->
		
    <!-- panel-heading -->

	<div id="collapseOne" class="panel-collapse collapse in">

		<!-- panel-body  -->
	    <div class="panel-body">
			<div class="row">		

				<div class="col-md-6 col-sm-6 already-registered-login">
					<h4 class="checkout-subtitle"><b>Data Pemesanan</b> </h4>
					<form class="register-form" role="form">
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Nama Pemesan</b> <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" name="name" placeholder="Nama Anda" value="{{ Auth::user()->name }}">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Email</b> <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" name="email" placeholder="Email Anda" value="{{ Auth::user()->email }}">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Nomor Handphone</b> <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" name="code_post" placeholder="Nomor Handphone" value="{{ Auth::user()->phone }}">
					  </div>


					
					 
					
				</div>	
				
				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 guest-login">
					<h4 class="checkout-subtitle"><b>Data Alamat</b> </h4>
					

					<!-- radio-form  -->
					<div class="form-group">
						<h5><b>Divicion</b> <span class="text-danger">*</span></h5>
						<div class="controls">
						  <select name="division_id" class="form-control" aria-invalid="false" required="">
							<option value="" selected="" disabled>Select Divicion</option>
							@foreach ($division as $row)
								<option value="{{ $row->id }}">{{ $row->division_name }}</option>
							@endforeach
						  </select>
							@error('division_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<h5><b>District</b> <span class="text-danger">*</span></h5>
						<div class="controls">
						  <select name="district_id" class="form-control" aria-invalid="false" required="">
							<option value="" selected="" disabled>Select District</option>
						  </select>
							@error('district_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
						<h5><b>State</b> <span class="text-danger">*</span></h5>
						<div class="controls">
						  <select name="state_id" class="form-control" aria-invalid="false" required="">
							<option value="" selected="" disabled>Select State</option>
													  </select>
							@error('state_id')
							<span class="text-danger">{{ $message }}</span>
							@enderror
						</div>
					</div>

					<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1">Alamat Lengkap<span>*</span></label>
						<textarea class="form-control unicase-form-control text-input" name="notes" id="" cols="30" rows="5" required></textarea>
						@error('notes')
							<span class="text-danger">{{ $message }}</span>
							@enderror
					  </div>

					<button type="submit" class="btn-upper btn btn-primary checkout-page-button checkout-continue ">Continue</button>

				</form>
				</div>
				<!-- guest-login -->

				<!-- already-registered-login -->
				
				<!-- already-registered-login -->		

			</div>			
		</div>
		<!-- panel-body  -->

	</div><!-- row -->
</div>
<!-- checkout-step-01  -->
					  	<!-- checkout-step-06  -->
					  	
					</div><!-- /.checkout-steps -->
				</div>
				<div class="col-md-4">
					<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
	<div class="panel-group">
		<div class="panel panel-default">
			<div class="panel-heading">
		    	<h4 class="unicase-checkout-title">Your Checkout Progress</h4>
		    </div>
		    <div class="">
				<ul class="nav nav-checkout-progress list-unstyled">
                    @foreach ($carts as $row)
					<li>
                        <strong>Image : </strong> &nbsp;&nbsp;
                        <img src="{{ asset($row->options->image) }}" style="height: 70px; width: 70px;" alt="">
                    </li><br>
                    <li>
                        <strong>Qty : </strong>
                         ( {{ $row->qty }} )

						 @if ($row->options->color != NULL)
						 <strong>Color : </strong>
						 {{ $row->options->color }}	 
						 @else
						 
						 @endif

                        <strong>Size : </strong>
                        {{ $row->options->size }}
                    </li><br>
                    @endforeach
					<li>
                        <hr>
                        @if (Session::has('coupon'))
                            <strong>Sub Total : </strong> Rp. {{ $cart_total }} <br>
                            <strong>Coupon Name : </strong> {{ Session::get('coupon')['coupon_name'] }}
                            ({{ Session()->get('coupon')['coupon_discount'] }} %)
							<br>
                            <strong>Coupon Discount : </strong> Rp. {{ Session::get('coupon')['discount_amount'] }}
                            <strong>Grand Total : </strong> Rp. {{ Session::get('coupon')['total_amount'] }}
                            <hr>
                        @else
                        <strong>Sub Total : </strong> Rp. {{ $cart_total }} <br>
                        <strong>Grand Total : </strong> Rp. {{ $cart_total }} <hr>
                        @endif
                    </li>
		

				</ul>		
			</div>
		</div>
	</div>
</div> 
<!-- checkout-progress-sidebar -->				</div>
			</div><!-- /.row -->
		</div><!-- /.checkout-box -->
		<!-- ============================================== BRANDS CAROUSEL ============================================== -->
        @include('frontend.body.brands')
<!-- /.logo-slider -->
<!-- ============================================== BRANDS CAROUSEL : END ============================================== -->	</div><!-- /.container -->
</div><!-- /.body-content -->

@endsection