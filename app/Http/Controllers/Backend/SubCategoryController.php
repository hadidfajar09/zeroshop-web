<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\SubCategory;
use App\Models\SubSubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategoryView()
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $subcat = SubCategory::latest()->get();
        return view('backend.subcategory.index', compact('subcat', 'categories'));
    }

    public function subCategoryStore(Request $request)
    {
        $validasi = $request->validate([
            'subcategory_name_ind' => 'required|max:255',
            'subcategory_name_en' => 'required|max:255',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'Please Select Category!'
        ]);
        SubCategory::insert([
            'category_id' =>  $request->category_id,
            'subcategory_name_ind' => $request->subcategory_name_ind,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_ind' => strtolower(str_replace(' ','-',$request->subcategory_name_ind)),
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
            
        ]);

        $notif = array(
            'message' => 'SubCategory Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }

    public function subCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $subcat = SubCategory::findOrFail($id);
        return view('backend.subcategory.edit', compact('subcat','categories'));

    }

    public function subCategoryUpdate(Request $request)
    {
        $validasi = $request->validate([
            'subcategory_name_ind' => 'required|max:255',
            'subcategory_name_en' => 'required|max:255',
            'category_id' => 'required',
        ],[
            'category_id.required' => 'Please Select Category!'
        ]);

        $subcategory_id = $request->id;

        SubCategory::findOrFail($subcategory_id)->update([
            'category_id' =>  $request->category_id,
            'subcategory_name_ind' => $request->subcategory_name_ind,
            'subcategory_name_en' => $request->subcategory_name_en,
            'subcategory_slug_ind' => strtolower(str_replace(' ','-',$request->subcategory_name_ind)),
            'subcategory_slug_en' => strtolower(str_replace(' ','-',$request->subcategory_name_en)),
        ]);

        $notif = array(
            'message' => 'SubCategory Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subcategory')->with($notif);
    }

    public function subCategoryDelete($id)
    {
        $subcategory = SubCategory::findOrFail($id);

        SubCategory::findOrFail($id)->delete();

        $notif = array(
            'message' => 'SubCategory Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }



    ////SUB SUB CATEGORY

    public function subSubCategoryView()
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $subcat = Category::orderBy('category_name_en','asc')->get();
        $subsubcat = SubSubCategory::latest()->get();
        return view('backend.subsubcategory.index', compact('subcat', 'categories', 'subsubcat'));
    }

    public function getSubCat($category_id)
    {
        $subcat = SubCategory::where('category_id',$category_id)->orderBy('subcategory_name_en','asc')->get();

        return json_encode($subcat);
    }

    public function getSubSubCat($subcategory_id)
    {
        $subsubcat = SubSubCategory::where('subcategory_id',$subcategory_id)->orderBy('subsubcategory_name_en','asc')->get();

        return json_encode($subsubcat);
    }

    public function subSubCategoryStore(Request $request)
    {
        $validasi = $request->validate([
            'subsubcategory_name_ind' => 'required|max:255',
            'subsubcategory_name_en' => 'required|max:255',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ],[
            'category_id.required' => 'Please Select Category!',
            'subcategory_id.required' => 'Please Select SubCategory!'
        ]);
        SubSubCategory::insert([
            'category_id' =>  $request->category_id,
            'subcategory_id' =>  $request->subcategory_id,
            'subsubcategory_name_ind' => $request->subsubcategory_name_ind,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_slug_ind' => strtolower(str_replace(' ','-',$request->subsubcategory_name_ind)),
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
            
        ]);

        $notif = array(
            'message' => 'Sub->SubCategory Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }

    public function subSubCategoryEdit($id)
    {
        $categories = Category::orderBy('category_name_en','asc')->get();
        $subcat = SubCategory::orderBy('subcategory_name_en','asc')->get();
        $subsubcat = SubSubCategory::findOrFail($id);
        return view('backend.subsubcategory.edit', compact('subcat','categories','subsubcat'));

    }

    public function subSubCategoryUpdate(Request $request)
    {
        $validasi = $request->validate([
            'subsubcategory_name_ind' => 'required|max:255',
            'subsubcategory_name_en' => 'required|max:255',
            'category_id' => 'required',
            'subcategory_id' => 'required',
        ],[
            'category_id.required' => 'Please Select Category!',
            'subcategory_id.required' => 'Please Select SubCategory!'
        ]);

        $subsubcategory_id = $request->id;

        SubSubCategory::findOrFail($subsubcategory_id)->update([
            'category_id' =>  $request->category_id,
            'subcategory_id' =>  $request->subcategory_id,
            'subsubcategory_name_ind' => $request->subsubcategory_name_ind,
            'subsubcategory_name_en' => $request->subsubcategory_name_en,
            'subsubcategory_slug_ind' => strtolower(str_replace(' ','-',$request->subsubcategory_name_ind)),
            'subsubcategory_slug_en' => strtolower(str_replace(' ','-',$request->subsubcategory_name_en)),
        ]);

        $notif = array(
            'message' => 'Sub->SubCategory Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.subsubcategory')->with($notif);
    }

    public function subSubCategoryDelete($id)
    {
        $subsubcategory = SubSubCategory::findOrFail($id);

        SubSubCategory::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Sub->SubCategory Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }

}
