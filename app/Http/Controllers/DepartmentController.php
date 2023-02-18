<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    public $department;
    public $departments;
    public function index()
    {
        return view('backend.department.index');
    }
    public function create(Request $request)
    {
        // return $request->all();
        $this->department = new Department();
        $this->department->department_name = $request->department_name;
        $this->department->save();
        return redirect()->back()->with('message','Department Added');
    }
    public function manage()
    {
        $this->departments = Department::all();
        return view('backend.department.manage',['departments'=>$this->departments]);
    }
    public function delete($id)
    {
        Department::findOrfail($id)->delete();
        return redirect()->back()->with('message','Department Deleted');
    }
}
