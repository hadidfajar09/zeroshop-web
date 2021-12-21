<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Wistlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WishlistController extends Controller
{
    public function viewWistlist()
    {
        $wishlist = Wistlist::get();
        return view('frontend.wishlist.view',compact('wishlist'));
    }

    public function listWishlist()
    {
        $wishlist = Wistlist::with('product')->where('user_id',Auth::id())->latest()->get();
        return response()->json($wishlist);
    }

    public function removeWishlist($id)
    {
        Wistlist::where('user_id',Auth::id())->where('id',$id)->delete();
        return response()->json(['success' => 'Product di Wishlist berhasil dihapus']);
    }
}
