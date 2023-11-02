<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\IndustryBanner;
use App\Models\IndustryDetails;
use Illuminate\Http\Request;
use DB;

class IndustryController extends Controller
{
    public function index()
    {
        $industries = DB::table('industry')->paginate(9);
        $industries_menu = DB::table('industry')->get();
        $banner = IndustryBanner::first();
        $industryhead = Industry::first();
        $industry_item = IndustryDetails::all();
        return view('pages.industries', compact('industries','industries_menu','banner','industryhead','industry_item'));
    }

    public function details($slug)
    {
        $industry = Industry::with('howHelp')->where('slug', $slug)->first();
        $industries_menu = DB::table('industry')->get();
        $case_studies = DB::table('case_studies')->get();
        // dd($case_studies);
        if(!$industry) {
            return abort(404);
        }

        return view('pages.industry_detail', compact('industry','industries_menu','case_studies'));
    }
}
