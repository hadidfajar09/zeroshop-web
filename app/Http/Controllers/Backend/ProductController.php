<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\MultiImg;
use App\Models\Product;
use App\Models\SubSubCategory;
use Carbon\Carbon;
use Intervention\Image\Facades\Image;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function productView()
    {
        $products = Product::latest()->get();

        return view('backend.product.index', compact('products'));
    }


    public function productAdd(Request $request)
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $brands = Brand::orderBy('brand_name','asc')->get();

        return view('backend.product.add',compact('categories','brands'));
    }

    public function productStore(Request $request)
    {
        $validasi = $request->validate([
            'product_thumbnail' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ],[
            'product_thumbnail.required' => 'Please JPG,PNG, or JPEG!',
        ]);

        
        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;

        $product_id =  Product::insertGetId([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'brand_id' => $request->brand_id,
            'product_name_ind' => $request->product_name_ind,
            'product_slug_ind' => strtolower(str_replace(' ','-',$request->product_name_ind)),
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_ind' => $request->product_tags_ind,
            'product_tags_en' => $request->product_tags_en,
            'product_size_ind' => $request->product_size_ind,
            'product_size_en' => $request->product_size_en,
            'product_color_ind' => $request->product_color_ind,
            'product_color_en' => $request->product_color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_ind' => $request->short_desc_ind,
            'short_desc_en' => $request->short_desc_en,
            'long_desc_ind' => $request->long_desc_ind,
            'long_desc_en' => $request->long_desc_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            'product_thumbnail' => $save_url,

            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),



        ]);

        //multi image
        $multi = $request->file('multi_img');
        
        foreach ($multi as $img ) {
            $name_multi = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
            Image::make($img)->resize(917,1000)->save('upload/product/multi/'.$name_multi);
            $upload_path = 'upload/product/multi/'.$name_gen;

            MultiImg::insert([
                'product_id' => $product_id,
                'photo_name' => $upload_path,
                'created_at' => Carbon::now(),
            ]);
        }

        $notif = array(
            'message' => 'Product Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->route('all.product')->with($notif);
    }

    public function productEdit($id)
    {   

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::orderBy('category_name_en','asc')->get();
        $brands = Brand::orderBy('brand_name','asc')->get();
        // $subcategory = SubCategory::orderBy('subcategory_name_en','asc')->get();
        $subsubcategory = SubSubCategory::orderBy('subsubcategory_name_en','asc')->get();

        $products = Product::findOrFail($id);
        return view('backend.product.edit', compact('products','brands','subsubcategory', 'categories','multiImgs'));
    }

    public function productDetail($id)
    {   

        $multiImgs = MultiImg::where('product_id',$id)->get();

        $categories = Category::orderBy('category_name_en','asc')->get();
        $brands = Brand::orderBy('brand_name','asc')->get();
        // $subcategory = SubCategory::orderBy('subcategory_name_en','asc')->get();
        $subsubcategory = SubSubCategory::orderBy('subsubcategory_name_en','asc')->get();

        $products = Product::findOrFail($id);
        return view('backend.product.detail', compact('products','brands','subsubcategory', 'categories','multiImgs'));
    }

    public function productDataUpdate(Request $request)
    {

        $product_id = $request->id;

        Product::findOrFail($product_id)->update([
            'category_id' => $request->category_id,
            'subcategory_id' => $request->subcategory_id,
            'subsubcategory_id' => $request->subsubcategory_id,
            'brand_id' => $request->brand_id,
            'product_name_ind' => $request->product_name_ind,
            'product_slug_ind' => strtolower(str_replace(' ','-',$request->product_name_ind)),
            'product_name_en' => $request->product_name_en,
            'product_slug_en' => strtolower(str_replace(' ','-',$request->product_name_en)),
            'product_code' => $request->product_code,
            'product_qty' => $request->product_qty,
            'product_tags_ind' => $request->product_tags_ind,
            'product_tags_en' => $request->product_tags_en,
            'product_size_ind' => $request->product_size_ind,
            'product_size_en' => $request->product_size_en,
            'product_color_ind' => $request->product_color_ind,
            'product_color_en' => $request->product_color_en,
            'selling_price' => $request->selling_price,
            'discount_price' => $request->discount_price,
            'short_desc_ind' => $request->short_desc_ind,
            'short_desc_en' => $request->short_desc_en,
            'long_desc_ind' => $request->long_desc_ind,
            'long_desc_en' => $request->long_desc_en,
            'hot_deals' => $request->hot_deals,
            'featured' => $request->featured,
            'special_offer' => $request->special_offer,
            'special_deals' => $request->special_deals,

            // 'product_thumbnail' => $save_url,

            'special_deals' => $request->special_deals,
            'status' => 1,
            'created_at' => Carbon::now(),

        ]);

        $notif = array(
            'message' => 'Product Successfully without Image Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.product')->with($notif);
    }

    public function productMultiUpdate(Request $request)
    {
        $multi = $request->multi_img;

        foreach ($multi as $id => $img) {
            $img_del = MultiImg::findOrFail($id);
            if($img_del == NULL){

                $name_multi = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/product/multi/'.$name_multi);
                $upload_path = 'upload/product/multi/'.$name_multi;
    
                MultiImg::where('id',$id)->update([
                    'photo_name' => $upload_path,
                    'updated_at' => Carbon::now(),
                ]);
            }else{

                unlink($img_del->photo_name);

                $name_multi = hexdec(uniqid()).'.'.$img->getClientOriginalExtension();
                Image::make($img)->resize(917,1000)->save('upload/product/multi/'.$name_multi);
                $upload_path = 'upload/product/multi/'.$name_multi;
    
                MultiImg::where('id',$id)->update([
                    'photo_name' => $upload_path,
                    'updated_at' => Carbon::now(),
                ]);
            }
           
        }
        
        $notif = array(
            'message' => 'Product Successfully with MultiImage Updated',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notif);
    }

    public function productThumbnailUpdate(Request $request)
    {
        $id = $request->id;
        $old = $request->old_img;

        unlink($old);

        $image = $request->file('product_thumbnail');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(917,1000)->save('upload/product/thumbnail/'.$name_gen);
        $save_url = 'upload/product/thumbnail/'.$name_gen;

        Product::findOrFail($id)->update([
            'product_thumbnail' => $save_url,
            'updated_at' => Carbon::now(),
        ]);

        $notif = array(
            'message' => 'Product Successfully with Thumbnail Updated',
            'alert-type' => 'info'
        );
        return redirect()->back()->with($notif);


    }

    public function productMultiDelete($id)
    {
        $old = MultiImg::findOrFail($id);

        unlink($old->photo_name);

        MultiImg::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Product Successfully with Multi Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notif);
    } 

    public function productInactive($id)
    {
         Product::findOrFail($id)->update([
             'status' => 0
         ]);

         $notif = array(
            'message' => 'Product Now Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notif);
    }

    public function productActive($id)
    {
        Product::findOrFail($id)->update([
            'status' => 1
        ]);

        $notif = array(
            'message' => 'Product Now Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }

    public function productDelete($id)
    {
        $product = Product::findOrFail($id);

        unlink($product->product_thumbnail);

        Product::findOrFail($id)->delete();

        $images = MultiImg::where('product_id', $id)->get();

        foreach ($images as $img) {
            unlink($img->photo_name);
            MultiImg::where('product_id',$id)->delete();
        }

        $notif = array(
            'message' => 'Product Successfully Deleted',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notif);
    }

}


