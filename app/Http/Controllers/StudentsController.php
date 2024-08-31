<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\student;

class StudentsController extends Controller
{
    public function index()
    {
        $students=student::all();
        return view('students.index',compact('students'));
    }

    public function create()
    {
        return view(' students.create');
    }

    public function store(Request $request)
    {
        dd($request->all());
    }
}
