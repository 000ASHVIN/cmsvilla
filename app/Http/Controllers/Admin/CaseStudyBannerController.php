<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudyBanner;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use DB;

class CaseStudyBannerController extends Controller
{
    public function index()
    {
        $industry = CaseStudyBanner::all();
        return view('admin.case_study_banner.index', compact('industry'));
    }

    public function create()
    {
        return view('admin.case_study_banner.create');
    }

    public function store(Request $request)
    {
        if (env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $request->validate([
            'name' => 'required', // Assuming the table name is 'industries'
            'seo_meta_description' => 'required', // Adjust validation rules as needed
        ]);

        $category = new CaseStudyBanner();
        $data = $request->only($category->getFillable());

        $category->fill($data)->save();

        return redirect()->route('admin.case_study.banner.index')->with('success', 'Industry Banner is added successfully!');
    }
    public function edit($id)
    {
        $industry = CaseStudyBanner::findOrFail($id);
       
        return view('admin.case_study_banner.edit', compact('industry'));
    }
    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'name' => 'required', // Assuming the table name is 'industries'
            'seo_meta_description' => 'required', // Adjust validation rules as needed
        ]);

        $category = CaseStudyBanner::findOrFail($id);
        $data = $request->only($category->getFillable()); 

        $category->fill($data)->save();
        return redirect()->route('admin.case_study.banner.index')->with('success', 'Industry Banner is updated successfully!');
    }
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $industry_item = CaseStudyBanner::findOrFail($id);
        // unlink(public_path('uploads/'.$industry_item->photo));
        $industry_item->delete();
        return Redirect()->back()->with('success', 'Industry Item is deleted successfully!');
    }
    


}
