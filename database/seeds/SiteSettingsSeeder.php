<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SiteSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Inserting default site settings
        DB::table('site_settings')->insert([
            [
                'key' => 'logo',
                'value' => 'default_logo.png', // Replace with your default logo filename if needed
            ],
            [
                'key' => 'address',
                'value' => '123 Main St, Anytown, USA', // Replace with your desired address
            ],
            [
                'key' => 'contact',
                'value' => '+1 (555) 123-4567', // Replace with your desired contact number
            ],
            [
                'key' => 'email',
                'value' => 'info@example.com', // Replace with your desired email
            ],
        ]);
    }
}
