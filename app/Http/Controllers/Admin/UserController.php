<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function create()
    {
        if (auth()->user()->role !== 'admin') {
            abort(403, 'Akses ditolak!');
        }
        return view('admin.bendahara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'bendahara', // Otomatis jadi bendahara
        ]);

        return redirect()->route('dashboard')->with('success', 'Bendahara berhasil ditambahkan!');
    }
}