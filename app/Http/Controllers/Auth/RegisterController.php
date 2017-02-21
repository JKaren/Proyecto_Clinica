<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Auth\Events\Registered;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

use App\Http\Requests;


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
     * Where to redirect users after login / registration.
     *
     * @var string
     */
    protected $redirectTo = '/inicio';

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
    protected function validator(array $data)  {
        return Validator::make($data, [
            'dni' => 'required|max:255',
            'password' => 'required|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
     public function register(Request $request)
     {
        $this->validator($request->all())->validate();
        event(new Registered($dni = $this->create($request->all())));
        $this->guard()->login($dni);
         return redirect($this->redirectPath());
     }
    protected function create(array $data)
    {
        return User::create([
            'dni' => $data['dni'],
            'password' => bcrypt($data['password']),
            'tipo' => $data['tipo'],
        ]);
              return 'ddd';
    }
    public function showRegistrationForm()
    {
        return view('auth.register');
    }

    protected function guard()
    {
        return Auth::guard();
    }
}
