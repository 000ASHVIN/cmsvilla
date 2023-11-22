<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContactItem;
use App\Models\Seo;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use DB;

class PageContactController extends Controller
{
    public function edit()
    {
        $page_contact = PageContactItem::where('id',1)->first();
        $seo = Seo::where('page', 'contact')->first();
        return view('admin.page_setting.page_contact', compact('page_contact', 'seo'));
    }

     public function update(Request $request)
     {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
         $data['name'] = $request->input('name');
         $data['detail'] = $request->input('detail');
         $data['status'] = $request->input('status');
         $data['contact_address'] = $request->input('contact_address');
         $data['contact_email'] = $request->input('contact_email');
         $data['contact_phone'] = $request->input('contact_phone');
         $data['seo_title'] = $request->input('seo_title');
         $data['seo_meta_description'] = $request->input('seo_meta_description');

         PageContactItem::where('id',1)->update($data);

         $seo = Seo::where('page', 'contact');
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
         $data['page'] = 'contact';
         $data['meta_title'] = $request->input('meta_title');
         $data['meta_description'] = $request->input('meta_description');
         $data['facebook_title'] = $request->input('facebook_title');
         $data['facebook_description'] = $request->input('facebook_description');
         $data['twitter_title'] = $request->input('twitter_title');
         $data['twitter_description'] = $request->input('twitter_description');
         $data['key_words'] = $request->input('key_words');
         $data['meta_robots'] = $request->input('meta_robots');
         $seo_home->fill($data)->save();
         return redirect()->back()->with('success', 'Contact Page Content is updated successfully!');

     }

}
