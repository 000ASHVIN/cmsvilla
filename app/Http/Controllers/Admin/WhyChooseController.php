<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Industry;
use App\Models\WhyChooseItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

class WhyChooseController extends Controller
{
    public function index()
    {
        $why_choose = WhyChooseItem::all();
        return view('admin.why_choose.index', compact('why_choose'));
    }

    public function create()
    {
        $industry = Industry::all();
        return view('admin.why_choose.create',compact('industry'));
    }

    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }

        $why_choose = new WhyChooseItem();
        $data = $request->only($why_choose->getFillable());

        $request->validate([
            'name' => 'required|unique:why_choose_items',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $statement = DB::select("SHOW TABLE STATUS LIKE 'why_choose_items'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'why-choose-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        if($request->has('industry_id')){
            $data['industry_id']= json_encode($data['industry_id']);
        }else{
            $data['industry_id'] = null;
        }

        $why_choose->fill($data)->save();
        return redirect()->route('admin.why_choose.index')->with('success', 'Why Choose Us Item is added successfully!');
    }

    public function edit($id)
    {
        $why_choose = WhyChooseItem::findOrFail($id);
        $industry_id = "";
        if($why_choose->industry_id != null){
            $industry_id = json_decode($why_choose->industry_id, true); 
        }else{
            $industry_id = [];
        }
        $industry = Industry::all();

        return view('admin.why_choose.edit', compact('why_choose','industry','industry_id'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $why_choose = WhyChooseItem::findOrFail($id);
        $data = $request->only($why_choose->getFillable());

        if($request->hasFile('photo')) {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('why_choose_items')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif|max:2048'
            ]);
            if($request->input('current_photo') && file_exists($why_choose->photo)){
                unlink(public_path('uploads/'.$why_choose->photo));
            }
            $ext = $request->file('photo')->extension();
            $final_name = 'why-choose-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'name'   =>  [
                    'required',
                    Rule::unique('why_choose_items')->ignore($id),
                ]
            ]);
            $data['photo'] = $why_choose->photo;
        }

        if($request->has('industry_id')){
            $data['industry_id']= json_encode($data['industry_id']);
        }else{
            $data['industry_id'] = null;
        }
        $why_choose->fill($data)->save();
        return redirect()->route('admin.why_choose.index')->with('success', 'Why Choose Us Item is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $why_choose = WhyChooseItem::findOrFail($id);
        unlink(public_path('uploads/'.$why_choose->photo));
        $why_choose->delete();
        return Redirect()->back()->with('success', 'Why Choose Us Item is deleted successfully!');
    }
}
