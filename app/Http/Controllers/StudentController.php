<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public $departments;
    public $department;
    public $student;
    public $students;
    public function index()
    {
        $this->departments = Department::all();
        return view('backend.student.index',['departments'=>$this->departments]);
    }
    public function create(Request $request)
    {
        // return $request->all(); 
        $this->department = Department::findOrfail($request->department_id);
        // return $this->department;
        $this->student = new Student();
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->city = $request->city;

        $this->department->students()->save($this->student);

        return redirect()->back()->with('message','Student Added');
    }
    public function manage()
    {
        $this->students = Student::all();
        return view('backend.student.manage',['students'=>$this->students]);
    }
    public function edit($id)
    {
        $this->student = Student::findOrfail($id);
        $this->departments = Department::all();
        return view('backend.student.edit',[
            'student'=>$this->student,
            'departments'=>$this->departments
        ]);
    }
    public function update(Request $request,$id)
    {
        $this->student = Department::findOrfail($request->department_id)
        ->students()
        ->where('id',$id)->first();
        // return $this->department;
        $this->student->name = $request->name;
        $this->student->email = $request->email;
        $this->student->city = $request->city;

        $this->student->update();

        return redirect()->back()->with('message','Student Updated');
    }
}
