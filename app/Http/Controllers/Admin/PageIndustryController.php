<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PageHomeItem;
use App\Models\PageIndustryItem;
use Illuminate\Support\Facades\DB;

class PageIndustryController extends Controller
{
    public function index()
    {   
        $sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();
    	$companies = DB::table('companies')->get();
    	$testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies = DB::table('case_studies')->get();
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();
        return view('pages.industry', compact('sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies','companies', 'how_helps'));
    }

    public function edit()
    {
        $page_home = PageIndustryItem::where('id',1)->first();
        if(!$page_home) {
            $page_home = PageIndustryItem::create([]);
            
        }
        return view('admin.page_setting.page_industry', compact('page_home'));
    }

    public function update1(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        if($request->hasFile('need_video_bg'))
        {
            $request->validate([
                'need_video_bg' => 'image|mimes:jpeg,png,jpg,gif'
            ]);

            // Unlink old photo
            $filePath = public_path('uploads/'.$request->input('current_photo1'));

            if (file_exists($filePath) && $request->input('current_photo1')!=null) {
                unlink(public_path('uploads/'.$request->input('current_photo1')));
            }

            // Uploading new photo
            $ext = $request->file('need_video_bg')->extension();
            $final_name = 'need_video_bg'.'.'.$ext;
            $request->file('need_video_bg')->move(public_path('uploads/'), $final_name);

            $data['need_video_bg'] = $final_name;
        }

        $data['need_title'] = $request->input('need_title');
        $data['need_subtitle'] = $request->input('need_subtitle');
        $data['need_content'] = $request->input('need_content');
        $data['need_btn_text'] = $request->input('need_btn_text');
        $data['need_btn_url'] = $request->input('need_btn_url');
        $data['need_yt_video'] = $request->input('need_yt_video');
        $data['need_bg_color'] = $request->input('need_bg_color');
        $data['need_status'] = $request->input('need_status');

        $page = PageIndustryItem::find(1);
        if($page != null){
            PageIndustryItem::where('id',1)->update($data);
        }else{
            PageIndustryItem::create($data);

        }
        return redirect()->back()->with('success', 'Need Section is updated successfully!');
    }

    // public function update1(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['seo_title'] = $request->input('seo_title');
    //     $data['seo_meta_description'] = $request->input('seo_meta_description');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Home Page Meta Information is updated successfully!');
    // }
    public function update3(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['workflow_title'] = $request->input('workflow_title');
        $data['workflow_subtitle'] = $request->input('workflow_subtitle');
        $data['workflow_content'] = $request->input('workflow_content');
        $data['workflow_status'] = $request->input('workflow_status');
        // PageIndustryItem::where('id',1)->update($data);
        $page = PageIndustryItem::find(1);
        if($page != null){
            PageIndustryItem::where('id',1)->update($data);
        }else{
            PageIndustryItem::create($data);

        }
        return redirect()->back()->with('success', 'Why Choose Us Section is updated successfully!');
    }

     public function update4(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['case_study_title'] = $request->input('case_study_title');
        $data['case_study_subtitle'] = $request->input('case_study_subtitle');
        $data['case_study_status'] = $request->input('case_study_status');

        $page = PageIndustryItem::find(1);
        if($page != null){
            PageIndustryItem::where('id',1)->update($data);
        }else{
            PageIndustryItem::create($data);

        }
        return redirect()->back()->with('success', 'Case Study Section is updated successfully!');
    }

    public function update2(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['trusted_company_title'] = $request->input('trusted_company_title');
        $data['trusted_company_subtitle'] = $request->input('trusted_company_subtitle');
        $data['trusted_company_status'] = $request->input('trusted_company_status');

        PageIndustryItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Trusted Company Section is updated successfully!');
    }

    public function update7(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->hasFile('testimonial_bg'))
        {
            $request->validate([
                'testimonial_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Unlink old photo
            $filePath = public_path('uploads/'.$request->input('current_photo'));

            if (file_exists($filePath) && $request->input('current_photo')!=null) {
                unlink(public_path('uploads/'.$request->input('current_photo')));
            }

            // Uploading new photo
            $ext = $request->file('testimonial_bg')->extension();
            $final_name = 'testimonial_bg'.'.'.$ext;
            $request->file('testimonial_bg')->move(public_path('uploads/'), $final_name);

            $data['testimonial_bg'] = $final_name;
        }

        $data['testimonial_title'] = $request->input('testimonial_title');
        $data['testimonial_subtitle'] = $request->input('testimonial_subtitle');
        $data['testimonial_bg_color'] = $request->input('testimonial_bg_color');
        $data['testimonial_status'] = $request->input('testimonial_status');

        PageIndustryItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'Testimonial Section is updated successfully!');
    }

    public function update6(Request $request){
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $data['industry_title'] = $request->input('industry_title');
        $data['industry_subtitle'] = $request->input('industry_subtitle');
        $data['industry_content'] = $request->input('industry_content');
        $data['industry_status'] = $request->input('industry_status');

        $page = PageIndustryItem::find(1);
        if($page != null){
            PageIndustryItem::where('id',1)->update($data);
        }else{
            PageIndustryItem::create($data);

        }
        return redirect()->back()->with('success', 'Industry Section is updated successfully!');
    }

