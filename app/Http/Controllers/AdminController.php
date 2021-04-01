<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Student;
use App\Models\Teacher;


class AdminController extends Controller
{
    
    public function index()
    {
        
        $institutions = Institution::all()->count();
        $teachers = Teacher::all()->count();
        $students = Student::all()->count();
        $districts = District::all()->count();

        return view('admin.home', [
            'institutions' => $institutions,
            'teachers' => $teachers,
            'students' => $students,
            'districts' => $districts,
        ]);
    }
}
