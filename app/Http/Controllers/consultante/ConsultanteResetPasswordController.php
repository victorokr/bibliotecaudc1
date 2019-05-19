<?php

namespace App\Http\Controllers\consultante;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Support\Facades\Hash;//se agrego para que funcione el metodo resetPassword
use Illuminate\Support\Str;//se agrego para que funcione el metodo resetPassword
use Illuminate\Auth\Events\PasswordReset;//se agrego para que funcione el metodo resetPassword
use Illuminate\Support\Facades\Password;//se agrego para que funcione metodo broker

class ConsultanteResetPasswordController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Password Reset Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling password reset requests
    | and uses a simple trait to include this behavior. You're free to
    | explore this trait and override any methods you wish to tweak.
    |
    */

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = '/consultantes/login';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest:consultants');
    }

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string|null  $token
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request, $token = null)
    {
        return view('consultpassword.passwords.reset')->with(
            ['token' => $token, 'email' => $request->email]
        );
    }


    public function rules()//Se saco del traid use ResetsPasswords
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password'=> ['required','confirmed','min:5|max:20','regex:/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d).+$/'],//debe contener un numero, minuscula y mayuscula
        ];
    }


    protected function resetPassword($user, $password)//Se saco del traid use ResetsPasswords
    {
        $user->password = Hash::make($password);

        $user->setRememberToken(Str::random(60));

        $user->save();

        event(new PasswordReset($user));

        //$this->guard()->login($user);//evita iniciar sesion despues de resetear contraseña al estar comentado

        return back()->with('infoContraseña','Tu contraseña se ha actualizado, por favor inicia sesion'); 
    }


    /**
     * Get the broker to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\PasswordBroker
     */
    public function broker()
    {
        return Password::broker('consultants');
    }

    /**
     * Get the guard to be used during password reset.
     *
     * @return \Illuminate\Contracts\Auth\StatefulGuard
     */
    protected function guard()
    {
        return Auth::guard('consultants');
    }


    
}
