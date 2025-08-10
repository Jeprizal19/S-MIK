<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;        // model barang inventaris
use App\Models\Categori;    // model kategori
use App\Models\Location;    // model lokasi
use App\Models\Loan;        // model peminjaman
use App\Models\Repair;      // model perbaikan
use App\Models\User;  

class DashboardController extends Controller
{
    public function index()
    {
        $totalBarang = Item::count();
        $totalKategori = Categori::count();
        $totalLokasi = Location::count();
        $peminjamanAktif = Loan::where('status', 'dipinjam')->count();
        $perbaikanAktif = Repair::where('status', '!=', 'selesai')->count();
        $totalUser = User::count();

        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalLokasi',
            'peminjamanAktif',
            'perbaikanAktif',
            'totalUser'
        ));
    }
}
