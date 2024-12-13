<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function viewLogin()
    {
        if (Auth::check()) {
            return redirect()->route('dashboard');
        }
        return view('auth.login');
    }
    public function proses_login(Request $request){
        // Log::info('CSRF Token: ' . $request->_token);
        // Log::info('Session ID before login: ' . session()->getId());
        // dd([
        //     'session_id' => session()->getId(),
        //     'csrf_token_in_request' => $request->_token,
        //     'csrf_token_in_session' => session('_token'),
        //     'attempt' => Auth::attempt(['email' => $request->email, 'password' => $request->password]),
        // ]);
        $email = $request->email;
        $password = $request->password;
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            // Log::info('User logged in and session regenerated.');
            // Log::info('Session ID after login: ' . session()->getId());
            // dd([
            //     'session_id' => session()->getId(),
            //     'csrf_token_in_request' => $request->_token,
            //     'csrf_token_in_session' => session('_token'),
            //     'attempt' => Auth::attempt(['email' => $request->email, 'password' => $request->password]),
            // ]);
            $request->session()->regenerate();
            return redirect()->intended('dashboard');
        } else {
            // dd([
            //     'session_id' => session()->getId(),
            //     'csrf_token_in_request' => $request->_token,
            //     'csrf_token_in_session' => session('_token'),
            //     'attempt' => Auth::attempt(['email' => $request->email, 'password' => $request->password]),
            // ]);
            return back()->with('error', 'Email atau password salah.');
        }
        // dd([
        //     'session_id' => session()->getId(),
        //     'csrf_token_in_request' => $request->_token,
        //     'csrf_token_in_session' => session('_token'),
        //     'attempt' => Auth::attempt(['email' => $request->email, 'password' => $request->password]),
        // ]);
        
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('login');
    }
}
