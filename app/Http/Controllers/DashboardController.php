<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class DashboardController extends Controller
{
        // Menampilkan dashboard peternak
        public function peternakDashboard()
        {
            return view('dashboard.peternak'); // Sesuaikan dengan tampilan dashboard peternak
        }
    
        // Menampilkan dashboard admin
     // Menampilkan dashboard admin
     public function adminDashboard()
     {
         $peternaks = User::where('role', 'peternak')->get();
         return view('dashboard.admin', compact('peternaks'));
     }
     

    public function approve(User $user)
    {
        // Update status peternak menjadi disetujui
        $user->update(['is_approved' => true]);

        return back()->with('success', 'Peternak berhasil disetujui.');
    }
}
