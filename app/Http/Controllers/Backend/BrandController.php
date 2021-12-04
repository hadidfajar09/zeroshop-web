<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    public function brandView()
    {
        $brands = Brand::latest()->get();
        return view('backend.brand.index', compact('brands'));
    }

    public function brandStore(Request $request)
    {
        $validasi = $request->validate([
            'brand_name' => 'required|max:255',
            'brand_image' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('brand_image');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
        $save_url = 'upload/brand/'.$name_gen;

        Brand::insert([
            'brand_name' => $request->brand_name,
            'slug' => strtolower(str_replace(' ','-',$request->brand_name)),
            'brand_image' => $save_url,
        ]);

        $notif = array(
            'message' => 'Brand Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }

    public function brandEdit($id)
    {
        $brands = Brand::findOrFail($id);
        return view('backend.brand.edit', compact('brands'));

    }

    public function brandUpdate(Request $request )
    {
        $validasi = $request->validate([
            'brand_name' => 'required|max:255',
        ]);

        $brand_id = $request->id;
        $old_img = $request->oldimage;

        if($request->file('brand_image')){

            unlink($old_img);
            $image = $request->file('brand_image');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(300,300)->save('upload/brand/'.$name_gen);
            $save_url = 'upload/brand/'.$name_gen;
    
            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'slug' => strtolower(str_replace(' ','-',$request->brand_name)),
                'brand_image' => $save_url,
            ]);
    
            $notif = array(
                'message' => 'Brand Successfully Updated',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notif);

        }
        else{

            Brand::findOrFail($brand_id)->update([
                'brand_name' => $request->brand_name,
                'slug' => strtolower(str_replace(' ','-',$request->brand_name)),
            ]);
    
            $notif = array(
                'message' => 'Brand Successfully Updated',
                'alert-type' => 'info'
            );

            return redirect()->route('all.brand')->with($notif);
        }

       

    }
    
    public function brandDelete($id)
    {
        $brand = Brand::findOrFail($id);
        $image = $brand->brand_image;

        unlink($image);

        Brand::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Brand Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }
}
