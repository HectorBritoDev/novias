<?php

namespace App\Http\Controllers;

use App\Faq;
use App\Like;
use App\Municipio;
use App\Photo;
use App\Sector;
use App\User;
use App\WeddingColor;
use App\WeddingStyle;
use App\WeddingWeather;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (Auth::check()) {
            if (!auth()->user()->is_admin) {
                return back();
            }
            $users = User::where('role', '=', 1)->get();
            return view('users.index', compact('users'));
        }
        return redirect('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $photos = Photo::where('user_id', $id)->get();
        $today = Carbon::now()->format('Y-m-d');
        $faqs = Faq::where('user_id', $id)->get();

        if ($user == null) {
            return back();
        }

        if (auth()->check() && auth()->user()->is_user) {
            $like = Like::where('user_id', auth()->user()->id)->where('provider_id', $user->id)->first();
        }

        return view('users.show', compact('user', 'photos', 'faqs', 'like', 'today'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::check()) {

            $user = User::find($id);
            if ($user) {

                if ($user->id == auth()->user()->id) {

                    $municipios = Municipio::all();
                    $colors = WeddingColor::all();
                    $weathers = WeddingWeather::all();
                    $styles = WeddingStyle::all();
                    $sectors = Sector::all();
                    $photos = Photo::where('user_id', auth()->user()->id)->get();
                    return view('users.edit', compact('user', 'departamentos', 'municipios',
                        'colors', 'weathers', 'styles', 'photos', 'sectors'));
                }
            }
        }
        return redirect()->route('home');

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
        if (Auth::check()) {

            if (auth()->user()->is_provider && $request->input('photos') == 1) {

                $data = request()->validate(
                    [
                        'provider_logo' => 'nullable|image',
                        'provider_main_photo' => 'nullable|image',
                    ]
                );

                if ($request->hasFile('provider_logo')) {

                    $data['provider_logo'] = $request->file('provider_logo')->store('public');
                }
                if ($request->hasFile('provider_main_photo')) {

                    $data['provider_main_photo'] = $request->file('provider_main_photo')->store('public');
                }
            }

            if (auth()->user()->is_provider && $request->input('data') == 1) {

                $data = request()->validate(
                    [
                        'name' => 'required|string|min:2',
                        'provider_description' => 'required|min:150|string',
                        'provider_adress' => 'required|min:20|string|max:120',
                        'provider_min_cost' => 'required|min:1|integer',
                        'provider_contact_name' => 'required|min:2|string|max:120',
                        'provider_contact_email' => 'required|email',
                        'provider_contact_phone' => 'required|integer|regex:/[0-9]{10}/',
                        'provider_contact_cellphone' => 'nullable|integer|regex:/[0-9]{10}/',
                        'provider_contact_fax' => 'nullable|integer|min:1',
                        'provider_contact_website' => 'nullable|string|min:8|max:120',
                        'provider_discount' => 'nullable|integer|min:1|max:100',
                        'provider_sector_id' => 'required|integer|exists:sectors,id',
                        'municipio_id' => 'required|integer|exists:municipios,id_municipio',
                    ],
                    [
                        'provider_min_cost.integer' => 'El precio mínimo de cotización es inválido',
                    ]);
                $data['provider_category_id'] = Sector::find($data['provider_sector_id'])->category->id;
            }

            if (auth()->user()->is_user && $request->input('user') == 1) {

                $data = request()->validate(
                    [
                        'name' => 'required|min:2|max:100',
                        'phone' => 'nullable|integer|regex:/[0-9]{10}/',
                        'about_me' => 'nullable|min:10',
                        'gender' => 'nullable|in:male,female,other',
                        'partner_gender' => 'nullable|in:male,female,other',
                        'partner_name' => 'nullable|min:2|max:100',
                        'partner_birthday' => 'nullable|min:2|max:100',
                        'marrige_date' => 'nullable|date',
                        'expected_guests' => 'nullable|min:1|integer|max:2000',

                        'father_name' => 'nullable|min:1|string|max:191',
                        'father_birthday' => 'nullable|date|',
                        'mother_name' => 'nullable|min:1|string|max:191',
                        'mother_birthday' => 'nullable|date|',

                        'wedding_municipio_id' => 'nullable|integer|exists:municipios,id_municipio',
                        'wedding_hour_start' => 'nullable|integer|between:0,23',
                        'wedding_minute_start' => 'nullable|integer|between:0,59',
                        'wedding_hour_finish' => 'nullable|integer|between:0,23',
                        'wedding_minute_finish' => 'nullable|integer|between:0,59',
                        'about_my_marrige' => 'nullable|min:10',

                        'wedding_color_id' => 'nullable|integer|exists:wedding_colors,id',
                        'wedding_style_id' => 'nullable|integer|exists:wedding_styles,id',
                        'wedding_weather_id' => 'nullable|integer|exists:wedding_weathers,id',

                    ]);
            }
            if (auth()->user()->is_user && $request->input('marrige') == 1) {
                $data = request()->validate(
                    [
                        'wedding_color_id' => 'nullable|integer|exists:wedding_colors,id',
                        'wedding_style_id' => 'nullable|integer|exists:wedding_styles,id',
                        'wedding_weather_id' => 'nullable|integer|exists:wedding_weathers,id',
                    ]);

            }
            if (auth()->user()->is_admin && $request->has('status')) {
                $data = request()->validate(
                    [
                        'status' => 'required|integer|in:0,1',
                    ]);
            }
            if ($data) {
                $user = User::find($id);
                if ($user->id == auth()->user()->id || auth()->user()->is_admin) {
                    $user->update($data);
                    alert()->success('Modificado correctamente');
                    return back();
                }
            }
        }
        return redirect()->route('home');
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

            if (!auth()->user()->is_admin) {
                return back();
            }
            $user = User::find($id);
            $user->delete();
            alert()->error('Elimiando correctamente');
            return back();
        }
        return redirect('home');
    }

    public function autocompleteSector(Request $request)
    {

        $term = $request->term;
        $providers = Sector::where('sector_name', 'LIKE', "%$term%")->get();
        if ($providers->count() == 0) {
            $result[] = 'No hay coincidencias';
        } else {
            foreach ($providers as $provider) {
                $result[] = $provider->sector_name;
            }
        }

        return $result;
    }

    public function receptions()
    {

        $providers = User::where('provider_category_id', 1)->where('status', 1)->get();
        if (auth()->check()) {
            $user = Like::where('user_id', auth()->user()->id)->get();
        }
        return view('provider.index', compact('providers', 'user'));
    }
    public function providers()
    {

        $providers = User::where('provider_category_id', 2)->where('status', 1)->get();
        if (auth()->check()) {
            $user = Like::where('user_id', auth()->user()->id)->get();
        }
        return view('provider.index', compact('providers', 'user'));
    }
    public function girlfriend()
    {

        $providers = User::where('provider_category_id', 3)->where('status', 1)->get();
        if (auth()->check()) {
            $user = Like::where('user_id', auth()->user()->id)->get();
        }
        return view('provider.index', compact('providers', 'user'));
    }
    public function boyfriend()
    {

        $providers = User::where('provider_category_id', 4)->where('status', 1)->get();
        if (auth()->check()) {
            $user = Like::where('user_id', auth()->user()->id)->get();
        }
        return view('provider.index', compact('providers', 'user'));
    }

    public function search(Request $request)
    {
        $name = $request->get('name');
        $sector = $request->get('sector');

        if ($sector != null) {

            if (auth()->check()) {
                $user = Like::where('user_id', auth()->user()->id)->get();
            }

            $providers = Sector::sectors($sector)->name($name)->where('role', 2)->where('status', 1)->get();

            if ($providers) {
                return view('provider.index', compact('providers', 'user'));
            }
        }
        return back();
    }

    public function bySector()
    {

        $sectors = Sector::all();
        if ($sectors) {
            if (auth()->check()) {
                if (auth()->user()->is_user) {
                    $likes = Like::where('user_id', auth()->user()->id)
                        ->join('users', 'provider_id', '=', 'users.id')
                        ->where('status', '=', 1)
                        ->get();
                }
            }
        }
        return view('provider.bySector', compact('sectors', 'likes'));
    }

    public function adminProviders(Request $request)
    {
        if ($request->has('approved')) {
            $providers = User::where('role', 2)->where('status', 1)->get();
        } else {

            $providers = User::where('role', 2)->where('status', 0)->get();
        }

        return view('provider.adminList', compact('providers'));
    }

}
