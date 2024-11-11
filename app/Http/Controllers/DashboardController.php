<?php

namespace App\Http\Controllers;

use App\Models\Varcost;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Hitung total jumlah baris (record) di tabel varcost
        $totalVarcost = Varcost::count();
        $totalUser = User::count();

        $months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Data jumlah user setiap bulan (contoh, sesuaikan dengan query database)
        $userCounts = [10, 25, 15, 30, 40, 35, 50, 45, 60, 70, 55, 65]; // Sesuaikan datanya
    
        // Data jumlah varcost setiap bulan (contoh, sesuaikan dengan query database)
        $varcostCounts = [5, 15, 10, 20, 30, 25, 35, 30, 45, 50, 40, 55]; // Sesuaikan datanya
    

        // Kirim totalVarcost ke view dashboard
        return view('dashboard', [
            'totalVarcost' => $totalVarcost,
            'totalUser' => $totalUser,
            'months' => $months,
            'userCounts' => $userCounts,
            'varcostCounts' => $varcostCounts
        ]);
    }
}
