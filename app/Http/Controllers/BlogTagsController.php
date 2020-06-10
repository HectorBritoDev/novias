<?php

namespace App\Http\Controllers;

use App\BlogTag;
use Illuminate\Http\Request;

class BlogTagsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tags = BlogTag::all();

        return view('blogTags.index', compact('tags'));
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
        $data = request()->validate(
            [
                'name' => 'required|string|min:1',
            ]);
        BlogTag::create($data);
        toast('Articulo agregado!', 'success', 'top-right');

        return redirect()->route('tag.index');
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
        $tag = BlogTag::find($id);

        return view('blogTags.edit', compact('tag'));
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
                'name' => 'required|string|min:1',
            ]);
        $tag = BlogTag::find($id);
        $tag->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('tag.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = BlogTag::find($id);
        $tag->blogs()->delete();
        $tag->delete();
        alert()->error('Elimiando correctamente');

        return redirect()->route('tag.index');

    }
}
