<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\UserAdmin;

class AuthController extends Controller
{
    /**
     * Tampilkan form login.
     */
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    /**
     * Proses login admin.
     */
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:3',
        ], [
            'email.required' => 'Email wajib diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal 3 karakter.',
        ]);


        $user = UserAdmin::where('email', $request->email)->first();

        // Jika user ditemukan dan password cocok
        if ($user && Hash::check($request->password, $user->password)) {
            // Simpan session login
            session([
                'admin_logged_in' => true,
                'admin_email' => $user->email,
                'admin_name' => $user->nama,
            ]);

            return redirect()->route('jenis_penggunaan.index')->with('success', 'Berhasil login!');
        }

        // Jika gagal login
        return back()->withErrors([
            'login' => 'Email atau password salah!',
        ])->withInput();
    }

    /**
     * Tampilkan form register.
     */
    public function showRegisterForm()
    {
        return view('admin.auth.register');
    }

    /**
     * Proses registrasi admin baru.
     */
    public function register(Request $request)
    {
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|email|unique:user_admin,email',
            'password' => 'required|min:6|confirmed',
        ], [
            'nama.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'email.unique' => 'Email sudah terdaftar.',
            'password.required' => 'Password wajib diisi.',
            'password.confirmed' => 'Konfirmasi password tidak cocok.',
        ]);

        // Simpan user baru
        UserAdmin::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('admin.login')->with('success', 'Registrasi berhasil! Silakan login.');
    }

    /**
     * Logout admin.
     */
    public function logout()
    {
        session()->flush(); // hapus semua session
        return redirect()->route('admin.login')->with('success', 'Anda telah logout.');
    }
}
