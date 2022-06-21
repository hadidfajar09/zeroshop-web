<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use App\Models\Product;
use App\Models\Wistlist;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function productCartStore(Request $request, $id)
    {

        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        
        $product = Product::findOrFail($id);

        if ($product->discount_price == NULL) {
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);

            return response()->json([
                'success' => 'Sukses di tambahkan ke Keranjang'
            ]);
        }else{
            Cart::add([
                'id' => $id,
                'name' => $request->product_name,
                'qty' => $request->quantity,
                'price' => $product->selling_price - $product->discount_price,
                'weight' => 1,
                'options' => [
                    'image' => $product->product_thumbnail,
                    'color' => $request->color,
                    'size' => $request->size,
                ],
            ]);
            return response()->json([
                'success' => 'Sukses di tambahkan ke Keranjang'
            ]);
        }
    }

    public function productMiniCart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => round($cart_total)
        ));
    }

    public function removeMiniCart($rowId)
    {
        Cart::remove($rowId);
        return response()->json(['success' => 'Product di Keranjang berhasil dihapus']);
    }

    public function addToWishlist(Request $request, $product_id)
    {
        if (Auth::check()) {
            $exist = Wistlist::where('user_id',Auth::id())->where('product_id',$product_id)->first();

            if ($exist) {

                return response()->json(['error' => 'Product Sudah di wistlist ']);
            } else {
                       
            Wistlist::insert([
                'user_id' => Auth::id(),
                'product_id' => $product_id,
                'created_at' => Carbon::now()
            ]);
            return response()->json(['success' => 'Berhasil Menambah ke wistlist ']);
            }
     

            
        }else{
            return response()->json(['error' => 'Silahkan Login Terlebih dahulu!']);
        }
    }

    public function viewMycart()
    {
        return view('frontend.wishlist.view_mycart');
    }

    public function listMycart()
    {
        $carts = Cart::content();
        $cart_qty = Cart::count();
        $cart_total = Cart::total();

        return response()->json(array(
            'carts' => $carts,
            'cart_qty' => $cart_qty,
            'cart_total' => round($cart_total)
        ));
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        if (Session::has('coupon')) {
            Session::forget('coupon');
        }
        return response()->json(['success' => 'Product di Keranjang berhasil dihapus']);
    }

    public function cartIncrement($rowId)
    {
         $row = Cart::get($rowId);

         Cart::update($rowId , $row->qty + 1);

         if (Session::has('coupon')) {
             $coupon_name = Session::get('coupon')['coupon_name'];
             $coupon =   $coupon = Coupon::where('coupon_name', $coupon_name)->first();
             Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total()  * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total()  * $coupon->coupon_discount/100),
            ]);
         }
         return response()->json('increment');

    }

    public function cartDecrement($rowId)
    {
         $row = Cart::get($rowId);

         Cart::update($rowId , $row->qty - 1);

         if (Session::has('coupon')) {
            $coupon_name = Session::get('coupon')['coupon_name'];
            $coupon =   $coupon = Coupon::where('coupon_name', $coupon_name)->first();
            Session::put('coupon',[
               'coupon_name' => $coupon->coupon_name,
               'coupon_discount' => $coupon->coupon_discount,
               'discount_amount' => round(Cart::total()  * $coupon->coupon_discount/100),
               'total_amount' => round(Cart::total() - Cart::total()  * $coupon->coupon_discount/100),
           ]);
        }
         return response()->json('decrement');

    }

    public function couponApply(Request $request)
    {
        $coupon = Coupon::where('coupon_name', $request->coupon_name)->where('coupon_valid','>=',Carbon::now()->format('Y-m-d'))->first();

        if ($coupon) {
            Session::put('coupon',[
                'coupon_name' => $coupon->coupon_name,
                'coupon_discount' => $coupon->coupon_discount,
                'discount_amount' => round(Cart::total()  * $coupon->coupon_discount/100),
                'total_amount' => round(Cart::total() - Cart::total()  * $coupon->coupon_discount/100),
            ]);

            return response()->json(array(
                'success' => 'Coupon Sukses Digunakan'
            ));
        }else{
            return response()->json(['error' => 'Kode Invalid']);
        }
    }

    public function CouponCalculation()
    {
        if (Session::has('coupon')) {
            return response()->json(array(
                'subTotal' => round(Cart::total()) ,
                'coupon_name' => session()->get('coupon')['coupon_name'],
                'coupon_discount' => session()->get('coupon')['coupon_discount'],
                'discount_amount' => session()->get('coupon')['discount_amount'],
                'total_amount' => session()->get('coupon')['total_amount'],
            ));
        } else {
            return response()->json(array(
                'total' => round(Cart::total()),
            ));
        }
        
    }

    public function CouponRemove()
    {
        Session::forget('coupon');

        return response()->json(['success' => 'Coupon Berhasil dihapus'] );
    }

    //produk cheakout

    public function productCheckout()
    {
        if(Auth::check()){
            if (Cart::total() > 0) {
                
            $carts = Cart::content();
            $cart_qty = Cart::count();
            $cart_total = round(Cart::total());

                return view('frontend.checkout.view', compact('carts','cart_qty','cart_total'));
            } else {
                $notif = array(
                    'message' => 'Need To Shopping First!',
                    'alert-type' => 'error'
                );
    
                return redirect()->to('/')->with($notif);
            }
            
        }else{
            $notif = array(
                'message' => 'Need To Login First!',
                'alert-type' => 'error'
            );

            return redirect()->route('login')->with($notif);
        }
        }
    }

