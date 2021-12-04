@extends('frontend.main_master')

@section('title')
Change Password
@endsection

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>Change Password</li>
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
                    <h3 class="text-center"> <span class="text-danger">Change Your Password</span> </h3>
                    <div class="card-body">
                        <form method="post" action="{{ route('user.password.update') }}"  >
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Current Password </label>
                                <input id="current_password" class="form-control" type="password" name="oldpassword" required autofocus >
                                @error('oldpassword')
                                    <span class="invalid-feedback">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">New Password </label>
                                <input id="password" class="form-control" type="password" name="password" required autofocus>
                                @error('password')
                                    <span class="invalid-feedback">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Confirm Password </label>
                                <input id="password_confirmation" class="form-control" type="password" name="password_confirmation" required autofocus>
                                @error('password_confirmation')
                                    <span class="invalid-feedback">
                                        <strong class="text-danger">{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        
                            <br>
                            <div class="form-group">
                               <button type="submit" class="btn btn-danger">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection