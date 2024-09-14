<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class RegistrationHelper
{
    public static function generateRegistrationNumber($facultyName)
    {
        // Define faculty abbreviations
        $facultyAbbr = [
            'Computer' => 'DCOM',
            'Mechanical' => 'DMECH',
            'Electrical' => 'DELEC',
            'Electronics' => 'DELEC',
            'Civil' => 'DCIV',
        ];

        // Get the abbreviation for the given faculty name
        $abbr = $facultyAbbr[$facultyName] ?? 'DUNK'; // Default to 'DUNK' if faculty not found

        // Generate a sequential number
        $latestRegNo = DB::table('students')
                          ->where('registration_no', 'like', "{$abbr}-%")
                          ->orderBy('registration_no', 'desc')
                          ->value('registration_no');

        $nextNumber = 1; // Default starting number
        if ($latestRegNo) {
            // Extract the number from the latest registration number and increment
            $nextNumber = intval(substr($latestRegNo, strpos($latestRegNo, '-') + 1, 5)) + 1;
        }

        // Format the number with leading zeros
        $formattedNumber = str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        // Generate a random suffix or use a sequential approach if desired
        $suffix = str_pad(rand(1, 999), 3, '0', STR_PAD_LEFT);

        // Combine components
        $regNo = "{$abbr}-{$formattedNumber}-{$suffix}";

        return $regNo;
    }
}

