<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class CaseStudyController extends Controller
{
    public function index()
    {
        $service = CaseStudy::all();
        return view('admin.case_study.index', compact('service'));
    }

    public function create()
    {
        return view('admin.case_study.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = new CaseStudy();
        $data = $request->only($service->getFillable());

        $request->validate([
            'name' => 'required|unique:case_studies',
            'slug' => 'unique:case_studies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }
        $filteredSlug = str_replace(' ', '_', $data['slug']);
        $data['slug'] = $filteredSlug;

        $statement = DB::select("SHOW TABLE STATUS LIKE 'case_studies'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $service->fill($data)->save();
        return redirect()->route('admin.case-study.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        $service = CaseStudy::findOrFail($id);
        return view('admin.case_study.edit', compact('service'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = CaseStudy::findOrFail($id);
        $data = $request->only($service->getFillable());
        $filteredSlug = str_replace(' ', '_', $data['slug']);
        $data['slug'] = $filteredSlug;
        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('case_studies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('case_studies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if($request->input('current_photo') && file_exists($service->photo)){
                unlink(public_path('uploads/'.$service->photo));
            }
            // unlink(public_path('uploads/'.$service->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('case_studies')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('case_studies')->ignore($id),
                ]
            ]);
            $data['photo'] = $service->photo;
        }

        $service->fill($data)->save();
        return redirect()->route('admin.case-study.index')->with('success', 'Service is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $service = CaseStudy::findOrFail($id);
        // unlink(public_path('uploads/'.$service->photo));
        $service->delete();
        return Redirect()->back()->with('success', 'Service is deleted successfully!');
    }
}
