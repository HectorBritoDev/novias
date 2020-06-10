<?php

namespace App\Http\Controllers;

use App\Group;
use App\Guest;
use App\Menu;
use App\Municipio;
use Illuminate\Http\Request;

class GuestsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $groups = Group::where('user_id', auth()->user()->id)->orderBy('name', 'asc')->get();
        $menus = Menu::where('user_id', auth()->user()->id)->orderBy('name', 'asc')->get();
        $guest_groups = Group::where('user_id', auth()->user()->id)->orderBy('name', 'asc')->get();
        // $guest = Guest::where('user_id', auth()->user()->id)->get();

        return view('guests.index', compact('groups', 'menus', 'guest_groups'));
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
        // dd(request()->all());
        $data = request()->validate(
            [
                'name' => 'required|string|min:2',
                'group' => 'required|integer|exists:groups,id',
                'menu' => 'nullable|integer|exists:menus,id',
            ]);
        if (array_has($data, 'menu')) {
            $guest = Guest::create([
                'name' => $data['name'],
                'group_id' => $data['group'],
                'menu_id' => $data['menu'],
                'user_id' => auth()->user()->id,
            ]);
        } else {
            $guest = Guest::create([
                'name' => $data['name'],
                'group_id' => $data['group'],
                'user_id' => auth()->user()->id,
            ]);
        }

        toast('Invitado agregado!', 'success', 'top-right');
        return redirect()->route('guest.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $guest = Guest::find($id);
        if ($guest) {
            if ($guest->user_id == auth()->user()->id) {

                $groups = Group::where('user_id', auth()->user()->id)->get();
                $menus = Menu::where('user_id', auth()->user()->id)->get();
                $municipios = Municipio::all();
                return view('guests.edit', compact('guest', 'groups', 'menus', 'municipios'));
            }
        }
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $data = request()->validate(
            [
                'name' => 'required|string|min:2',
                'surname' => 'nullable|string|min:2',
                'email' => 'nullable|email',
                'phone' => 'nullable||regex:/[0-9]{10}/',
                'cellphone' => 'nullable|regex:/[0-9]{10}/',
                'adress' => 'nullable|string',
                'postal_code' => 'nullable|integer',
                'status' => 'nullable|integer|between:0,3',
                'gender' => 'nullable|integer|between:0,1',
                'age' => 'nullable|integer|between:0,1',
                'group_id' => 'required|integer|exists:groups,id',
                'menu_id' => 'nullable|integer|exists:menus,id',
                'municipio_id' => 'nullable|integer|exists:municipios,id_municipio',
            ]);

        $guest = Guest::find($id);
        $guest->update($data);
        alert()->success('Modificado correctamente');

        return redirect()->route('guest.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Guest  $guest
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if (!auth()->user()->is_user) {
            return back();
        }
        $guest = Guest::find($id);
        if ($guest) {
            if ($guest->user_id == auth()->user()->id) {

                $guest->delete();
                alert()->error('Elimiando correctamente');
                return redirect()->route('guest.index');
            }
        }
        return back();
    }

}
