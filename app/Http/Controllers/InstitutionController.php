<?php

namespace App\Http\Controllers;

use App\Http\Requests\InstitutionCreateRequest;
use App\Http\Requests\InstitutionUpdateRequest;
use App\Models\District;
use App\Models\Institution;
use App\Models\Role;
use App\Models\Internships;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::paginate(10);
   
        return view('admin.institutions.index',[
            'institutions'=> $institutions
        ]);
    }

    public function create()
    {
        $districts = District::pluck('name','id')->all();
        $internships = Internships::all();

        return view('admin.institutions.create',[
            'districts' => $districts,
            'internships' => $internships
        ]);
    }

    public function institution(){
        $institution = institution::where('user_id', Auth::user()->id)->first();
        $internships = Internships::all();
        return view('admin.institutions.institution',[
            'institution' =>$institution,
            'internships' =>$internships
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
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt(Helpers::password_generate()),
            'telephone' => $request->telephone,
            'is_active' => $request->is_active
        ]);
        
        $role = Role::where('name','institution')->first();
        $user->attachRole($role); 

        $institution = Institution::create([
            'name' => $request->institution,
            'district_id' => $request->district_id,
            'user_id' => $user->id
        ]);

        $institution->internships()->syncWithoutDetaching($request->teaching_id);
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
        $districts = District::pluck('name','id')->all();
        $internships = Internships::all();
        
        return view('admin.institutions.edit',[
            'institution'=> $institution,
            'districts'=> $districts,
            'internships'=> $internships
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InstitutionUpdateRequest $request, $id)
    {

        $institution = Institution::findOrFail($id);
        $user = User::findOrFail($institution->user_id);
        
        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $user->password,
            'telephone' => $request->telephone,
            'is_active' => $request->is_active
        ]);

        $institution->update([
            'name' => $request->institution,
            'district_id' => $request->district_id,
            'user_id' => $institution->user_id
        ]);

        $institution->internships()->sync($request->teaching_id);
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
        $institution->internships()->detach();
        $institution->user->delete();
        $institution->delete();
        return redirect('admin/institutions')->with('success','Instituição removida.');
    }
}
