<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categoryView()
    {
        $category = Category::latest()->get();
        return view('backend.category.index', compact('category'));
    }

    public function categoryStore(Request $request)
    {
        $validasi = $request->validate([
            'category_name_ind' => 'required|max:255',
            'category_name_en' => 'required|max:255',
            'category_icon' => 'required|max:255',
        ]);
        Category::insert([
            'category_name_ind' => $request->category_name_ind,
            'category_name_en' => $request->category_name_en,
            'category_slug_ind' => strtolower(str_replace(' ','-',$request->category_name_ind)),
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_icon' =>  $request->category_icon,
        ]);

        $notif = array(
            'message' => 'Category Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);


    }
    public function categoryEdit($id)
    {
        $category = Category::findOrFail($id);
        return view('backend.category.edit', compact('category'));

    }

    public function categoryUpdate(Request $request )
    {
        $validasi = $request->validate([
            'category_name_ind' => 'required|max:255',
            'category_name_en' => 'required|max:255',
            'category_icon' => 'required|max:100',
        ]);

        $category_id = $request->id;

        Category::findOrFail($category_id)->update([
            'category_name_ind' => $request->category_name_ind,
            'category_name_en' => $request->category_name_en,
            'category_slug_ind' => strtolower(str_replace(' ','-',$request->category_name_ind)),
            'category_slug_en' => strtolower(str_replace(' ','-',$request->category_name_en)),
            'category_icon' =>  $request->category_icon,
        ]);

        $notif = array(
            'message' => 'Category Successfully Updated',
            'alert-type' => 'info'
        );
        return redirect()->route('all.category')->with($notif);
    }

    public function categoryDelete($id)
    {
        $category = Category::findOrFail($id);

        Category::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Category Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }



}
