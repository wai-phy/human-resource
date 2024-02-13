<?php

namespace Database\Seeders;

use App\Models\CompanySetting;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CompanySettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        if(!CompanySetting::exists()){
            $setting = new CompanySetting();
            $setting->company_name = "Shwe Gyi Company";
            $setting->company_email = "shwegyi@gmail.com";
            $setting->company_phone = "09123123123";
            $setting->company_address = "No.123,2th floor Shwe Condominium, Kamayut Tsp, Yangon";
            $setting->office_start_time = "09:00:00";
            $setting->office_end_time = "17:00:00";
            $setting->break_start_time = "12:00:00";
            $setting->break_end_time = "13:00:00";
            $setting->save();
        }
    }
}
