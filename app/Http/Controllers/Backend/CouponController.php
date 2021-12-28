<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function couponView()
    {
        $coupons = Coupon::orderBy('id','desc')->get();
        return view('backend.coupon.index', compact('coupons'));
    }

    public function couponStore(Request $request)
    {
        $validasi = $request->validate([
            'coupon_name' => 'required|max:255',
            'coupon_discount' => 'required|max:255',
            'coupon_valid' => 'required',
        ]);
        Coupon::insert([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_valid' =>  $request->coupon_valid,
            'created_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Coupon Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }

    public function couponEdit($id)
    {
        $coupons = Coupon::findOrFail($id);
        return view('backend.coupon.edit', compact('coupons'));

    }

    public function couponUpdate(Request $request )
    {
        $validasi = $request->validate([
            'coupon_name' => 'required|max:255',
            'coupon_discount' => 'required|max:255',
            'coupon_valid' => 'required',
        ]);
        $coupon_id = $request->id;

        Coupon::findOrFail($coupon_id)->update([
            'coupon_name' => strtoupper($request->coupon_name),
            'coupon_discount' => $request->coupon_discount,
            'coupon_valid' =>  $request->coupon_valid,
            'updated_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Coupon Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.coupon')->with($notif);
    }

    public function couponDelete($id)
    {
        $coupons = Coupon::findOrFail($id);

        Coupon::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Coupon Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }
}
