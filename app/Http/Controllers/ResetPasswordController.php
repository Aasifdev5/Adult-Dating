<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Methods\ReCaptchaValidation;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rules;

class ResetPasswordController extends Controller
{
    

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
   

    /**
     * Display the password reset view for the given token.
     *
     * If no token is present, display the link request form.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function showResetForm(Request $request)
    {
        $token = $request->route()->parameter('token');

        return view('ResetPasswordLoad')->with([
            'token' => $token,
            'email' => $request->email,
        ]);
    }

    /**
     * Get the password reset validation rules.
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'token' => 'required',
            'email' => 'required|email',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ] + ReCaptchaValidation::validate();
    }
}
