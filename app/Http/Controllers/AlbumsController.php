<?php

namespace App\Http\Controllers;

use App\Album;
use Illuminate\Http\Request;

class AlbumsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $albums = Album::where('user_id', auth()->user()->id)->get();

        return view('albums.index', compact('albums'));
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
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'main_photo' => 'required|image',
                'name' => 'required|string|max:120',
            ]);
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = $request->file('main_photo')->store('public');
        }

        Album::create(
            [
                'name' => $data['name'],
                'main_photo' => $data['main_photo'],
                'user_id' => auth()->user()->id,
            ]);
        toast('Album agregada!', 'success', 'top-right');
        return redirect()->route('album.index');
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
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'main_photo' => 'nullable|image',
                'name' => 'required|string',
            ]);
        if ($request->hasFile('main_photo')) {
            $data['main_photo'] = $request->file('main_photo')->store('public');
        }
        $album = Album::find($id);
        if ($album) {
            if ($album->user_id == auth()->user()->id) {

                $album->update($data);
                alert()->success('Modificado correctamente');
                return redirect()->route('album.index');
            }
        }
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $album = Album::find($id);
        if ($album) {
            if ($album->user_id == auth()->user()->id) {

                if ($album->photos) {

                    $album->photos()->delete();
                }
                $album->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('album.index');
            }
        }
        return back();
    }
}
