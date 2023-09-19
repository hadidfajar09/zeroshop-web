<div class="col-md-2">  <br>
    <img src="{{ (!empty($user->profile_photo_path))? url('upload/user_images/'.$user->profile_photo_path):url('upload/img_admin.png') }}" class="card-image-top" style="border-radius: 50%" alt="" height="170px" width="170px"> <br><br>
    <ul class="list-group list-group-flush">
        <a href="{{ route('dashboard') }}" class="btn btn-primary btn-sm btn-block">Dashboard</a>
        <a href="{{ route('user.profile') }}" class="btn btn-primary btn-sm btn-block">Profile</a>
        <a href="{{ route('user.change.password') }}" class="btn btn-primary btn-sm btn-block">Change Password</a>
        <a href="{{ route('my.orders') }}" class="btn btn-success btn-sm btn-block">My Orders</a>
        <a href="{{ route('user.logout') }}" class="btn btn-danger btn-sm btn-block">Logout</a>
    </ul>
</div>