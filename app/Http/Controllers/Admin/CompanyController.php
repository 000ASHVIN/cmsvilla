<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class CompanyController extends Controller
{
    public function index()
    {
        $company = Company::all();
        return view('admin.company.index', compact('company'));
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

        $statement = DB::select("SHOW TABLE STATUS LIKE 'companies'");
        $ai_id = $statement[0]->Auto_increment;
        $ext = $request->file('photo')->extension();
        $final_name = 'company-'.$ai_id.'.'.$ext;
        $request->file('photo')->move(public_path('uploads/'), $final_name);
        $data['photo'] = $final_name;

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

        if($request->hasFile('photo')) {
            $request->validate([
                'slug'   =>  [
                    Rule::unique('companies')->ignore($id),
                ],
                'photo' => 'image|mimes:jpeg,png,jpg,gif'
            ]);
            unlink(public_path('uploads/'.$company->photo));
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
