<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\StudentRequest;
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

    public function create(){

        Student::create([
            'name' => 'name',
            'birthdate' => 'birthdate',
            'gender'  => 'gender',
            'institution_id' => 'institution_id',
            'entry_date' => 'entry_date'
        ]);

        return redirect('admin/students')->with('success','Estudante adicionado.');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        return $request->all();

        Student::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $request->institution_id,
            'entry_date' => $request->institution_id
        ]);

        return redirect('admin/students')->with('success','Estudante adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $student = Student::findOrFail($id);

        return view('admin.students.edit',[
            'student'=> $student
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StudentRequest $request, $id)
    {
        return $request->all();

        $student = Student::findOrFail($id);
        $student->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $request->institution_id,
            'entry_date' => $request->institution_id
        ]);

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
        $student = Student::findOrFail($id);
        $student->delete();
        return redirect('admin/students')->with('success','Estudante removido.');
    }
}
