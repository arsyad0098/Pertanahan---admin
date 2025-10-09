<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function showLoginForm()
    {
        return view('login');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function login(Request $request)
    {
         $request->validate([
            'username' => 'required',
            'password' => [
                'required',
                'min:3',
                'regex:/[A-Z]/' // harus ada minimal satu huruf kapital
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
            'password.min' => 'Password minimal terdiri dari 3 karakter.',
            'password.regex' => 'Password harus mengandung minimal satu huruf kapital.',
        ]);

        
        if ($request->username === 'arsyad' && $request->password === 'Ramadhan') {
           
            return redirect()->route('tanah')->with('success', 'Berhasil login!');
        } else {
            
            return back()->withErrors([
                'login' => 'Username atau password salah!',
            ])->withInput();
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
