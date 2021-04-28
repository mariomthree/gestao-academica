<?php

namespace App\Http\Controllers;

use App\Models\Institution;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    
    public function index(){
        $institutions = Institution::all();

        return view('admin.meducation.report', [
            'institutions' => $institutions
        ]);
    }
}