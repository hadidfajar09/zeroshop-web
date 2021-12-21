@extends('frontend.main_master')

@section('title')
My Cart
@endsection

@section('content')

<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>My Cart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content outer-top-xs">
	<div class="container">
	
		<div class="row ">
			<div class="shopping-cart">
				<div class="shopping-cart-table ">
	<div class="table-responsive">
		<table class="table">
			<thead>
				<tr>
					<th class="cart-description item">Image</th>
					<th class="cart-product-name item">Product</th>
					<th class="cart-romove item">Color</th>
					<th class="cart-edit item">Size/Type</th>
					<th class="cart-qty item">Quantity</th>
					<th class="cart-sub-total item">Subtotal</th>
					<th class="cart-total last-item">Remove</th>
				</tr>
			</thead><!-- /thead -->
			<tbody id="mycart">
                
			</tbody>
		</table>
	</div>
</div>			
</div><!-- /.row -->
		</div><!-- /.sigin-in-->
        @include('frontend.body.brands')

    </div>
@endsection