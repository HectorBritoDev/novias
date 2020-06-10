<?php

namespace App\Http\Controllers;

use App\WeddingStyle;
use Illuminate\Http\Request;

class StylesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $styles = WeddingStyle::all();
        return view('styles.index', compact('styles'));
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
        WeddingStyle::create($data);
        toast('Categoria agregada!', 'success', 'top-right');

        return redirect()->route('style.index');
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

        $style = WeddingStyle::find($id);
        return view('styles.edit', compact('style'));
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
        $style = WeddingStyle::find($id);
        $style->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('style.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $style = WeddingStyle::find($id);
        $style->delete();
        alert()->error('Elimiando correctamente');
        return redirect()->route('style.index');
    }
}
