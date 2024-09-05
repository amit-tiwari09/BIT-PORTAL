<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ApplicantsTableSeeder extends Seeder
{
    public function run()
    {
        DB::table('applicants')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone_no' => '1234567890',
                'address' => '123 Main Street, City, Country',
                'dob' => '1995-06-15',
                'image'=>'demo',
                'applicants_type' => 'Student',  
                'gender' => 'male',
                
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone_no' => '0987654321',
                'address' => '456 Elm Street, City, Country',
                'dob' => '1997-04-20',
                'applicants_type' => 'Teacher', 
                'image'=>'demo', 
                'gender' => 'female',
                
            ],
           
        ]);
    }
}
