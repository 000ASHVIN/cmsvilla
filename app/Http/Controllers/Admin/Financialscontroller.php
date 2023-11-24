<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Financials;
use App\Models\PageHomeItem;
use App\Models\ProjectPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use DB;

class Financialscontroller extends Controller
{
    public function index()
    {
        $project = Financials::all();
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.Financials.index', compact('project','page_home'));
    }
    public function create()
    {
        return view('admin.Financials.create');
    }
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $project = new Financials();
        $data = $request->only($project->getFillable());

        $request->validate([
            'project_name' => 'required|unique:projects',
            'project_slug' => 'unique:projects',
            'project_featured_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if(empty($data['project_slug'])) {
            $data['project_slug'] = str::slug($request->project_name);
        }
        $filteredSlug = str_replace(' ', '_', $data['project_slug']);
        $data['project_slug'] = $filteredSlug;

        $statement = DB::select("SHOW TABLE STATUS LIKE 'projects'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('project_featured_photo')->extension();
        $final_name = 'project-featured-photo-'.$ai_id.time().rand(1, 6000) .'.'.$ext;
        $request->file('project_featured_photo')->move(public_path('uploads/'), $final_name);
        $data['project_featured_photo'] = $final_name;

        // $project = new Financials();
        // $data = $request->only($project->getFillable());
        // if(empty($data['project_slug']))
        // {
        //     unset($data['project_slug']);
        //     $data['project_slug'] = Str::slug($request->project_name);
        // }

        // unset($data['project_featured_photo']);
        // $data['project_featured_photo'] = $final_name;
        // Financials::create($data);
        $project->fill($data)->save();
        return redirect()->route('admin.financials.index')->with('success', 'Financials is added successfully!');
    }
    public function edit($id)
    {
        $project = Financials::findOrFail($id);
        return view('admin.Financials.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $project = Financials::findOrFail($id);
        $data = $request->only($project->getFillable());

        if($request->hasFile('project_featured_photo')) {
            $request->validate([
                'project_name'   =>  [
                    'required',
                    Rule::unique('projects')->ignore($id),
                ],
                'project_slug'   =>  [
                    Rule::unique('projects')->ignore($id),
                ],
                'project_featured_photo' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
            ]);
            if($request->input('project_featured_photo') && file_exists($project->project_featured_photo)){
                unlink(public_path('uploads/'.$project->project_featured_photo));
            }
            // unlink(public_path('uploads/'.$project->project_featured_photo));
            $ext = $request->file('project_featured_photo')->extension();
            $final_name = 'project-featured-photo-'.$id.time().rand(1, 6000).'.'.$ext;
            $request->file('project_featured_photo')->move(public_path('uploads/'), $final_name);
            $data['project_featured_photo'] = $final_name;
        } else {
            $request->validate([
                'project_name'   =>  [
                    'required',
                    Rule::unique('projects')->ignore($id),
                ],
                'project_slug'   =>  [
                    Rule::unique('projects')->ignore($id),
                ]
            ]);
            $data['project_featured_photo'] = $project->project_featured_photo;
        }

        $project->fill($data)->save();
        return redirect()->route('admin.financials.index')->with('success', 'Financials is updated successfully!');
    }
    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $project = Financials::findOrFail($id);
        if(isset($project->project_featured_photo) && file_exists($project->project_featured_photo)){
            unlink(public_path('uploads/'.$project->project_featured_photo));
        }
        $project->delete();

        // $project_photo = ProjectPhoto::where('project_id',$id)->get();
        // foreach($project_photo as $row)
        // {
        //     unlink(public_path('uploads/'.$row->project_photo));
        //     DB::table('project_photos')->where('project_id',$row->project_id)->delete();
        // }

        return Redirect()->back()->with('success', 'Financials is deleted successfully!');
    }
    public function gallerysection($id)
    {
        $project_photo = ProjectPhoto::where('project_id',$id)->get();
        $project_id = $id;
        return view('admin.financials.gallery', compact('project_photo','project_id'));
    }

    public function gallerystore(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $project_photo = new ProjectPhoto();
        $data = $request->only($project_photo->getFillable());

        $request->validate([
            'project_photo' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $statement = DB::select("SHOW TABLE STATUS LIKE 'project_photos'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('project_photo')->extension();
        $final_name = 'project-photo-'.$ai_id.time().rand(1, 6000).'.'.$ext;
        $request->file('project_photo')->move(public_path('uploads/'), $final_name);
        $data['project_photo'] = $final_name;
        $data['project_id'] = $request->project_id;
        $project_photo->fill($data)->save();
        return redirect()->back()->with('success', 'Financials Photo is added successfully!');
    }

    public function gallerydelete($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $project_photo = ProjectPhoto::findOrFail($id);
        unlink(public_path('uploads/'.$project_photo->project_photo));
        $project_photo->delete();
        return Redirect()->back()->with('success', 'Financials Photo is deleted successfully!');
    }
}
