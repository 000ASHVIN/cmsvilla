<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
    	$companies = DB::table('companies')->get();
    	$testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies = DB::table('case_studies')->paginate(8);
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();
        return view('pages.case_study', compact('sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies','companies', 'how_helps','industry_items'));
    }
	public function caseStudyFront()
    {   
        $sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();
		$industry_items = DB::table('industry_details_items')->get();
    	$companies = DB::table('companies')->get();
    	$testimonials = DB::table('testimonials')->get();
    	$projects = DB::table('projects')->get();
    	$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies = DB::table('case_studies')->paginate(8);
		$case_studies_items = DB::table('case_study_items')->get();
        $how_helps = DB::table('how_help')->get();
        $page_industry =DB::table('page_industry_items')->where('id',1)->first();
        return view('pages.case_study_items', compact('sliders','page_industry','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies', 'case_studies_items','companies', 'how_helps','industry_items'));
    }
}
