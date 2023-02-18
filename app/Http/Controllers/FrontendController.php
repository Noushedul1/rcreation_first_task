<?php

namespace App\Http\Controllers;

use App\Models\Student;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public $students;
    public $departments;
    public function index()
    {
        $this->students = Student::all();
        return view('frontend.home',['students'=>$this->students]);
    }
}
