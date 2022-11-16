<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class AuthenticationController extends Controller
{
    /**
     * Handle an authentication attempt.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

   

    public function index(){

        if (Auth::guard('admin')->check()) {
            return redirect('/admin');
        }

        if (Auth::guard('receptionist')->check()) {
            return redirect('/recepcionista');
        }

        if (Auth::guard('doctor')->check()) {
            return redirect('/doctor');
        }

        return view('login');
    }

    public function authenticate(Request $request)
    {
        
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        
        
        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            Log::info(Auth::guard('admin')->id());
            return redirect()->intended('/admin');
        } 
        


        if (Auth::guard('receptionist')->attempt($credentials)) {
            $request->session()->regenerate();
            Log::info(Auth::guard('receptionist')->id());
            return redirect()->intended('/recepcionista');
        } 


        if (Auth::guard('doctor')->attempt($credentials)) {
            $request->session()->regenerate();
            Log::info(Auth::guard('doctor')->id());
            return redirect()->intended('/doctor');
        } 
        
 
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

        
    }


    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/login');
    }


}
