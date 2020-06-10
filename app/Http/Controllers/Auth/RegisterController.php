<?php

namespace App\Http\Controllers\Auth;

use App\Departamento;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
     */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'nickname' => 'sometimes|string',
            'avatar' => 'sometimes|string',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'role' => 'required|integer|in:1,2',
            'departamento' => 'required|integer',
            'municipio' => 'required|integer',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        if (empty($data['nickname'])) {
            $data['nickname'] = null;
            $data['avatar'] = null;
        }

        return User::create([
            'name' => $data['name'],
            'nickname' => $data['nickname'],
            'avatar' => $data['avatar'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => $data['role'],
            'departamento_id' => $data['departamento'],
            'municipio_id' => $data['municipio'],
        ]);
    }

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */

    public function showRegistrationForm()
    {
        $departamentos = Departamento::All();

        return view('auth.register', compact('departamentos'));
    }

}
