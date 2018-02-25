<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    //protected $redirectTo = '/home';
    protected $redirectTo = '/';

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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
//    protected function create(array $data)
//    {
//        return User::create([
//            'name' => $data['name'],
//            'email' => $data['email'],
//            'password' => bcrypt($data['password']),
//        ]);
//    }
    protected function create(array $data)
    {
        $confirmationCode = str_random(30);

        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'confirmation_code' => $confirmationCode,
        ]);

//        Mail::send('email.verify', $confirmation_code, function($message) {
//            $message->to(Input::get('email'), Input::get('name'))
//                    ->subject('Please verify your email address');
//        });
        Mail::send('email.verify', compact('confirmationCode'), function ($message) use ($user) {
            $message->from('us@peanutbuttersandwich.com', 'Peanut Butter Sandwich');
            //$message->to(Input::get('email'), Input::get('name'))->subject('Please verify your email address');
            $message->to($user->email, $user->name)->subject('Please verify your email address');
        });

        //Flash::message('Thanks for signing up! Please check your email.');

        //return Redirect::home();
        //return redirect('/login')->withMessage('Thanks for signing up! Please check your email.');

    }

    public function confirm($confirmationCode)
    {
        if (empty($confirmationCode))
        {
            return redirect('/')->withMessage('There was a problem verifying your email.');
        }

        $user = User::whereConfirmationCode($confirmationCode)->first();

        if (empty($user)) {
            return redirect('/register')->withErrors('User does not exist. Please register first.');
        }

        $user->confirmed = true;
        $user->confirmation_code = null;
        $user->save();

        // Automatically log in the user
        $this->guard()->login($user);

        return redirect('/')->withMessage('Thanks! Your email has been confirmed.');
    }

    /**
     * Handle a registration request for the application.
     * Overrides Trait RegistersUsers register() so we can prevent auto login until user verifies their email
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        event(new Registered($user = $this->create($request->all())));

        //$this->guard()->login($user);

//        return $this->registered($request, $user)
//            ?: redirect($this->redirectPath());

        return redirect('/register')->withMessage('Thanks for signing up! Please check your email.');
    }
}
