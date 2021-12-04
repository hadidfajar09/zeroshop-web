@extends('frontend.main_master')

@section('title')
User Profile
@endsection

@section('content')
<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li class='active'>User Profile</li>
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
                    <h3 class="text-center">Update Your Profile </h3>
                    <div class="card-body">
                        <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Email Address </label>
                                <input id="email" class="form-control" disabled type="email" name="email" value="{{ $user->email }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Name </label>
                                <input id="name" class="form-control" type="text" name="name" value="{{ $user->name }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Phone </label>
                                <input id="phone" class="form-control" type="text" name="phone" value="{{ $user->phone }}" required autofocus>
                            </div>
                            <div class="form-group">
                                <label class="info-title" for="exampleInputEmail1">Avatar </label>
                                <input id="profile_photo_path" class="form-control" type="file" name="profile_photo_path">
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