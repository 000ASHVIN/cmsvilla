<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class SliderController extends Controller
{
    public function index()
    {
        $slider = Slider::all();
        return view('admin.slider.index', compact('slider'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'slider_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'sliders'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('slider_photo')->extension();
        $final_name = 'slider-'.$ai_id.rand(1, 6000).'.'.$ext;
        $request->file('slider_photo')->move(public_path('uploads'), $final_name);

        $slider = new Slider();
        $data = $request->only($slider->getFillable());

        unset($data['slider_photo']);
        $data['slider_photo'] = $final_name;

        $slider->fill($data)->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider is added successfully!');
    }

    public function edit($id)
    {
        $slider = Slider::findOrFail($id);
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $slider = Slider::findOrFail($id);
        $data = $request->only($slider->getFillable());

        if ($request->hasFile('slider_photo')) {

            $request->validate([
                'slider_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            unlink(public_path('uploads/'.$slider->slider_photo));

            // Uploading the file
            $ext = $request->file('slider_photo')->extension();
            $final_name = 'slider-'.$id.'.'.$ext;
            $request->file('slider_photo')->move(public_path('uploads/'), $final_name);

            unset($data['slider_photo']);
            $data['slider_photo'] = $final_name;
        }

        if ($request->hasFile('right_side_photo')) {

            $request->validate([
                'right_side_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);

            if($slider->right_side_photo)
                unlink(public_path('uploads/'.$slider->right_side_photo));

            // Uploading the file
            $ext = $request->file('right_side_photo')->extension();
            $final_name = 'slider-right-'.$id.'.'.$ext;
            $request->file('right_side_photo')->move(public_path('uploads/'), $final_name);

            unset($data['right_side_photo']);
            $data['right_side_photo'] = $final_name;
        }

        $slider->fill($data)->save();

        return redirect()->route('admin.slider.index')->with('success', 'Slider is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $slider = Slider::findOrFail($id);
        unlink(public_path('uploads/'.$slider->slider_photo));
        $slider->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Slider is deleted successfully!');
    }

}
