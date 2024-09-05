<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' => 'Alice Johnson',
                'email' => 'alicejohnson@example.com',
                'password' => Hash::make('password123'), 
                'phone_no' => '1234567890',
                'address' => '123 Oak Street, City, Country',
                'dob' => '2000-05-15',
                'department' => 'Computer Science',
                'registration_no' => Str::random(10), 
                'faculty' => 'Engineering',
                'admission_date' => '2018-08-20',
                'image'=>'demo',
                'gender' => 'female',
               
            ],
            [
                'name' => 'Bob Williams',
                'email' => 'bobwilliams@example.com',
                'password' => Hash::make('password123'), 
                'phone_no' => '0987654321',
                'address' => '456 Pine Street, City, Country',
                'dob' => '1999-03-10',
                'department' => 'Electrical Engineering',
                'registration_no' => Str::random(10), 
                'faculty' => 'Engineering',
                'admission_date' => '2017-09-15',
                'gender' => 'male',
                'image'=>'demo', 
                
            ]]
            );
    }
}
