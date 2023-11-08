<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
   
     public function store(LoginRequest $request): RedirectResponse
     {
        //dd("ddd");
         $request->validate([
             'login' => 'required|string',
             'password' => 'required|string',
         ]);
     
         $field = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'login';
     
         $credentials = [
             $field => $request->login,
             'password' => $request->password,
         ];
     
         if (Auth::attempt($credentials, $request->remember)) {
            //dd("d");
             $request->session()->regenerate();
             if(Auth::user()->role=='user')
             return redirect()->route('index');
             else if(Auth::user()->role=='admin')
             return redirect()->route('indexadmin');
         }
     
         return back()->withErrors([
             'login' => 'The provided credentials do not match our records.',
         ]);
     }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
