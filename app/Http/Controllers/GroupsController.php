<?php

namespace App\Http\Controllers;

use App\Group;
use Illuminate\Http\Request;

class GroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
                'name' => 'required|string',
            ]);
        $group = Group::create(
            [
                'name' => $data['name'],
                'user_id' => auth()->user()->id,
            ]
        );
        toast('Grupo agregado!', 'success', 'top-right');

        return redirect()->route('guest.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'name' => 'required|string|max:120',
            ]);
        $group = Group::find($id);
        if ($group) {
            if ($group->user_id == auth()->user()->id) {
                $group->update($data);
                alert()->success('Modificado correctamente');
                return redirect()->route('guest.index');
            }
        }
        return back();

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $group = Group::find($id);
        if ($group) {
            if ($group->user_id == auth()->user()->id) {
                $group->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('guest.index');
            }
        }
        return back();
    }
}
