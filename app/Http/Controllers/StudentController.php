<?php

namespace App\Http\Controllers;

use App\Http\Requests\StudentRequest;
use App\Models\Institution;
use App\Models\Student; 
use Illuminate\Support\Facades\Auth;


class StudentController extends Controller
{
    public function index()
    {
        $institution = institution::where('user_id', Auth::user()->id)->first();
        $students = Student::where('institution_id', $institution->id)->get();
        return view('admin.students.index',[
            'students'=> $students
        ]);
    }

    public function create(){
        return view('admin.students.create');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StudentRequest $request)
    {
        $institution = Institution::where('user_id', Auth::user()->id)->first();
        
        Student::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $institution->id,
            'entry_date' => $request->entry_date
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
        $student = Student::findOrFail($id);
        $institution = Institution::where('user_id', Auth::user()->id)->first();

        $student->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $institution->id,
            'entry_date' => $request->entry_date
        ]);

        return redirect('admin/students')->with('success','Estudante actualizado.');
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
