<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Wistlist;
use Illuminate\Http\Request;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class CartController extends Controller
{
    public function productCartStore(Request $request, $id)
    {
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
        return response()->json(['success' => 'Product di Keranjang berhasil dihapus']);
    }

    public function cartIncrement($rowId)
    {
         $row = Cart::get($rowId);

         Cart::update($rowId , $row->qty + 1);
         return response()->json('increment');

    }

    public function cartDecrement($rowId)
    {
         $row = Cart::get($rowId);

         Cart::update($rowId , $row->qty - 1);
         return response()->json('decrement');

    }
}
