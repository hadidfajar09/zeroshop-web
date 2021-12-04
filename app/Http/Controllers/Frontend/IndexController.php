<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class IndexController extends Controller
{
    public function index()
    {
        return view('frontend.index');
    }

    public function userLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }

    public function userProfile()
    {
        $id = Auth::user()->id;
        $user = User::find($id);
        return view('frontend.profile.user_profile', compact('user'));
    }

    public function userUpdate(Request $request)
    {
        $data = User::find(Auth::user()->id);
        $data->name = $request->name;
        $data->phone = $request->phone;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/user_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/user_images'),$fileName);

            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        $notif = array(
            'message' => 'Your Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('dashboard')->with($notif);
    }

    public function userPass()
    {
        $user = User::find(Auth::user()->id);
        return view('frontend.profile.changepass',compact('user'));
    }

    public function passwordUpdate(Request $request)
    {
        $validasi = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);
        $id = Auth::user()->id;
        $hash = User::find($id)->password;
        if (Hash::check($request->oldpassword, $hash)) {
           $User = User::find($id);
           $User->password = Hash::make($request->password);
           $User->save();
           $notif = array(
            'message' => 'Your Password Successfully Changed',
            'alert-type' => 'info'
        );
        Auth::logout();

           return redirect()->route('user.logout')->with($notif);
        }
        else{
            return redirect()->back();
        }
    }
}
