<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Industry;
use App\Models\Seo;
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
        $industrys = Industry::all();
        $seo = Seo::where('page','case_study')->first();
        return view('admin.case_study.create',compact('industrys','seo'));
    }

    public function store(Request $request,$content_id = 0)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        $service = new CaseStudy();
        $data = $request->only($service->getFillable());

        $request->validate([
            'name' => 'required|unique:case_studies',
            'slug' => 'unique:case_studies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if(empty($data['slug'])) {
            $data['slug'] = Str::slug($request->name);
        }
        $filteredSlug = str_replace(' ', '_', $data['slug']);
        $data['slug'] = $filteredSlug;

        $statement = DB::select("SHOW TABLE STATUS LIKE 'case_studies'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'service-'.$ai_id. rand(1, 6000).'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $service->fill($data)->save();
        $service->industries()->sync($request->located_industry);

        $seo = Seo::where('page', $request->input('page'));
        // dd($seo);
        // if(isset($content_id) && $content_id && !empty($content_id)) {
            $seo = $seo->where('content_id', $service->id);
        // }

        $seo_home = $seo->first();
        if(!$seo_home) {
            $seo_home = new Seo();
        }

        if ($request->hasFile('meta_image')) {
    
            if($request->input('current_photo') && file_exists($request->photo)){
                unlink(public_path('uploads/'.$request->photo));
            }
            $metaImage = $request->file('meta_image');
            $metaImageName = time() . '_' . $metaImage->getClientOriginalName();
            $metaImage->storeAs('public/meta_images', $metaImageName);
            $data['meta_image'] = 'meta_images/' . $metaImageName;
        }
    
        if ($request->hasFile('facebook_image')) {
            $facebookImage = $request->file('facebook_image');
            $facebookImageName = time() . '_' . $facebookImage->getClientOriginalName();
            $facebookImage->storeAs('public/facebook_images', $facebookImageName);
            $data['facebook_image'] = 'facebook_images/' . $facebookImageName;
        }
    
        if ($request->hasFile('twitter_image')) {
            $twitterImage = $request->file('twitter_image');
            $twitterImageName = time() . '_' . $twitterImage->getClientOriginalName();
            $twitterImage->storeAs('public/twitter_images', $twitterImageName);
            $data['twitter_image'] = 'twitter_images/' . $twitterImageName;
        }
        $data['page'] = $request->input('page');
        $data['content_id'] = $service->id;
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['facebook_title'] = $request->input('facebook_title');
        $data['facebook_description'] = $request->input('facebook_description');
        $data['twitter_title'] = $request->input('twitter_title');
        $data['twitter_description'] = $request->input('twitter_description');
        $data['key_words'] = $request->input('key_words');
        $data['meta_robots'] = $request->input('meta_robots');
        $seo_home->fill($data)->save();


        return redirect()->route('admin.case-study.index')->with('success', 'Service is added successfully!');
    }

    public function edit($id)
    {
        // $seo = Seo::where('page','case_study')->first();
        $seo = Seo::where('page','case_study')->where('content_id', $id)->first();
        $service = CaseStudy::findOrFail($id);
        $industrys = Industry::all();
        return view('admin.case_study.edit', compact('service','industrys','seo'));
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
                'photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
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

        $service->industries()->sync($request->located_industry);
        $service->fill($data)->save();

        $seo = Seo::where('page', $request->input('page'));
        // dd($seo);
        // if(isset($content_id) && $content_id && !empty($content_id)) {
            $seo = $seo->where('content_id', $id);
        // }

        $seo_home = $seo->first();
        if(!$seo_home) {
            $seo_home = new Seo();
        }

        if ($request->hasFile('meta_image')) {
    
            if($request->input('current_photo') && file_exists($request->photo)){
                unlink(public_path('uploads/'.$request->photo));
            }
            $metaImage = $request->file('meta_image');
            $metaImageName = time() . '_' . $metaImage->getClientOriginalName();
            $metaImage->storeAs('public/meta_images', $metaImageName);
            $data['meta_image'] = 'meta_images/' . $metaImageName;
        }
    
        if ($request->hasFile('facebook_image')) {
            $facebookImage = $request->file('facebook_image');
            $facebookImageName = time() . '_' . $facebookImage->getClientOriginalName();
            $facebookImage->storeAs('public/facebook_images', $facebookImageName);
            $data['facebook_image'] = 'facebook_images/' . $facebookImageName;
        }
    
        if ($request->hasFile('twitter_image')) {
            $twitterImage = $request->file('twitter_image');
            $twitterImageName = time() . '_' . $twitterImage->getClientOriginalName();
            $twitterImage->storeAs('public/twitter_images', $twitterImageName);
            $data['twitter_image'] = 'twitter_images/' . $twitterImageName;
        }
        $data['page'] = $request->input('page');
        $data['content_id'] = $id;
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['facebook_title'] = $request->input('facebook_title');
        $data['facebook_description'] = $request->input('facebook_description');
        $data['twitter_title'] = $request->input('twitter_title');
        $data['twitter_description'] = $request->input('twitter_description');
        $data['key_words'] = $request->input('key_words');
        $data['meta_robots'] = $request->input('meta_robots');
        $seo_home->fill($data)->save();
        
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
