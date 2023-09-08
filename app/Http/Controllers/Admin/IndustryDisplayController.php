<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndustryDetails;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class IndustryDisplayController extends Controller
{
    public function index()
    {
        $industry_item = IndustryDetails::all();
        return view('admin.industry_item.index', compact('industry_item'));
    }

    public function create()
    {
        return view('admin.industry_item.create');
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $industry_item = new IndustryDetails();
        $data = $request->only($industry_item->getFillable());

        $request->validate([
            'name' => 'required|unique:why_choose_items',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'industry_details_items'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'industry-item-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

        $industry_item->fill($data)->save();
        return redirect()->route('admin.industry_item.index')->with('success', 'Industry Item is added successfully!');
    }

    public function edit($id)
    {
        $industry_item = IndustryDetails::findOrFail($id);
        return view('admin.industry_item.edit', compact('industry_item'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $industry_item = IndustryDetails::findOrFail($id);
        $data = $request->only($industry_item->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('industry_details_items')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            unlink(public_path('uploads/'.$industry_item->photo));
            $ext = $request->file('photo')->extension();
            $final_name = 'why-choose-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('industry_details_items')->ignore($id),
                ]
            ]);
            $data['photo'] = $industry_item->photo;
        }

        $industry_item->fill($data)->save();
        return redirect()->route('admin.industry_item.index')->with('success', 'Industry Item is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $industry_item = IndustryDetails::findOrFail($id);
        unlink(public_path('uploads/'.$industry_item->photo));
        $industry_item->delete();
        return Redirect()->back()->with('success', 'Industry Item is deleted successfully!');
    }
}
