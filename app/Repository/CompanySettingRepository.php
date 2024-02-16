<?php

namespace App\Repository;

use Carbon\Carbon;
use App\Models\Department;
use GuzzleHttp\Psr7\Request;
use App\Http\Requests\CompanySettingRequest;
use App\Models\CompanySetting;

class CompanySettingRepository
{

    public function updateSetting($id, CompanySettingRequest $request)
    {
        $setting = CompanySetting::findOrFail($id);
        $setting->company_name = $request->company_name;
        $setting->company_email = $request->company_email;
        $setting->company_phone = $request->company_phone;
        $setting->company_address = $request->company_address;
        $setting->office_start_time = $request->office_start_time;
        $setting->office_end_time = $request->office_end_time;
        $setting->break_start_time = $request->break_start_time;
        $setting->break_end_time = $request->break_end_time;
        $setting->update();

        return $setting;
    }

}
