<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class SessionController extends Controller
{
    public function index()
    {
        return view("sesi/index");
    }

    public function login(Request $request)
{
    // Store email in session
    Session::flash('email', $request->email);

    // Validate request
    $request->validate([
        'email' => 'required',
        'password' => 'required'
    ], [
        'email.required' => 'Email Wajib Diisi',
        'password.required' => 'Password Wajib Diisi',
    ]);

    // Attempt to log the user in
    if (Auth::attempt($request->only('email', 'password'))) {
        $username = Auth::user()->name; // Get the username
        return redirect('film')->with('success', 'Berhasil Login, ' . $username);
    } else {
        return redirect('sesi')->withErrors('username dan password tidak valid');
    }
}

    public function logout()
    {
        $username = Auth::user()->name; // Get the username
        Auth::logout();
        return redirect('sesi')->with('success', 'Berhasil Logout' . $username);
    }

    public function register()
    {
        return view('register');
    }

    public function create(Request $request)
{
    // Store name and email in session
    Session::flash('name', $request->name);
    Session::flash('email', $request->email);

    // Validate request
    $request->validate([
        'name' => 'required',
        'email' => 'required|email|unique:users',
        'password' => 'required|min:6'
    ], [
        'name.required' => 'Nama Wajib Diisi',
        'email.required' => 'Email Wajib Diisi',
        'email.email' => 'Silahkan Masukkan Email Yang Valid',
        'email.unique' => 'Email Sudah Digunakan, Pilih Yang Lain',
        'password.required' => 'Password Wajib Diisi',
        'password.min' => 'Minimum Password Yang Diizinkan Adalah 6 Karakter',
    ]);

    // Create new user
    $data = [
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
    ];

    User::create($data);

    // Automatically log the user in
    $user = User::where('email', $request->email)->first();
    Auth::login($user);

    return redirect('product')->with('success', 'Berhasil Login, ' . $user->name);
}
}
