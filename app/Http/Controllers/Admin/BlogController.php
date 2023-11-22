<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Mail;
use App\Mail\MailToAllSubscribers;
use App\Models\Seo;
use DB;

class BlogController extends Controller
{
    public function index()
    {
        $blog = Blog::all();
        return view('admin.blog.index', compact('blog'));
    }

    public function create()
    {
        $category=DB::table('categories')->get();
        return view('admin.blog.create', compact('category'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $request->validate([
            'blog_title' => 'required|unique:blogs',
            'blog_slug' => 'unique:blogs',
            'blog_content' => 'required',
            'blog_content_short' => 'required',
            'blog_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'blogs'");
        $ai_id = $statement[0]->Auto_increment;

        $ext = $request->file('blog_photo')->extension();
        $final_name = 'blog-'.$ai_id.rand(1, 6000).'.'.$ext;
        $request->file('blog_photo')->move(public_path('uploads'), $final_name);

        $blog = new Blog();
        $data = $request->only($blog->getFillable());
        if(empty($data['blog_slug']))
        {
            unset($data['blog_slug']);
            $data['blog_slug'] = Str::slug($request->blog_title);
        }

        unset($data['blog_photo']);
        $data['blog_photo'] = $final_name;

        $blog->fill($data)->save();

        // Send Email to Subscribers
        if(request('send_email_to_subscribers') == 'Yes')
        {
            $email_template_data = DB::table('email_templates')->where('id', 4)->first();
            $subject = $email_template_data->et_subject;
            $message = $email_template_data->et_content;

            $post_link = url('blog/'.$data['blog_slug']);
            $message = str_replace('[[post_link]]', $post_link, $message);

            $all_subscribers = Subscriber::where('subs_active', 1)->get();
            foreach($all_subscribers as $row)
            {
                $subs_email = $row->subs_email;
                Mail::to($subs_email)->send(new MailToAllSubscribers($subject,$message));
            }
        }

        $seo = Seo::where('page', $request->input('page'));
        // dd($seo);
        // if(isset($content_id) && $content_id && !empty($content_id)) {
            $seo = $seo->where('content_id', $blog->id);
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
        $data['content_id'] = $blog->id;
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['facebook_title'] = $request->input('facebook_title');
        $data['facebook_description'] = $request->input('facebook_description');
        $data['twitter_title'] = $request->input('twitter_title');
        $data['twitter_description'] = $request->input('twitter_description');
        $data['key_words'] = $request->input('key_words');
        $data['meta_robots'] = $request->input('meta_robots');
        $seo_home->fill($data)->save();

        return redirect()->route('admin.blog.index')->with('success', 'Blog is added successfully!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        $category=DB::table('categories')->get();
        $seo = Seo::where('page', 'blog_detail')->where('content_id', $blog->id)->first();
        return view('admin.blog.edit', compact('blog','category', 'seo'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $blog = Blog::findOrFail($id);
        $data = $request->only($blog->getFillable());

        if ($request->hasFile('blog_photo')) {

            $request->validate([
                'blog_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            
            if($request->input('current_photo') && file_exists($blog->photo)){
                unlink(public_path('uploads/'.$blog->photo));
            }
            // Uploading the file
            $ext = $request->file('blog_photo')->extension();
            $final_name = 'blog-'.$id.'.'.$ext;
            $request->file('blog_photo')->move(public_path('uploads/'), $final_name);

            unset($data['blog_photo']);
            $data['blog_photo'] = $final_name;
        }

        $request->validate([
            'blog_title'   =>  [
                'required',
                Rule::unique('blogs')->ignore($id),
            ],
            'blog_slug'   =>  [
                Rule::unique('blogs')->ignore($id),
            ]
        ]);

        if(empty($data['blog_slug']))
        {
            unset($data['blog_slug']);
            $data['blog_slug'] = Str::slug($request->blog_title);
        }

        $blog->fill($data)->save();

        $seo = Seo::where('page', $request->input('page'));
        // dd($seo);
        // if(isset($content_id) && $content_id && !empty($content_id)) {
            $seo = $seo->where('content_id', $blog->id);
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
        $data['content_id'] = $blog->id;
        $data['meta_title'] = $request->input('meta_title');
        $data['meta_description'] = $request->input('meta_description');
        $data['facebook_title'] = $request->input('facebook_title');
        $data['facebook_description'] = $request->input('facebook_description');
        $data['twitter_title'] = $request->input('twitter_title');
        $data['twitter_description'] = $request->input('twitter_description');
        $data['key_words'] = $request->input('key_words');
        $data['meta_robots'] = $request->input('meta_robots');
        $seo_home->fill($data)->save();
        
        return redirect()->route('admin.blog.index')->with('success', 'Blog is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $blog = Blog::findOrFail($id);
        if(isset($blog->blog_photo) && file_exists($blog->blog_photo)){
            unlink(public_path('uploads/'.$blog->blog_photo));
        }
        // unlink(public_path('uploads/'.$blog->blog_photo));
        $blog->delete();

        // Success Message and redirect
        return Redirect()->back()->with('success', 'Blog is deleted successfully!');
    }

}
