<?php

// app/Http/Controllers/AuthController.php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Menampilkan form registrasi
    public function showRegisterForm()
    {
        return view('auth.register');
    }

    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }

    // Registrasi pengguna
    public function register(Request $request)
    {
        // Validasi input
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:6|confirmed',
            'no_telp' => 'nullable|string|max:20',
            'alamat' => 'nullable|string|max:255',
            'jumlah_ternak' => 'nullable|integer|min:0',
        ]);

        // Simpan pengguna baru
        User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'role' => 'peternak',
            'no_telp' => $data['no_telp'] ?? null,
            'alamat' => $data['alamat'] ?? null,
            'jumlah_ternak' => $data['jumlah_ternak'] ?? 0,
            'is_approved' => false,  // Belum disetujui
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Tunggu persetujuan admin.');
    }

    // Login pengguna
 // app/Http/Controllers/AuthController.php

 public function login(Request $request)
 {
     $credentials = $request->only('email', 'password');
 
     $user = User::where('email', $request->email)->first();
 
     if (!$user) {
         return back()->with('error', 'Akun tidak ditemukan.');
     }
 
     if (!$user->is_approved) {
         return back()->with('error', 'Akun Anda belum disetujui oleh admin.');
     }
 
     if (Auth::attempt($credentials, $request->remember)) {
         $request->session()->regenerate();
 
         return $user->role === 'admin'
             ? redirect()->route('admin.dashboard')
             : redirect()->route('peternak.dashboard');
     }
 
     return back()->with('error', 'Email atau password salah.');
 }
 

    

    // Logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

    
