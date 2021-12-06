<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function sliderView()
    {
        $sliders = Slider::latest()->get();

        return view('backend.slider.index', compact('sliders'));
    }

    public function sliderStore(Request $request)
    {
        $validasi = $request->validate([
            'slider_img' => 'required|image|mimes:jpg,png,jpeg|max:2048',
        ]);

        $image = $request->file('slider_img');
        $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
        Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
        $save_url = 'upload/slider/'.$name_gen;

        Slider::insert([
            'title' => $request->title,
            'description' => $request->description,
            'slider_img' => $save_url,
        ]);

        $notif = array(
            'message' => 'Slider Successfully Inserted',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);

    }

    public function sliderEdit($id)
    {
        $sliders = Slider::findOrFail($id);
        return view('backend.slider.edit', compact('sliders'));

    }

    public function sliderUpdate(Request $request )
    {

        $slider_id = $request->id;
        $old_img = $request->oldimage;

        if($request->file('slider_img')){

            unlink($old_img);
            $image = $request->file('slider_img');
            $name_gen = hexdec(uniqid()).'.'.$image->getClientOriginalExtension();
            Image::make($image)->resize(870,370)->save('upload/slider/'.$name_gen);
            $save_url = 'upload/slider/'.$name_gen;
    
            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
                'slider_img' => $save_url,
            ]);
    
            $notif = array(
                'message' => 'Slider Successfully Updated',
                'alert-type' => 'info'
            );

            return redirect()->route('all.slider')->with($notif);

        }
        else{

            Slider::findOrFail($slider_id)->update([
                'title' => $request->title,
                'description' => $request->description,
            ]);
    
            $notif = array(
                'message' => 'Slider Successfully Updated',
                'alert-type' => 'info'
            );

            return redirect()->route('all.slider')->with($notif);
        }

       

    }

    public function sliderDelete($id)
    {
        $slider = Slider::findOrFail($id);
        $image = $slider->slider_img;

        unlink($image);

        Slider::findOrFail($id)->delete();

        $notif = array(
            'message' => 'Slider Successfully Deleted',
            'alert-type' => 'error'
        );

        return redirect()->back()->with($notif);
    }

    public function sliderInactive($id)
    {
         Slider::findOrFail($id)->update([
             'status' => 0
         ]);

         $notif = array(
            'message' => 'Slider Now Inactive',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notif);
    }

    public function sliderActive($id)
    {
        Slider::findOrFail($id)->update([
            'status' => 1
        ]);

        $notif = array(
            'message' => 'Slider Now Active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notif);
    }
}
