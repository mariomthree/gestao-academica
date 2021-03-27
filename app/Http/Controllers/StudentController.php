<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
use App\Http\Requests\StudentUpdateRequest;
use App\Models\Student; 


class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('admin.students.index',[
            'students'=> $students
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        Students::create([
                'name' => $request->name,
                'birthdate' => $request->birthdate,
                'gender'  => $request->gender,
                'institution_id' => $request->institution_id,
                'entry_date' => $request->institution_id
        ]);

        return redirect('admin/students')->with('success','Estudante Registado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $students = Student::findOrFail($id);

        return view('admin.students.edit',[
            'students'=> $students

        ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentUpdateRequest $request)
    {
        $students = Student::findOrFail($id);

        $students->name=$request->name;
        $students->birthdate=$request->birthdate;
        $students->gender=$request->gender;
        $students->institution_id=$request->institution_id;
        $students->save();
        
        return redirect('admin/students')->with('success','Estudante  actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $students = Student::findOrFail($id);
        $students->delete();
        return redirect('admin/students')->with('success','Estudante removido.');
    }
}
