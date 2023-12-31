<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\CaseStudyBanner;
use Illuminate\Support\Facades\DB;

class PageCaseStudyController extends Controller
{
     public function index()
    {   
        $sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();
		$industry_items = DB::table('industry_details_items')->get();
		$industries_menu = DB::table('industry')->get();
    	// $companies = DB::table('companies')->get();
    	// $testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies = DB::table('case_studies')->paginate(6);
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();
		$banner = CaseStudyBanner::first();

		$companies = DB::table('companies')->where('located_page', 'like', '%case_study%')->get();
    	$testimonials = DB::table('testimonials')->where('located_page', 'like', '%case_study%')->get();
		$seo = DB::table('seos')->where('page', 'case_study_seo')->first();
        return view('pages.case_study', compact('sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies','companies', 'how_helps','industry_items','industries_menu', 'banner','seo'));
    }
	public function details($slug)
    {
		$case_study = CaseStudy::with('CaseStudyItems')->where('slug', $slug)->first();
		$case_studies_items = $case_study->CaseStudyItems;

        if(!$case_studies_items) {
            return abort(404);
        }
		$case_studies = CaseStudy::with('CaseStudyItems')->where('slug', $slug)->first();
		$sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();
		$industry_items = DB::table('industry_details_items')->get();
		$industries_menu = DB::table('industry')->get();
    	// $companies = DB::table('companies')->get();
    	// $testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();

		$companies = $case_study->company;
        $testimonials = $case_study->testimonial;
		$seo = DB::table('seos')->where('page', 'case_study')->where('content_id', $case_study->id)->first();
        return view('pages.case_study_items', compact('case_study','case_studies','sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies_items','companies', 'how_helps','industry_items','industries_menu','seo'));
    }
	public function caseStudyFront(Request $request)
    {   
		$id = $request->all();
        $sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();
		$industry_items = DB::table('industry_details_items')->get();
		$industries_menu = DB::table('industry')->get();
    	$companies = DB::table('companies')->get();
    	$testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies_items = DB::table('case_study_items')->get();
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();
        return view('pages.case_study_items', compact('sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies_items','companies', 'how_helps','industry_items','industries_menu'));
    }

}
