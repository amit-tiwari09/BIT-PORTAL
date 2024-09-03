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
        $data=[
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ];

        student::insert($data);
        return redirect()->route('students.index');
    }
        public function delete($id)
        {
            if(!$id)
            {
                return redirect()->back();
            }
            $student=student::find($id);
            if($student)
            {
                $student->delete();
                return redirect()->back();
            }
            return redirect()->back();
        }

        public function edit($id)
        {
            if(!$id)
            {
                return redirect()->back();
            }
            $student=student::find($id);
            if($student)
            {
                return view(' students.edit',compact('student'));
            }
            return redirect()->back();
        }

        public function update(Request $request, $id)
    {
        if(!$id)
        {
            return redirect()->back();
        }
        $student=student::find($id);
        if($student){
        $data=[
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ];

        student::where('id',$id)->update($data);
        return redirect()->route('students.index');
       }  
        return redirect()->back();
       
    }
}
