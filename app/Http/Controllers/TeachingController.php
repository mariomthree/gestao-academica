<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeachingRequest;
use App\Models\Teaching;

class TeachingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $teachings = Teaching::all();
        return view('admin.teachings.index',['teachings' => $teachings]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(TeachingRequest $request)
    {
        Teaching::create(['name' => $request->name]);
        return redirect('admin/teachings')->with('success','Tipo de ensino adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $teaching = Teaching::findOrFail($id);
        return view('admin/teachings/edit', ['teaching' => $teaching]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TeachingRequest $request, $id)
    {
        $teaching = Teaching::findOrFail($id);
        $teaching->name = $request->name;
        $teaching->save();
        return redirect('admin/teachings')->with('success','Tipo de ensino actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $teaching = Teaching::findOrFail($id);
        $teaching->delete();
        return redirect('admin/teachings')->with('success','Tipo de ensino removido.');
    }
}
