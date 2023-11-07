<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class ServiceController extends Controller
{
    public function index()
    {
        $service = Service::all();
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.service.index', compact('service','page_home'));
    }

    public function create()
    {
        return view('admin.service.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = new Service();
        $data = $request->only($service->getFillable());

        $request->validate([
            'name' => 'required|unique:services',
            'slug' => 'unique:services',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }

        $statement = DB::select("SHOW TABLE STATUS LIKE 'services'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $service->fill($data)->save();
        return redirect()->route('admin.service.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $service = Service::findOrFail($id);
        return view('admin.service.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = Service::findOrFail($id);
        $data = $request->only($service->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('services')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('services')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$service->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('services')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('services')->ignore($id),
                ]
            ]);
            $data['photo'] = $service->photo;
        }

        $service->fill($data)->save();
        return redirect()->route('admin.service.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = Service::findOrFail($id);
        unlink(public_path('uploads/'.$service->photo));
        $service->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
