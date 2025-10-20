<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman login.
     */
    public function showLogin()
    {
        return view('auth.login');
    }

    /**
     * Proses login user.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ], [
            'email.required'    => 'Email wajib diisi.',
            'email.email'       => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
        ]);

        $credentials = $request->only('email', 'password');
        $remember = $request->boolean('remember');

        // Cek status user aktif
        $user = User::where('email', $request->email)->first();
        if ($user && isset($user->is_active) && !$user->is_active) {
            return back()->withErrors([
                'email' => 'Akun Anda dinonaktifkan. Silakan hubungi administrator.',
            ]);
        }

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            Log::info('User login berhasil', [
                'user_id' => Auth::id(),
                'email'   => Auth::user()->email,
                'role'    => Auth::user()->role ?? 'user',
                'ip'      => $request->ip(),
            ]);

            return redirect()->intended('/admin/dashboard')
                ->with('success', 'Selamat datang, ' . Auth::user()->name . '!');
        }

        Log::warning('Gagal login', [
            'email' => $request->email,
            'ip'    => $request->ip(),
        ]);

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    /**
     * Logout user dari sistem.
     */
    public function logout(Request $request)
    {
        if (Auth::check()) {
            Log::info('User logout', [
                'user_id' => Auth::id(),
                'email'   => Auth::user()->email,
            ]);
        }

        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/')->with('status', 'Anda telah berhasil logout.');
    }
}
