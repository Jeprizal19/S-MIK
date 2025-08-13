<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Item;        // model barang inventaris
use App\Models\Categori;    // model kategori
use App\Models\ItemLog;
use App\Models\Location;    // model lokasi
use App\Models\Loan;        // model peminjaman
use App\Models\Repair;      // model perbaikan
use App\Models\User;  

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totalBarang = Item::count();
        $totalKategori = Categori::count();
        $totalLokasi = Location::count();
        $peminjamanAktif = Loan::where('status', 'dipinjam')->count();
        $perbaikanAktif = Repair::where('status', '!=', 'selesai')->count();
        $totalUser = User::count();
        $query = ItemLog::with(['item', 'user', 'fromLocation', 'toLocation']);

        // Filter berdasarkan tanggal
        if ($request->filled('start_date') && $request->filled('end_date')) {
            $query->whereBetween('created_at', [$request->start_date, $request->end_date]);
        }

        // Filter berdasarkan user
        if ($request->filled('user_id')) {
            $query->where('user_id', $request->user_id);
        }

        // Filter berdasarkan jenis aksi
        if ($request->filled('activity_type')) {
            $query->where('activity_type', $request->activity_type);
        }

        $logs = $query->orderBy('created_at', 'desc')->paginate(15);

        return view('dashboard', compact(
            'totalBarang',
            'totalKategori',
            'totalLokasi',
            'peminjamanAktif',
            'perbaikanAktif',
            'totalUser',
            'logs'
        ));
    }
}