    // public function update4(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['service_title'] = $request->input('service_title');
    //     $data['service_subtitle'] = $request->input('service_subtitle');
    //     $data['service_status'] = $request->input('service_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Service Section is updated successfully!');
    // }


    
    public function update5(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        if($request->hasFile('how_help_bg'))
        {
            $request->validate([
                'how_help_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);

            // Unlink old photo
            if($request->input('current_photo'))
                unlink(public_path('uploads/'.$request->input('current_photo')));

            // Uploading new photo
            $ext = $request->file('how_help_bg')->extension();
            $final_name = 'how_help_bg'.'.'.$ext;
            $request->file('how_help_bg')->move(public_path('uploads/'), $final_name);

            $data['how_help_bg'] = $final_name;
        }

        $data['how_help_title'] = $request->input('how_help_title');
        $data['how_help_subtitle'] = $request->input('how_help_subtitle');
        $data['how_help_status'] = $request->input('how_help_status');

        PageIndustryItem::where('id',1)->update($data);
        return redirect()->back()->with('success', 'How Help Section is updated successfully!');
    }

    // public function update6(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     if($request->hasFile('project_bg'))
    //     {
    //         $request->validate([
    //             'project_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    //         ]);

    //         // Unlink old photo
    //         if($request->input('current_photo'))
    //             unlink(public_path('uploads/'.$request->input('current_photo')));

    //         // Uploading new photo
    //         $ext = $request->file('project_bg')->extension();
    //         $final_name = 'project_bg'.'.'.$ext;
    //         $request->file('project_bg')->move(public_path('uploads/'), $final_name);

    //         $data['project_bg'] = $final_name;
    //     }

    //     $data['project_title'] = $request->input('project_title');
    //     $data['project_subtitle'] = $request->input('project_subtitle');
    //     $data['project_status'] = $request->input('project_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Project Section is updated successfully!');
    // }

    // public function update7(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['team_member_title'] = $request->input('team_member_title');
    //     $data['team_member_subtitle'] = $request->input('team_member_subtitle');
    //     $data['team_member_status'] = $request->input('team_member_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Team Member Section is updated successfully!');
    // }

    // public function update8(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     if($request->hasFile('appointment_bg'))
    //     {
    //         $request->validate([
    //             'appointment_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    //         ]);

    //         // Unlink old photo
    //         unlink(public_path('uploads/'.$request->input('current_photo')));

    //         // Uploading new photo
    //         $ext = $request->file('appointment_bg')->extension();
    //         $final_name = 'appointment_bg'.'.'.$ext;
    //         $request->file('appointment_bg')->move(public_path('uploads/'), $final_name);

    //         $data['appointment_bg'] = $final_name;
    //     }

    //     $data['appointment_title'] = $request->input('appointment_title');
    //     $data['appointment_text'] = $request->input('appointment_text');
    //     $data['appointment_btn_text'] = $request->input('appointment_btn_text');
    //     $data['appointment_btn_url'] = $request->input('appointment_btn_url');
    //     $data['appointment_status'] = $request->input('appointment_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Appointment Section is updated successfully!');
    // }

    // public function update9(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['latest_blog_title'] = $request->input('latest_blog_title');
    //     $data['latest_blog_subtitle'] = $request->input('latest_blog_subtitle');
    //     $data['latest_blog_status'] = $request->input('latest_blog_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Latest Blog Section is updated successfully!');
    // }

    // public function update12(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['case_study_title'] = $request->input('case_study_title');
    //     $data['case_study_subtitle'] = $request->input('case_study_subtitle');
    //     $data['case_study_status'] = $request->input('case_study_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Latest Blog Section is updated successfully!');
    // }

    // public function update10(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     if($request->hasFile('newsletter_bg'))
    //     {
    //         $request->validate([
    //             'newsletter_bg' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
    //         ]);

    //         // Unlink old photo
    //         unlink(public_path('uploads/'.$request->input('current_photo')));

    //         // Uploading new photo
    //         $ext = $request->file('newsletter_bg')->extension();
    //         $final_name = 'newsletter_bg'.'.'.$ext;
    //         $request->file('newsletter_bg')->move(public_path('uploads/'), $final_name);

    //         $data['newsletter_bg'] = $final_name;
    //     }

    //     $data['newsletter_title'] = $request->input('newsletter_title');
    //     $data['newsletter_text'] = $request->input('newsletter_text');
    //     $data['newsletter_status'] = $request->input('newsletter_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Newsletter Section is updated successfully!');
    // }

    // public function update11(Request $request)
    // {
    //     if(env('PROJECT_MODE') == 0) {
    //         return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
    //     }
        
    //     $data['trusted_company_title'] = $request->input('trusted_company_title');
    //     $data['trusted_company_subtitle'] = $request->input('trusted_company_subtitle');
    //     $data['trusted_company_status'] = $request->input('trusted_company_status');

    //     PageHomeItem::where('id',1)->update($data);
    //     return redirect()->back()->with('success', 'Why Choose Us Section is updated successfully!');
    // }

}
