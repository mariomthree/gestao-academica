<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;
use App\Models\Institution;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Teaching;
use Illuminate\Support\Facades\Auth;



class AdminController extends Controller
{
    
    public function index()
    {   
        $districts = District::all()->count();
        $data = [];

        if (Auth::user()->hasRole(['institution','meducation'])) {
            
            $institutions = Institution::all()->count();
            $teachers = Teacher::all()->count();
            $students = Student::all()->count();

            $data  = [
                'institutions' => $institutions,
                'teachers' => $teachers,
                'students' => $students,
                'districts' => $districts,
            ];

        }elseif(Auth::user()->hasRole(['admin'])){

            $teachings = Teaching::all()->count();
            $users = Institution::all()->count();
            $provinces = Teacher::all()->count();
            $districts = District::all()->count();

            $data  = [
                'users' => $users,
                'teachings' => $teachings,
                'provinces' => $provinces,
                'districts' => $districts,
            ];
        }

        return view('admin.home',$data);
    }
}
