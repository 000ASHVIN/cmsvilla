<?php

namespace App\Http\Controllers\Front;
use App\Http\Controllers\Controller;
use App\Models\Seo;
use App\Models\SocialMediaItem;
use Illuminate\Http\Request;
use DB;

class FaqController extends Controller
{
    public function index()
    {
        $g_setting = DB::table('general_settings')->where('id', 1)->first();
        $faq = DB::table('page_faq_items')->where('id', 1)->first();
        $faqs = DB::table('faqs')->orderby('faq_order', 'asc')->get();
        $blog_items_no_pagi = DB::table('blogs')->take(5)->get();
        $seo = Seo::where('page', 'faq')->first();
        return view('pages.faq', compact('faq','g_setting','faqs','blog_items_no_pagi', 'seo'));
    }
}
