<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\Slider;

class IndexController extends Controller
{
    public function index()
    {
        $categories = Category::orderBy('category_name_ind','asc')->get();
        $sliders = Slider::orderBy('title','asc')->limit(3)->get();
        $products = Product::where('status',1)->orderBy('id','desc')->limit(6)->get();
        $features = Product::where('featured',1)->orderBy('id','desc')->limit(6)->get();
        $hotdeals = Product::where('hot_deals',1)->where('discount_price','!=',NULL)->orderBy('id','desc')->limit(3)->get();
        $specialoffer = Product::where('special_offer',1)->orderBy('id','desc')->limit(6)->get();
        $specialdeals = Product::where('special_deals',1)->orderBy('id','desc')->limit(3)->get();

        $skip = Category::skip(4)->first();
        $category_pilih = Product::where('status',1)->where('category_id',$skip->id)->orderBy('id','desc')->get();

        $skip1 = Category::skip(1)->first();
        $category_pilih1 = Product::where('status',1)->where('category_id',$skip1->id)->orderBy('id','desc')->get();

        $skip3 = Brand::skip(3)->first();
        $brand_pilih1 = Product::where('status',1)->where('brand_id',$skip3->id)->orderBy('id','desc')->get();
       

        return view('frontend.index', compact('categories','sliders','products','features','hotdeals','specialoffer','specialdeals','skip','category_pilih','skip1','category_pilih1','skip3','brand_pilih1'));
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

    public function indoLanguage()
    {
        session()->get('lang');
        session()->forget('lang');
        Session::put('lang','indo');

        return redirect()->back();
    }

    public function englishLanguage()
    {
        session()->get('lang');
        session()->forget('lang');
        Session::put('lang','en');

        return redirect()->back();
    }

    //DETAILS
    public function productDetails($id,$slug)
    {
        $products = Product::findOrFail($id);
        $multi = MultiImg::where('product_id',$id)->get();

        return view('frontend.product.detail',compact('products','multi'));
    }

    //TAG
    public function productTag($tag)
    {
        $products =  Product::where('status',1)->where('product_tags_ind', $tag)->where('product_tags_en',$tag)->orderBy('id','desc')->get();
        $categories = Category::orderBy('category_name_ind','asc')->get();

        return view('frontend.tag.view',compact('products','categories'));
    }


}
