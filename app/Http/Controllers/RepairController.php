<?php

namespace App\Http\Controllers;

use App\Models\Repair;
use App\Models\Item;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RepairController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $repairs = Repair::with(['item', 'reporter', 'handler'])->latest()->get();
        return view('repairs.index', compact('repairs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403, 'Anda tidak memiliki izin untuk mengakses halaman ini.');
        }
        $items = Item::all();
        return view('repairs.create', compact('items'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (!in_array(Auth::user()->role, ['admin', 'staff'])) {
            abort(403, 'Anda tidak memiliki izin untuk menambahkan data.');
        }
        $request->validate([
            'item_id' => 'required|exists:items,id',
            'report_date' => 'required|date',
            'repair_date' => 'nullable|date|after_or_equal:report_date',
            'status' => 'required|in:dilaporkan,diproses,selesai',
            'notes' => 'nullable|string',
        ]);

        Repair::create([
            'item_id' => $request->item_id,
            'reported_by' => Auth::id(),
            'handled_by' => null,
            'report_date' => $request->report_date,
            'repair_date' => $request->repair_date,
            'status' => $request->status,
            'notes' => $request->notes,
        ]);

        return redirect()->route('repairs.index')->with('success', 'Data perbaikan berhasil ditambahkan.');
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
    public function edit(Repair $repair)
    {
        if (!in_array(Auth::user()->role, ['admin', 'teknisi'])) {
            abort(403, 'Anda tidak memiliki izin untuk mengedit data ini.');
        }
        $items = Item::all();
        $handlers = User::where('role', 'teknisi')->get();
        return view('repairs.edit', compact('repair', 'items', 'handlers'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Repair $repair)
    {
        $role = Auth::user()->role;
        if ($role === 'admin') {
            $request->validate([
                'item_id' => 'required|exists:items,id',
                'handled_by' => 'nullable|exists:users,id',
                'report_date' => 'required|date',
                'repair_date' => 'nullable|date|after_or_equal:report_date',
                'status' => 'required|in:dilaporkan,diproses,selesai',
                'notes' => 'nullable|string',
            ]);

            $repair->update([
                'item_id' => $request->item_id,
                'handled_by' => $request->handled_by,
                'report_date' => $request->report_date,
                'repair_date' => $request->repair_date,
                'status' => $request->status,
                'notes' => $request->notes,
            ]);
        } elseif ($role === 'teknisi') {
            $request->validate([
                'status' => 'required|in:dilaporkan,diproses,selesai',
            ]);

            $repair->update([
                'status' => $request->status,
            ]);
        } else {
            abort(403, 'Anda tidak memiliki izin untuk mengubah data ini.');
        }

        return redirect()->route('repairs.index')->with('success', 'Data perbaikan berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Repair $repair)
    {
        if (Auth::user()->role !== 'admin') {
            abort(403, 'Hanya admin yang dapat menghapus data.');
        }

        $repair->delete();
        return redirect()->route('repairs.index')->with('success', 'Data perbaikan berhasil dihapus.');
    }
}
