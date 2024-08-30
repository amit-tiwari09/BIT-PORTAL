<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class staffSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('staffs')->insert([
            [
                'name' => 'John Doe',
                'email' => 'johndoe@example.com',
                'phone_no' => '1234567890',
                'address' => '123 Main Street, City, Country',
                'DOB' => '1990-01-01',
                'gender' => 'male',
                'password' => Hash::make('password123'), 
                'image'=>'demo',
                'role' => 'admin',
                
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone_no' => '0987654321',
                'address' => '456 Elm Street, City, Country',
                'DOB' => '1992-02-02',
                'gender' => 'female',
                'password' => Hash::make('password123'), 
                'role' => 'user',
                'image'=>'demo', 
                
            ],
        ]);
    }
}
