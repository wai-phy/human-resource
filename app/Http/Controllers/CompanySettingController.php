<?php

namespace App\Http\Controllers;

use App\Repository\DataRepo;
use Illuminate\Http\Request;
use App\Models\CompanySetting;
use App\Http\Requests\CompanySettingRequest;

class CompanySettingController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = DataRepo::company();
    }
    
    public function show($id){
         if(!auth()->user()->can('view_company_setting')){
            abort(403,'Unauthorized Action');
        }
        $setting = CompanySetting::findOrFail($id);
        return view('company_setting.show',compact('setting'));
    }

    public function edit($id){
        if(!auth()->user()->can('edit_company_setting')){
            abort(403,'Unauthorized Action');
        }
        $setting = CompanySetting::findOrFail($id);
        return view('company_setting.edit',compact('setting'));
    }

    public function update($id, CompanySettingRequest $request){
        if(!auth()->user()->can('edit_company_setting')){
            abort(403,'Unauthorized Action');
        }
       $setting = $this->repo->updateSetting($id, $request);
        return redirect()->route('company-setting.show',$setting->id)->with('update','CompanySetting is successfully updated!');
    }
}
