<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function adminProfile()
    {
        $data = Admin::find(1);
        return view('admin.admin_profile', compact('data'));
    }

    public function profileEdit()
    {
        $editData = Admin::find(1);
        return view('admin.admin_edit', compact('editData'));
    }

    public function profileUpdate(Request $request)
    {
        $data = Admin::find(1);
        $data->name = $request->name;
        $data->email = $request->email;

        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            @unlink(public_path('upload/admin_images/'.$data->profile_photo_path));
            $fileName = date('YmdHi').$file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'),$fileName);

            $data['profile_photo_path'] = $fileName;
        }

        $data->save();

        $notif = array(
            'message' => 'Admin Profile Updated Successfully',
            'alert-type' => 'success'
        );

        return redirect()->route('admin.profile')->with($notif);

    }

    public function changePassword()
    {
        return view('admin.admin_password');
    }

    public function passwordUpdate(Request $request)
    {
        $validasi = $request->validate([
            'oldpassword' => 'required',
            'password' => 'required|confirmed',
        ]);

        $hash = Admin::find(1)->password;
        if (Hash::check($request->oldpassword, $hash)) {
           $admin = Admin::find(1);
           $admin->password = Hash::make($request->password);
           $admin->save();
           $notif = array(
            'message' => 'Admin Change Password Successfully',
            'alert-type' => 'success'
        );
           Auth::logout();
           return redirect()->route('admin.logout')->with($notif);
        }
        else{
            return redirect()->back();
        }
    }
}
