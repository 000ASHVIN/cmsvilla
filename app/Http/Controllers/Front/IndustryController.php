<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\CaseStudy;
use App\Models\Industry;
use App\Models\IndustryBanner;
use App\Models\IndustryDetails;
use Illuminate\Http\Request;
use DB;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = DB::table('industry')->paginate(6);
        $banner = IndustryBanner::first();
        $industryhead = Industry::first();
        $industry_item = IndustryDetails::all();
        $seo = DB::table('seos')->where('page', 'industry_seo')->first();
        $companies = DB::table('companies')->where('located_page', 'like', '%industry%')->get();
    	$testimonials = DB::table('testimonials')->where('located_page', 'like', '%industry%')->get();
        return view('pages.industries', compact('industries','banner','industryhead','industry_item','seo', 'companies', 'testimonials'));
    }

    public function details($slug)
    {
        $industry = Industry::with('howHelp')->where('slug', $slug)->first();
        $industries_menu = DB::table('industry')->get();
        $case_studies = $industry->caseStudies;
        if(!$industry) {
            return abort(404);
        }
        $companies = $industry->company;
        $testimonials = $industry->testimonial;
        $seo = DB::table('seos')->where('page', 'industry')->where('content_id', $industry->id)->first();
        
        return view('pages.industry_detail', compact('industry','industries_menu','case_studies', 'companies', 'testimonials','seo'));
    }
}
