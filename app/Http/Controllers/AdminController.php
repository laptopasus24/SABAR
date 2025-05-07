<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    // Menyetujui peternak
    public function approvePeternak($id)
    {
        $peternak = User::findOrFail($id);
        $peternak->is_approved = true;
        $peternak->save();

        return redirect()->route('admin.dashboard')->with('success', 'Peternak disetujui!');
    }

    

    public function tambahAdminForm()
    {
        return view('admin.tambah_admin');
    }

    public function tambahAdmin(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'admin',
            'is_approved' => true, // langsung aktif
        ]);

        return redirect()->route('admin.dashboard')->with('success', 'Admin baru berhasil ditambahkan.');
    }
}
