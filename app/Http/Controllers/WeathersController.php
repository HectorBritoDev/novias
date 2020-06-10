<?php

namespace App\Http\Controllers;

use App\WeddingWeather;
use Illuminate\Http\Request;

class WeathersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $weathers = WeddingWeather::all();
        return view('weathers.index', compact('weathers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $data = request()->validate([
            'name' => 'required',

        ]);
        WeddingWeather::create($data);
        toast('Categoria agregada!', 'success', 'top-right');

        return redirect()->route('weather.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $weather = WeddingWeather::find($id);
        return view('weathers.edit', compact('weather'));
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

        $data = request()->validate([
            'name' => 'required',
        ]);
        $weather = WeddingWeather::find($id);
        $weather->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('weather.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $weather = WeddingWeather::find($id);
        $weather->delete();
        alert()->error('Elimiando correctamente');
        return redirect()->route('weather.index');
    }
}
