<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;


class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'=> 'hatem' ,
            'email'=> 'hatemfaysil16@gmail.com' ,
            'admin'=> '1' ,
            'password'=> Hash::make('123456789'),  
           ]);
    }
}
