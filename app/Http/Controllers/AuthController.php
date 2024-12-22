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
        $email = $request->email;
        $password = $request->password;
    
        // Cek autentikasi dengan kondisi peran
        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            $user = Auth::user(); // Ambil data pengguna yang diautentikasi
            
            // Pastikan hanya 'admin' dan 'editor' yang bisa login
            if (in_array($user->role, ['admin', 'editor'])) {
                $request->session()->regenerate();
                return redirect()->intended('dashboard');
            } else {
                // Logout jika bukan admin/editor
                Auth::logout();
                return back()->with('error', 'Hanya Admin atau Editor yang diizinkan login.');
            }
        } else {
            return back()->with('error', 'Email atau password salah.');
        }
    }
    

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();
        return redirect('login');
    }
}
