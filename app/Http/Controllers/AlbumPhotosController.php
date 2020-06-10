<?php

namespace App\Http\Controllers;

use App\Album;
use App\AlbumPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AlbumPhotosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $album = Album::find($request->get('album'));
        if ($album) {
            $photos = AlbumPhoto::where('album_id', $request->get('album'))->get();

            return view('albumPhotos.index', compact('photos', 'album'));
        }
        return back();
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
        if (Auth::check()) {

            if (!auth()->user()->is_user) {
                return back();
            }
            $data = request()->validate(
                [
                    'photo' => 'required|image',
                    'album_id' => 'required|exists:albums,id',
                ]);
            if ($request->hasFile('photo')) {
                $data['photo'] = $request->file('photo')->store('public');
            }

            $photo = AlbumPhoto::create($data);
            toast('Foto agregada!', 'success', 'top-right');
            return redirect()->route('albumPhoto.index', 'album=' . $photo->album->id);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (Auth::check()) {
            $photo = AlbumPhoto::find($id);
            if ($photo) {
                if ($photo->album->user_id == auth()->user()->id) {
                    return view('albumPhotos.show', compact('photo'));
                }

            }
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (Auth::check()) {
            $photo = AlbumPhoto::find($id);
            if ($photo) {
                if ($photo->album->user_id == auth()->user()->id) {

                    $photo->delete();
                    alert()->error('Elimiando correctamente');

                    return redirect()->route('albumPhoto.index', 'album=' . $photo->album->id);
                }
            }
            return back();
        }
    }
}
