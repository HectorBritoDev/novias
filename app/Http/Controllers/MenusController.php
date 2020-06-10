<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
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
                'description' => 'nullable|string|min:5',
            ]);
        Menu::create(
            [
                'name' => $data['name'],
                'description' => $data['description'],
                'user_id' => auth()->user()->id,
            ]);
        toast('Menú agregado!', 'success', 'top-right');

        return redirect()->back();
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
        if (!auth()->user()->is_user) {
            return back();
        }
        $menu = Menu::find($id);
        if ($menu) {
            if ($menu->user_id == auth()->user()->id) {
                return view('menus.edit', compact('menu'));
            }
        }
        return back();
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
                'name' => 'required|string',
                'description' => 'nullable|string|min:5',
            ]);
        $menu = Menu::find($id);
        if ($menu) {
            if ($menu->user_id == auth()->user()->id) {

                $menu->update($data);
                alert()->success('Modificado correctamente');

                return redirect()->route('guest.index');
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
        $menu = Menu::find($id);
        if ($menu) {
            if ($menu->user_id == auth()->user()->id) {

                $menu->delete();
                alert()->error('Elimiando correctamente');

                return redirect()->route('guest.index');
            }
        }
        return back();
    }
}
