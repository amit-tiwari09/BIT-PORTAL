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
                'dob' => '1990-01-01',
                'gender' => 'male',
                'password' => Hash::make('password123'),
                'subject' => 'Mathematics', // Example value
                'experience' => 10, // Example value
                'resume_path' => null, // Or provide a path if available
                'image' => 'demo',
                'role' => 'principal', // New column
                'faculty' => 'Engineering', // New column
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Jane Smith',
                'email' => 'janesmith@example.com',
                'phone_no' => '0987654321',
                'address' => '456 Elm Street, City, Country',
                'dob' => '1992-02-02',
                'gender' => 'female',
                'password' => Hash::make('password123'),
                'subject' => 'Computer Science', // Example value
                'experience' => 5, // Example value
                'resume_path' => null, // Or provide a path if available
                'image' => 'HOD',
                'role' => 'hod', // New column
                'faculty' => 'Computer Science', // New column
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
        
        
        
    }
}
