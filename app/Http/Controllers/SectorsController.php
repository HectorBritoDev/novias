<?php

namespace App\Http\Controllers;

use App\Sector;
use App\SectorCategory;
use Illuminate\Http\Request;

class SectorsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $sectors = Sector::all();
        $categories = SectorCategory::all();
        return view('sectors.index', compact('sectors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate(
            [
                'sector_name' => 'required|string',
                'icon' => 'required|image',
                'category_id' => 'required|exists:sector_categories,id',
            ]);
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('public');
        }
        Sector::create($data);
        toast('sector agregado!', 'success', 'top-right');

        return redirect()->route('sector.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $sector = Sector::find($id);
        $categories = SectorCategory::all();
        return view('sectors.edit', compact('sector', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $data = request()->validate(
            [
                'sector_name' => 'required|string',
                'icon' => 'nullable|image',
                'category_id' => 'required|exists:sector_categories,id',
            ]);
        if ($request->hasFile('icon')) {
            $data['icon'] = $request->file('icon')->store('public');
        }
        $sector = Sector::find($id);
        $sector->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('sector.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $sector = Sector::find($id);
        $sector->delete();
        alert()->error('Elimiando correctamente');

        return redirect()->route('sector.index');

    }
}
