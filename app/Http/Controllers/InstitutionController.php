<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitutionRequest;
use App\Models\User; 
use App\Models\Role; 
use App\Models\District;
use App\Models\Institution; 


class InstitutionController extends Controller
{

    public function index()
    {
        $institution = Institution::all();
        return view('admin.institutions.index',[
            'institutions'=> $institution
        ]);
    }

    public function create()
    {

        $districts = District::pluck('name','id')->all();
        $roles = Role::pluck('name','id')->all();
        return view('admin.institutions.create',[
            'distrits'=> $districts,
            'roles'=> $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionRequest $request)
    {
        Institution::create([
                'name' => $request->name,
                'district_id' => $request->district_id,
                 'user_id' => $request->user_id
        ]);

        return redirect('admin/institutions')->with('success','Instituicao Registada.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $institution = Institution::findOrFail($id);

        return view('admin.institutions.edit',[
            'institution'=> $institution,
            'user'=> $user

        ]);
        }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionRequest $request)
    {
        $institution = Institution::findOrFail($id);
        
        $institution->name = $request->name;
        $institution->district_id = $request->district_id;
        $institution->user_id = $request->user_id;
        $institution->save();
        
        return redirect('admin/institutions')->with('success','instituicao  actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $institution = Institution::findOrFail($id);
        $institution->delete();
        return redirect('admin/institutions')->with('success','instituicao removida.');
    }
}
