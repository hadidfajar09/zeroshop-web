@extends('frontend.main_master')

@section('title')
Dashboard
@endsection

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Dashboard</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
    <div class="container">
        <div class="row">

            @include('frontend.profile.sidebar')

            <div class="col-md-2">
                
            </div>

            <div class="col-md-6">
                <div class="card">
                    <h3 class="text-center"> <span class="text-danger">Hii...</span><strong>{{ Auth::user()->name }}</strong> Welcome to Zeroshop</h3>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection