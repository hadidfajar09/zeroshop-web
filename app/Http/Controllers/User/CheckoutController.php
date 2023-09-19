<?php

namespace App\Http\Controllers\User;

use App\Models\ShipState;
use App\Models\ShipDistrict;
use App\Models\order;
use App\Models\order_item;
use Illuminate\Http\Request;
use Auth;
use App\Http\Controllers\Controller;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

use Illuminate\Support\Facades\Mail;
use App\Mail\OrderMail;

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

            $cart_total = Cart::total();

            if ($request->payment_method == 'stripe') {
                return view('frontend.payment.stripe', compact('data','cart_total'));
            }else if($request->payment_method == 'transfer'){
                return view('frontend.payment.transfer', compact('data'));
            }else{
                return view('frontend.payment.cod', compact('data'));
            }

        }


        //stripe order
        public function StripeOrder(Request $request)
        {
            if(Session::has('coupon')){
                $total_amount = Session::get('coupon')['total_amount_amount'];
            }else{
                $total_amount = round(Cart::total());
            }

            \Stripe\Stripe::setApiKey('sk_test_51MBCT4LRyAGjJ7domtPwWIEBUbjsJJJySlg4QJL0gy8pVN0256r6o3F2s4TwrXsC7BWjx1Bzl1dEfecKsJVA3POt00MtV8IUpO');


	$token = $_POST['stripeToken'];
	$charge = \Stripe\Charge::create([
	  'amount' => $total_amount*100,
	  'currency' => 'usd',
	  'description' => 'ZeroShop',
	  'source' => $token,
	  'metadata' => ['order_id' => uniqid()],
	]);
    
    $order_id = order::insertGetId([
        'user_id' => Auth::id(),
        'division_id' => $request->division_id,
        'district_id' => $request->district_id,
        'state_id' => $request->state_id,
        'code_post' => $request->code_post,
        'name' => $request->name,
        'email' => $request->email,
        'phone' => $request->code_post,
        'notes' => $request->notes,
        'payment_type' => 'Stripe',
        'payment_method' => $charge->payment_method,
        'transaction_id' => $charge->balance_transaction,   
        'currency' => $charge->currency,
        'amount'  => $total_amount,
        'order_number' => $charge->metadata->order_id,
        'invoice_no' => 'ZS'.mt_rand(10000000,99999999),
        'order_date' => Carbon::now()->format('d F Y'),
        'order_month' => Carbon::now()->format('F'),
        'order_year' => Carbon::now()->format('Y'),
        'status' => 'Pending',
        'created_at' => Carbon::now()
    ]);

   // Start Send Email 
   $invoice = Order::findOrFail($order_id);
   $data = [
       'invoice_no' => $invoice->invoice_no,
       'amount' => $total_amount,
       'name' => $invoice->name,
       'email' => $invoice->email,
   ];

   Mail::to($request->email)->send(new OrderMail($data));

   // End Send Email 

    $carts = Cart::content();

    foreach ($carts as $cart) {
        order_item::insert([
            'order_id' => $order_id,
            'product_id' => $cart->id,
            'color' => $cart->options->color,
            'size' => $cart->options->size,
            'qty' => $cart->qty,
            'price' => $cart->price,
            'created_at' => Carbon::now()
        ]);
    }

    if(Session::has('coupon')){
        Session::forget('coupon');
    }

    Cart::destroy();

    $notif = array(
        'message' => 'Berhasil Order Produk',
        'alert-type' => 'success'
    );

    return redirect()->route('dashboard')->with($notif);

}
}
