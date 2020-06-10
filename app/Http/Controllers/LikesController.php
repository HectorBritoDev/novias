<?php

namespace App\Http\Controllers;

use App\Like;
use Illuminate\Http\Request;

class LikesController extends Controller
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
        $likes = Like::where('user_id', auth()->user()->id)
            ->join('users', 'provider_id', '=', 'users.id')
            ->where('status', '=', 1)
            ->get();
        return view('likes.index', compact('likes'));
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
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'provider_id' => 'required|exists:users,id',
                'sector_id' => 'required|exists:sectors,id',
            ]);

        Like::create(
            [
                'provider_id' => $data['provider_id'],
                'sector_id' => $data['sector_id'],
                'user_id' => auth()->user()->id,
            ]);
        toast('Agregado a favoritos!', 'success', 'top-right');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $like = Like::find($id);

        $providers = Like::where('user_id', auth()->user()->id)
            ->where('sector_id', $id)
            ->join('users', 'provider_id', '=', 'users.id')
            ->get();

        return view('likes.show', compact('providers'));

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
        if (!auth()->user()->is_user) {
            return back();
        }
        $like = Like::find($id);
        if ($like) {
            if ($like->user_id == auth()->user()->id) {

                $like->delete();
                toast('Removido!', 'error', 'top-right');
                return back();
            }
        }
        return back();
    }
}
