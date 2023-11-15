<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\CaseStudyBanner;
use App\Models\IndustryBanner;
use App\Models\SocialMediaItem;
use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
	public function master(){
		$sliders = DB::table('sliders')->get();
    	$page_home = DB::table('page_home_items')->where('id',1)->first();
    	$why_choose_items = DB::table('why_choose_items')->get();
    	$services = DB::table('services')->get();

    	$companies = DB::table('companies')->where('located_page', 'like', '%home%')->get();
    	$testimonials = DB::table('testimonials')->where('located_page', 'like', '%home%')->get();

    	$projects = DB::table('projects')->get();
    	$financials = DB::table('financials')->get();
		$team_members = DB::table('team_members')->get();
    	$blogs = DB::table('blogs')->get();
		$case_studies = DB::table('case_studies')->where('located_page','home')->get();
		$industries= DB::table('industry')->where('located_page','home')->get();
		$industry_banner = IndustryBanner::first();
		$case_study_banner = CaseStudyBanner::first();
        return view('pages.home.home', compact('sliders','page_home','why_choose_items','services', 'testimonials','projects','financials','team_members','blogs','case_studies','companies', 'industries', 'industry_banner', 'case_study_banner'));
	}
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
		$industries_menu = DB::table('industry')->get();
        return view('pages.index', compact('sliders','page_home','why_choose_items','services', 'testimonials','projects','team_members','blogs', 'case_studies','companies','industries_menu'));
    }
}