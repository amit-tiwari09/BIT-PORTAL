<?php

use Illuminate\Database\Seeder;
use App\NavLink;

class NavLinkSeeder extends Seeder
{
    public function run()
    {
        NavLink::create(['key' => 'Home', 'value' => 'http://example.com']);
        NavLink::create(['key' => 'About', 'value' => 'http://example.com/about']);
        NavLink::create(['key' => 'Contact', 'value' => 'http://example.com/contact']);
    }
}
