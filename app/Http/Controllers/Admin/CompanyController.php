<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\PageHomeItem;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        $page_home = PageHomeItem::where('id',1)->first();
        return view('admin.company.index', compact('company','page_home'));
    }

    public function create()
    {
        return view('admin.company.create');
    }
    public function store(Request $request)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $company = new Company();
        $data = $request->only($company->getFillable());

        $request->validate([
            'slug' => 'required|unique:companies',
            'photo' => 'required|image|mimes:jpeg,png,jpg,gif'
        ]);
        $selectedPages = $request->input('located_page');

        $statement = DB::select("SHOW TABLE STATUS LIKE 'companies'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'company-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;
        $data['located_page'] = json_encode($selectedPages);
        $company->fill($data)->save();
        return redirect()->route('admin.company.index')->with('success', 'Company is added successfully!');
    }

    public function edit($id)
    {
        $company = Company::findOrFail($id);
        return view('admin.company.edit', compact('company'));
    }

    public function update(Request $request, $id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $company = Company::findOrFail($id);
        $data = $request->only($company->getFillable());
        $data_encode = json_encode($request->located_page);
        $data['located_page']=$data_encode;
        if($request->hasFile('photo')) {
            $request->validate([
                'slug'   =>  [
                    Rule::unique('companies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif'
            ]);
            if($request->input('current_photo') && file_exists($company->photo)){
                unlink(public_path('uploads/'.$company->photo));
            }
            $ext = $request->file('photo')->extension();
            $final_name = 'company-'.$id.'.'.$ext;
            $request->file('photo')->move(public_path('uploads/'), $final_name);
            $data['photo'] = $final_name;
        } else {
            $request->validate([
                'slug'   =>  [
                    Rule::unique('companies')->ignore($id),
                ]
            ]);
            $data['photo'] = $company->photo;
        }

        $company->fill($data)->save();
        return redirect()->route('admin.company.index')->with('success', 'Company is updated successfully!');
    }

    public function destroy($id)
    {
        if(env('PROJECT_MODE') == 0) {
            return redirect()->back()->with('error', env('PROJECT_NOTIFICATION'));
        }
        
        $company = Company::findOrFail($id);
        unlink(public_path('uploads/'.$company->photo));
        $company->delete();
        return Redirect()->back()->with('success', 'Company is deleted successfully!');
    }
}
