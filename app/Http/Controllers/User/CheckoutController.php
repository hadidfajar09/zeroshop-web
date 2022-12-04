<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    public function getDestrict($division_id)
        {
            $district = ShipDistrict::where('division_id',$division_id)->orderBy('district_name','asc')->get();

            return json_encode($district);
        }

        public function getState($district_id)
        {
            $state = ShipState::where('district_id',$district_id)->orderBy('state_name','asc')->get();

            return json_encode($state);
        }

        public function CheckoutStore(Request $request)
        {
            $data = array();

            $data['name'] = $request->name;
            $data['email'] = $request->email;
            $data['code_post'] = $request->code_post;
            $data['division_id'] = $request->division_id;
            $data['district_id'] = $request->district_id;
            $data['state_id'] = $request->state_id;
            $data['notes'] = $request->notes;

            if ($request->payment_method == 'stripe') {
                return view('frontend.payment.stripe', compact('data'));
            }else if($request->payment_method == 'transfer'){
                return view('frontend.payment.transfer', compact('data'));
            }else{
                return view('frontend.payment.cod', compact('data'));
            }

        }
}
