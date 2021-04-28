<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistrictRequest;
use App\Models\District;
use App\Models\Province; 

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::paginate(4);
        $provinces = Province::pluck('name','id');
        
        return view('admin.districts.index',[
            'districts'=> $districts,
            'provinces'=> $provinces
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistrictRequest $request)
    {
        District::create([
                'name' => $request->name,
                'province_id' => $request->province_id,
        ]);

        return redirect('admin/districts')->with('success','Distrito adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $district = District::findOrFail($id);
        $provinces = Province::pluck('name','id');

        return view('admin.districts.edit',[
            'district'=> $district,
            'provinces'=> $provinces
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(DistrictRequest $request, $id)
    {
        $district = District::findOrFail($id);
        
        $district->name = $request->name;
        $district->province_id = $request->province_id;
        $district->save();
        
        return redirect('admin/districts')->with('success','Distrito actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $district = District::findOrFail($id);
        $district->delete();
        return redirect('admin/districts')->with('success','Distrito removido.');
    }
}
