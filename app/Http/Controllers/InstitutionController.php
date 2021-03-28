<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\InstitutionRequest;
use App\Models\User; 
use App\Models\Institution;

class InstitutionController extends Controller
{

    public function index()
    {
        $institutions = Institution::all();
        return view('admin.institutions.index',[
            'institutions'=> $institutions
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
        return $request->all();

        Institution::create([
            'name' => $request->name,
            'district_id' => $request->district_id,
            'user_id' => $request->user_id
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
