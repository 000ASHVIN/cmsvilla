<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\Blog;
use App\Models\PageIndustryItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class IndustryController extends Controller
{
    public function index()
    {
        $industry = Industry::all();
        return view('admin.industry.index', compact('industry'));
    }

    public function create()
    {
        return view('admin.industry.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => 'required|unique:Industry',
            'slug' => 'unique:Industry',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        $category = new Industry();
        $data = $request->only($category->getFillable());
        if(empty($data['slug']))
        {
            unset($data['slug']);
            $data['slug'] = Str::slug($request->name);
        }
        $filteredSlug = str_replace(' ', '_', $data['slug']);
        $data['slug'] = $filteredSlug;

        $statement = DB::select("SHOW TABLE STATUS LIKE 'industry'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $category->fill($data)->save();
        return redirect()->route('admin.industry.index')->with('success', 'Industry is added successfully!');
    }

    public function edit($id)
    {
        $industry = Industry::findOrFail($id);
        $page_home = $industry->pageIndustryItem;
        if(!$page_home) {
            $page_home = $industry->pageIndustryItem()->create([
                'trusted_company_title' => 'Client Scroll',
                'need_title' => 'Need for Reconcify',
                'workflow_title' => 'Workflow',
                'how_help_title' => 'How Reconcify Helps',
                'industry_title' => 'Industry Display',
                'need_status' =>'Show',
                'workflow_status' =>'Show',
                'case_study_status' =>'Show',
                'trusted_company_status' =>'Show',
                'testimonial_status' =>'Show',
                'how_help_status' => 'Show',
                'industry_status'=> 'Show',
            ]);
            
        }
        return view('admin.industry.edit', compact('industry', 'page_home'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        $service = Industry::findOrFail($id); 
        $data = $request->only($service->getFillable());
        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('industry')->ignore($id),
                ],
                'slug'   =>  [
                    Rule::unique('industry')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if(isset($service->photo) && $service->photo != null) {
                if(file_exists($service->photo)) {
                    unlink(public_path('uploads/'.$service->photo));
                }
            }
            $ext = $request->file('photo')->extension();
            $final_name = 'service-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
     }   else {
        $request->validate([
            'name'   =>  [
                'required',
                Rule::unique('industry')->ignore($id),
            ],
            'slug'   =>  [
                Rule::unique('industry')->ignore($id),
            ]
        ]);
        $data['photo'] = $service->photo;
    }

        if(empty($data['slug']))
        {
            unset($data['slug']);
            $data['slug'] = Str::slug($request->name);
        }
        $filteredSlug = str_replace(' ', '_', $data['slug']);
        $data['slug'] = $filteredSlug;
        
        $service->fill($data)->save();
        return redirect()->route('admin.industry.index')->with('success', 'Industry is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        // Deleting data from "Industry" table
        $category = Industry::findOrFail($id);
        $category->delete();

        // Deleting data from "blogs" table
        $all_data = DB::table('blogs')->where('category_id', $id)->get();
        foreach($all_data as $row)
        {
            unlink(public_path('uploads/'.$row->blog_photo));
        }
        DB::table('blogs')->where('category_id',$id)->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Industry is deleted successfully!');
    }

}
