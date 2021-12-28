<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\ShipDistrict;
use App\Models\Shipping;
use App\Models\ShipState;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class ShippingAreaController extends Controller
{
    public function shippingView()
    {
        $shippings = Shipping::orderBy('id','desc')->get();

        return view('backend.shipping.division.index',compact('shippings'));
    }

    public function shippingStore(Request $request)
    {
        $validasi = $request->validate([
            'division_name' => 'required|max:255',
        ]);
        Shipping::insert([
            'division_name' => $request->division_name,
            'created_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Division Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }

    public function shippingEdit($id)
    {
        $shippings = Shipping::findOrFail($id);
        return view('backend.shipping.division.edit', compact('shippings'));
    }

    public function shippingUpdate(Request $request )
    {
        $validasi = $request->validate([
            'division_name' => 'required|max:255',
        ]);

        $division_id = $request->id;

        Shipping::findOrFail($division_id)->update([
            'division_name' => $request->division_name,
            'updated_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Division Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.shipping')->with($notif);
    }

    public function  shippingDelete($id)
    {

        Shipping::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Division Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }

    public function districtView()
    {
        $division = Shipping::orderBy('division_name','desc')->get();
        $district = ShipDistrict::orderBy('id','desc')->get();

        return view('backend.shipping.district.index',compact('district','division'));
    }

    public function districtStore(Request $request)
    {
        $validasi = $request->validate([
            'district_name' => 'required|max:255',
            'division_id' => 'required',
        ],[
            'division_id.required' => 'Please Select Division!'
        ]);
        ShipDistrict::insert([
            'division_id' =>  $request->division_id,
            'district_name' => $request->district_name,
            'created_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Disctrict Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }

    public function districtEdit($id)
    {
        $division = Shipping::orderBy('division_name','desc')->get();
        $district = ShipDistrict::findOrFail($id);
        return view('backend.shipping.district.edit',compact('district','division'));

    }

    public function districtUpdate(Request $request)
    {
        $validasi = $request->validate([
            'district_name' => 'required|max:255',
            'division_id' => 'required',
        ],[
            'division_id.required' => 'Please Select Division!'
        ]);
        $district_id = $request->id;

        ShipDistrict::findOrFail($district_id)->update([
            'division_id' =>  $request->division_id,
            'district_name' => $request->district_name,
            'updated_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'Disctrict Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.district')->with($notif);
    }

    public function districtDelete($id)
    {

        ShipDistrict::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Disctrict Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }

    public function stateView()
    {
        $division = Shipping::orderBy('division_name','asc')->get();
        $district = ShipDistrict::orderBy('district_name','asc')->get();
        $state = ShipState::latest()->get();

        return view('backend.shipping.state.index',compact('district','division','state'));
    }   

    public function getDistrict($division_id)
    {
        $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','asc')->get();

        return json_encode($district);
    }

    public function stateStore(Request $request)
    {
        $validasi = $request->validate([
            'state_name' => 'required|max:255',
            'division_id' => 'required',
            'district_id' => 'required',
        ],[
            'division_id.required' => 'Please Select Division!',
            'district_id.required' => 'Please Select District!'
        ]);
        ShipState::insert([
            'division_id' =>  $request->division_id,
            'district_id' =>  $request->district_id,
            'state_name' => $request->state_name,
            'created_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'State Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }

    public function stateEdit($id)
    {
        $division = Shipping::orderBy('division_name','asc')->get();
        $district = ShipDistrict::orderBy('district_name','asc')->get();
        $state = ShipState::findOrFail($id);
        return view('backend.shipping.state.edit', compact('division','district','state'));

    }

    public function stateUpdate(Request $request)
    {
        $validasi = $request->validate([
            'state_name' => 'required|max:255',
            'division_id' => 'required',
            'district_id' => 'required',
        ],[
            'division_id.required' => 'Please Select Division!',
            'district_id.required' => 'Please Select District!'
        ]);

        $state = $request->id;

        ShipState::findOrFail($state)->update([
            'division_id' =>  $request->division_id,
            'district_id' =>  $request->district_id,
            'state_name' => $request->state_name,
            'updated_at' => Carbon::now()
        ]);

        $notif = array(
            'message' => 'State Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.state')->with($notif);
    }

    public function stateDelete($id)
    {
        $state = ShipState::findOrFail($id);

        ShipState::findOrFail($id)->delete();

        $notif = array(
            'message' => 'State Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }

}
