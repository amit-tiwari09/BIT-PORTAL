<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentsController extends Controller
{
    public function index()
    {
        $students=student::all();
      
        return view('student',compact('students'));
    }
}
