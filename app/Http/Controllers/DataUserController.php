<?php
// app/Http/Controllers/DataUserController.php

namespace App\Http\Controllers;

use App\Models\DataUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class DataUserController extends Controller
{
    public function index()
    {
        $data = DataUser::orderBy('created_at', 'desc')->get();
        return view('pages.user.index', compact('data'));
    }

    public function create()
    {
        return view('pages.user.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:data_user,email',
            'role' => 'required|string|max:50',
            'status' => 'required|in:active,inactive',
            'tanggal_daftar' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        DataUser::create($request->all());

        return redirect()->route('data_user.index')
            ->with('success', 'Data user berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $user = DataUser::findOrFail($id);
        return view('pages.user.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = DataUser::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:data_user,email,' . $id . ',user_id',
            'role' => 'required|string|max:50',
            'status' => 'required|in:active,inactive',
            'tanggal_daftar' => 'required|date',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->update($request->all());

        return redirect()->route('pages.user.index')
            ->with('success', 'Data user berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $user = DataUser::findOrFail($id);
        $user->delete();

        return redirect()->route('pages.user.index')
            ->with('success', 'Data user berhasil dihapus!');
    }
}