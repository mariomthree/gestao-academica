<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Http\Requests\TeacherRequest;
use App\Models\Institution;
use App\Models\Teacher;

class TeacherController extends Controller
{
    public function index()
    {
        $institution = institution::where('user_id', Auth::user()->id)->first();
        $teachers = Teacher::where('institution_id', $institution->id)->paginate(10);
        return view('admin.teachers.index',[
            'teachers'=> $teachers
        ]);
    }

    public function create(){
        return view('admin.teachers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request)
    {
        $institution = Institution::where('user_id', Auth::user()->id)->first();
        
        Teacher::create([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $institution->id,
            'entry_date' => $request->entry_date
        ]);

        return redirect('admin/teachers')->with('success','Professor adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teacher = Teacher::findOrFail($id);

        return view('admin.teachers.edit',[
            'teacher'=> $teacher
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherRequest $request, $id)
    {
        $teacher = Teacher::findOrFail($id);
        $institution = Institution::where('user_id', Auth::user()->id)->first();

        $teacher->update([
            'name' => $request->name,
            'birthdate' => $request->birthdate,
            'gender'  => $request->gender,
            'institution_id' => $institution->id,
            'entry_date' => $request->entry_date
        ]);

        return redirect('admin/teachers')->with('success','Professor actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teacher = Teacher::findOrFail($id);
        $teacher->delete();
        return redirect('admin/teachers')->with('success','Professor removido.');
    }
}