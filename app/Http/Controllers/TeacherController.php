<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\TeacherRequest;
use App\Http\Requests\TeacherUpdateRequest;
use App\Models\Teacher; 

class TeacherController extends Controller
{
    public function index()
    {
        $teachers = Teacher::all();
        return view('admin.teachers.index',[
            'teachers'=> $teachers
        ]);
        }
        /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeacherRequest $request) {
        Teacher::create([
                'name' => $request->name,
                'birthdate' => $request->birthdate,
                'gender'  => $request->gender,
                'institution_id' => $request->institution_id,
                'entry_date' => $request->institution_id
        ]);

        return redirect('admin/teachers')->with('success','Professor Registado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teachers = Teacher::findOrFail($id);

        return view('admin.teachers.edit',[
            'teachers'=> $teachers

        ]);
        }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeacherUpdateRequest $request)
    {
        $teachers = Teacher::findOrFail($id);

        $teachers->name=$request->name;
        $teachers->birthdate=$request->birthdate;
        $teachers->gender=$request->gender;
        $teachers->institution_id=$request->institution_id;
        $teachers->save();
        
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
        $teachers = Teacher::findOrFail($id);
        $teachers->delete();
        return redirect('admin/teachers')->with('success','Professor removido.');
    }

    }

    
    

