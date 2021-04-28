<?php

namespace App\Http\Controllers;

use App\Http\Requests\InternshipsRequest;
use App\Models\Internships;
use Illuminate\Http\Request;

class InternshipsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $internships = Internships::paginate(4);
        return view('admin.internships.index', ['internships' => $internships]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InternshipsRequest $request)
    {
        Internships::create(['name' => $request->name]);
        return redirect('admin/internships')->with('success', 'Tipo de ensino adicionado.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $internship = Internships::findOrFail($id);
        return view('admin/internships/edit', ['internship' => $internship]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InternshipsRequest $request, $id)
    {
        $internship = Internships::findOrFail($id);
        $internship->name = $request->name;
        $internship->save();
        return redirect('admin/internships')->with('success', 'Tipo de ensino actualizado.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $internship = Internships::findOrFail($id);
        $internship->delete();
        return redirect('admin/internships')->with('success', 'Tipo de ensino removido.');
    }
}
