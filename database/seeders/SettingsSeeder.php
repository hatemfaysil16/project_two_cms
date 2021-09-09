<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'blog_name'=> 'hatem faysil' ,
            'phone_number'=> '01123694440' ,
            'blog_email'=> 'hatemfaysil16@gmail.com' ,
            'address'=> 'cairo'  
           ]);


    }
}
