<?php

namespace App\Http\Controllers;

use App\Http\Middleware\Admin;
use Illuminate\Http\Request;
use App\Http\Requests\InstitutionCreateRequest;
use App\Models\District;
use App\Models\Institution;
use App\Models\Role;
use App\Models\User;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::all();

        return view('admin.institutions.index',[
            'institutions'=> $institutions
        ]);
    }

    public function create()
    {
        $districts = District::pluck('name','id')->all();
        $roles = Role::pluck('name','id')->all();

        return view('admin.institutions.create',[
            'districts' => $districts,
            'roles' => $roles
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InstitutionCreateRequest $request)
    {
        return $request->all();

        $user = User::create([
            'name' => $request->userName,
            'email' => $request->userEmail,
            'password' => bcrypt($request->userPassword),
            'is_active' => $request->is_active
        ]);
        
        $role = Role::where('name','institution')->first();
        $user->attachRole($role); 

        Institution::create([
            'name' => $request->institutionName,
            'district_id' => $request->district_id,
            'user_id' => $user->id
        ]);

        return redirect('admin/institutions')->with('success','Instituição adicionada.');
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
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionRequest $request, $id)
    {
        return $request->all();
        $institution = Institution::findOrFail($id);
        
        $institution->update([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'user_id' => $request->user_id
        ]);
        
        return redirect('admin/institutions')->with('success','Instituição  actualizada.');
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
        return $institution;
        $institution->delete();
        return redirect('admin/institutions')->with('success','Instituição removida.');
    }
}
