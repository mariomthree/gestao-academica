<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Http\Requests\ProvinceRequest;
use GuzzleHttp\Handler\Proxy;

class ProvinceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $provinces = Province::all();
        return view('admin.provinces.index',['provinces' => $provinces]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProvinceRequest $request)
    {
        Province::create(['name' => $request->name]);
        return redirect('admin/provinces');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $province = Province::findOrFail($id);
        return view('admin/provinces/edit', ['province' => $province])->with('success','Provincia adicionado.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProvinceRequest $request, $id)
    {
        $province = Province::findOrFail($id);
        $province->name = $request->name;
        $province->save();
        return redirect('admin/provinces')->with('success','Provincia actualizada.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $province = Province::findOrFail($id);
        $province->delete();
        return redirect('admin/provinces')->with('success','Provincia removida.');
    }
}
