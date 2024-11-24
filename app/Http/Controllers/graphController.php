<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Expenditure;
use App\Student;
use Carbon\Carbon;
use App\Event;

class graphController extends Controller
{
    public function showgraph(Request $request)
    {
        // Get the selected month/year in the format 'YYYY-MM' (e.g., 2023-01)
        $monthYear = $request->get('monthYear', date('Y-m')); // Default to the current month if no input is given
    
        // Separate the year and month from the selected input
        $year = substr($monthYear, 0, 4); // First 4 characters are the year
        $month = substr($monthYear, 5, 2); // Last 2 characters are the month
    
        // Get expenditures based on the selected year and month
        $expenditures = Expenditure::whereYear('date', $year)
            ->whereMonth('date', $month)
            ->get();
    
        // If no expenditures are found, pass a flag to display a message
        $noExpenditures = $expenditures->isEmpty();
    
        // Prepare data for the graph
        $totalAmount = 0;
    
        // Calculate total amount if expenditures exist
        if (!$noExpenditures) {
            $totalAmount = $expenditures->sum('amount');
        }
    
        // Get the start year for student admission
        $startYear = Student::min('admission_date');
        if ($startYear) {
            $startYear = Carbon::parse($startYear)->year;  // Convert to a year integer
        } else {
            $startYear = 2000; // Fallback if no student data is available
        }
    
        // Get the current year
        $endYear = Carbon::now()->year;
    
        // Generate an array of years from the start to the end year
        $years = range($startYear, $endYear);
    
        // Count the number of students per year
        $studentsPerYear = [];
        foreach ($years as $year) {
            $studentsPerYear[$year] = Student::whereYear('admission_date', $year)->count();
        }
    
        // Calculate the total number of students
        $totalStudents = Student::count();
    
        // Calculate the total number of students admitted this year
        $studentsThisYear = Student::whereYear('admission_date', Carbon::now()->year)->count();
        $events = Event::whereYear('date', $year)
        ->whereMonth('date', $month)
        ->orderBy('date')
        ->get();
        // Pass the data to the view
        return view('expenditures.graph', compact('events','year', 'month', 'totalAmount', 'noExpenditures', 'studentsPerYear', 'years', 'totalStudents', 'studentsThisYear'));
    }
    

}
