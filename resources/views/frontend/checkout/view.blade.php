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


					<form class="register-form" action="{{ route('checkout.store') }}" role="form" method="post">
						@csrf
						<div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Nama Pemesan</b> <span>*</span></label>
					    <input type="text" class="form-control unicase-form-control text-input" name="name" placeholder="Nama Anda" required value="{{ Auth::user()->name }}">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Email</b> <span>*</span></label>
					    <input type="email" class="form-control unicase-form-control text-input" name="email" placeholder="Email Anda" required value="{{ Auth::user()->email }}">
					  </div>

					  <div class="form-group">
					    <label class="info-title" for="exampleInputEmail1"><b>Nomor HP</b> <span>*</span></label>
					    <input type="number" class="form-control unicase-form-control text-input" name="code_post" placeholder="Nomor Handphone" required value="{{ Auth::user()->phone }}">
					  </div>


					
					 
					
				</div>	
				
				<!-- guest-login -->			
				<div class="col-md-6 col-sm-6 guest-login">
					<h4 class="checkout-subtitle"><b>Data Alamat</b> </h4>
					

					<!-- radio-form  -->
					<div class="form-group">
						<h5><b>Division</b> <span class="text-danger">*</span></h5>
						<div class="controls">
						  <select name="division_id" class="form-control" aria-invalid="false" required="">
							<option value="" selected="" disabled>Select Division</option>
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
                        <img src="{{ asset($row->options->image) }}" style="height: 80px; width: 80px; float: left; margin-right: 8px;" alt="">  &nbsp;&nbsp;
						<h6>{{ $row->name }}</h6>
						<strong>Qty : </strong>
						( {{ $row->qty }} )

						@if ($row->options->color != NULL)
						<strong>Warna : </strong>
						{{ $row->options->color }}	 
						@else
						
						@endif

						@if ($row->options->size != NULL)
						<strong>Size : </strong>
						{{ $row->options->size }}	 
						@else
						
						@endif

                    </li>
					<br>
                    
                    @endforeach
					<li>
                        <hr>
						@if (Session::has('coupon'))
						<table>
							<tr>
								<td><strong>Sub Total </strong> </td>
								<td>:&nbsp;&nbsp;</td>
								<td>Rp. {{ $cart_total }}</td>
							</tr>
							<tr>
								<td><strong>Coupon Name  </strong> </td>
								<td>:&nbsp;&nbsp;</td>
								<td>{{ Session::get('coupon')['coupon_name'] }}
									({{ Session()->get('coupon')['coupon_discount'] }} %)</td>
							</tr>
							<tr>
								<td><strong>Coupon Discount  </strong> </td>
								<td>:&nbsp;&nbsp;</td>
								<td>Rp. {{ Session::get('coupon')['discount_amount'] }}</td>
							</tr>
							<tr>
								<td><strong>Grand Total  </strong> </td>
								<td>:&nbsp;&nbsp;</td>
								<td>Rp. {{ Session::get('coupon')['total_amount'] }}</td>
							</tr>
							
						</table>
					@else
					<table>
						<tr>
							<td><strong>Sub Total </strong> </td>
							<td>: &nbsp;&nbsp;</td>
							<td>Rp. {{ $cart_total }}</td>
						</tr>
						<tr>
							<td><strong>Grand Total </strong> </td>
							<td>:&nbsp;&nbsp;</td>
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



<div class="col-md-4">
	<!-- checkout-progress-sidebar -->
<div class="checkout-progress-sidebar ">
<div class="panel-group">
<div class="panel panel-default">
<div class="panel-heading">
<h4 class="unicase-checkout-title">Metode Pembayaran</h4>
</div>


<div class="row">
	<div class="col-md-4">
		<input id="register" type="radio" name="payment_method" required value="stripe">  
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

<script type="text/javascript">
	$(document).ready(function(){
	  $('select[name="division_id"]').on('change',function(){
		var division_id = $(this).val();
		if(division_id){
		  $.ajax({
			url: "{{ url('/division/district/ajax') }}/"+division_id,
			type: "GET",
			dataType: "json",
			success:function(data){
			  $('select[name="state_id"]').html('');
			  var d =$('select[name="district_id"]').empty();
				  $.each(data, function(key,value){
					$('select[name="district_id"]').append('<option value="'+value.id+'">'+value.district_name+'</option>');
				  });
			},
		  });
		}else{
		  alert('danger');
		}
	  });

	  $('select[name="district_id"]').on('change',function(){
		var district_id = $(this).val();
		if(district_id){
		  $.ajax({
			url: "{{ url('/division/state/ajax') }}/"+district_id,
			type: "GET",
			dataType: "json",
			success:function(data){
			  
			  var d =$('select[name="state_id"]').empty();
				  $.each(data, function(key,value){
					$('select[name="state_id"]').append('<option value="'+value.id+'">'+value.state_name+'</option>');
				  });
			},
		  });
		}else{
		  alert('danger');
		}
	  });
	});
</script>

@endsection