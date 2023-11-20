<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HowHelp;
use App\Models\Industry;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class HowHelpController extends Controller
{
    public function index()
    {
        $service = HowHelp::all();
        return view('admin.how_help.index', compact('service'));
    }

    public function create()
    {
        $industry = Industry::all();
        return view('admin.how_help.create',compact('industry'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = new HowHelp();
        $data = $request->only($service->getFillable());

        $request->validate([
            'name' => 'required',
            'slug' => 'unique:how_help',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'how_help'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id.rand(1, 6000).'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        if($request->has('industry_id')){
            // $data['industry_id']= json_encode($data['industry_id']);
        }else{
            $data['industry_id'] = null;
        }

        $service->fill($data)->save();
        return redirect()->route('admin.how-help.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $service = HowHelp::findOrFail($id);
        $industry_id = "";
        // if($service->industry_id != null){
        //     $industry_id = json_decode($service->industry_id, true); 
        // }else{
        //     $industry_id = [];
        // }
        $industry = Industry::all();
        return view('admin.how_help.edit',compact('service','industry','industry_id'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = HowHelp::findOrFail($id);
        $data = $request->only($service->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('how_help')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('how_help')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            if($request->input('current_photo') && file_exists($service->photo)){
                unlink(public_path('uploads/'.$service->photo));
            }
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('how_help')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('how_help')->ignore($id),
                ]
            ]);
            $data['photo'] = $service->photo;
        }

        if($request->has('industry_id')){
            // $data['industry_id']= json_encode($data['industry_id']);
        }else{
            $data['industry_id'] = null;
        }
        $service->fill($data)->save();
        return redirect()->route('admin.how-help.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = HowHelp::findOrFail($id);
        unlink(public_path('uploads/'.$service->photo));
        $service->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
