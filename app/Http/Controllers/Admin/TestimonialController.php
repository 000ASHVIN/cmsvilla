<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Industry;
use App\Models\PageHomeItem;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.testimonial.index', compact('testimonial','page_home'));
    }

    public function create()
    {
        $industrys = Industry::all();
        $case_studies = CaseStudy::all();
        return view('admin.testimonial.create', compact('industrys', 'case_studies'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $testimonial = new Testimonial();
        $data = $request->only($testimonial->getFillable());

        $request->validate([
            'name' => 'required|unique:testimonials',
            'designation' => 'required',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'comment' => 'required'
        ]);
        $selectedPages = $request->input('located_page');
        $statement = DB::select("SHOW TABLE STATUS LIKE 'testimonials'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'testimonial-'.$ai_id.time().rand(1, 6000).'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $data['located_page'] = json_encode($selectedPages);
        $testimonial->fill($data)->save();
        $testimonial->industries()->sync($request->located_industry);
        $testimonial->caseStudies()->sync($request->located_case_study);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial is added successfully!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::findOrFail($id);
        $industrys = Industry::all();
        $case_studies = CaseStudy::all();
        return view('admin.testimonial.edit', compact('testimonial', 'industrys', 'case_studies'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $testimonial = Testimonial::findOrFail($id);
        $data = $request->only($testimonial->getFillable());
        $data_encode = json_encode($request->located_page);
        $data['located_page']=$data_encode;
        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required'
                ],
                'designation'   =>  [
                    'required'
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'comment' =>  [
                    'required'
                ]
            ]);
            unlink(public_path('uploads/'.$testimonial->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'testimonial-'.$id.time().rand(1, 6000).'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required'
                ],
                'designation'   =>  [
                    'required'
                ],
                'comment' =>  [
                    'required'
                ]
            ]);
            $data['photo'] = $testimonial->photo;
        }

        $testimonial->fill($data)->save();
        $testimonial->industries()->sync($request->located_industry);
        $testimonial->caseStudies()->sync($request->located_case_study);
        return redirect()->route('admin.testimonial.index')->with('success', 'Testimonial is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $testimonial = Testimonial::findOrFail($id);
        unlink(public_path('uploads/'.$testimonial->photo));
        $testimonial->delete();
        return Redirect()->back()->with('success', 'Testimonial is deleted successfully!');
    }
}
