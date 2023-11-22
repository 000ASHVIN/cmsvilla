<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Seo;
use Illuminate\Contracts\Cache\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeoController extends Controller
{
    public function index()
    {
        $seo = Seo::where('page','home')->first();
        return view('admin.seo.home_seo',compact('seo'));
    }
    public function create()
    {
        return view('admin.seo.home_seo');
    }
    public function industryIndex()
    {
        $seo = Seo::where('page','industry_seo')->first();
        return view('admin.seo.industry_seo',compact('seo'));
    }
    public function industryCreate()
    {
        return view('admin.seo.industry_seo');
    }
    public function casestudyIndex()
    {
        $seo = Seo::where('page','case_study_seo')->first();
        return view('admin.seo.seo_case_studys',compact('seo'));
    }
    public function casestudyCreate()
    {
        return view('admin.seo.seo_case_studys');
    }
    public function store(Request $request, $content_id = 0)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
    
        $request->validate([
            'meta_title' => 'required',
            'meta_description' => 'required',
            'facebook_title' => 'required',
            'facebook_description' => 'required',
            'twitter_title' => 'required',
            'twitter_description' => 'required',
            'key_words' => 'required',
            'meta_robots' => 'required',
        ]);
    
        $seo = Seo::where('page', $request->input('page'));
        if(isset($content_id) && $content_id && !empty($content_id)) {
            $seo = $seo->where('content_id', $content_id);
        }

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
        // $data['content_id'] = $request->input('content_id');
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['facebook_title'] = $request->input('facebook_title');
        $data['facebook_description'] = $request->input('facebook_description');
        $data['twitter_title'] = $request->input('twitter_title');
        $data['twitter_description'] = $request->input('twitter_description');
        $data['key_words'] = $request->input('key_words');
        $data['meta_robots'] = $request->input('meta_robots');
        
        $seo_home->fill($data)->save();
        
        return redirect()->back()->with('success', 'SEO data is added successfully!');
    }
 

    
    
}
