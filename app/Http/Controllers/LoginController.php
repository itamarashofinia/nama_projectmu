<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Session;

class LoginController extends Controller
{
    public function login(): View
    {
        return view('login');
    }

    public function actionlogin(LoginRequest $request): RedirectResponse
    {
        if (Auth::attempt($request->validated())) {
            return redirect(RouteServiceProvider::HOME);
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.'
        ]);
    }

    public function actionlogout(): RedirectResponse
    {
        Auth::logout();
        return redirect('/');
    }
}
