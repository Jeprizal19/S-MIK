<?php

namespace App\Http\Controllers;

use App\Models\Item;
use App\Models\Categori;
use App\Models\Location;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $items = Item::with(['category', 'location', 'creator'])->latest()->get();
        return view('items.index', compact('items'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Categori::all();
        $locations = Location::all();
        return view('items.create', compact('categories', 'locations'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'code' => 'required|unique:items,code',
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categoris,id',
            'location_id' => 'required|exists:locations,id',
            'condition' => 'required|in:baik,rusak,perbaikan,hilang',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('items', 'public');
        }

        $item = Item::create([
            'code' => $request->code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'condition' => $request->condition,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image_path' => $imagePath,
            'created_by' => Auth::id(),
        ]);
        // Tambah log
        $item->logs()->create([
            'user_id' => Auth::id(),
            'activity_type' => 'penambahan',
            'description' => 'Barang baru ditambahkan',
            'from_location_id' => null,
            'to_location_id' => $request->location_id
        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil ditambahkan.');
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
    public function edit(Item $item)
    {
        $categories = Categori::all();
        $locations = Location::all();
        return view('items.edit', compact('item', 'categories', 'locations'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Item $item)
    {
        $request->validate([
            'code' => 'required|unique:items,code,' . $item->id,
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categoris,id',
            'location_id' => 'required|exists:locations,id',
            'condition' => 'required|in:baik,rusak,perbaikan,hilang',
            'quantity' => 'required|integer|min:1',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
        ]);
        $oldLocationId = $item->location_id;
        $imagePath = $item->image_path;
        if ($request->hasFile('image')) {
            if ($imagePath && Storage::disk('public')->exists($imagePath)) {
                Storage::disk('public')->delete($imagePath);
            }
            $imagePath = $request->file('image')->store('items', 'public');
        }

        $item->update([
            'code' => $request->code,
            'name' => $request->name,
            'category_id' => $request->category_id,
            'location_id' => $request->location_id,
            'condition' => $request->condition,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'image_path' => $imagePath,
        ]);
        // logs
        $item->logs()->create([
            'user_id' => Auth::id(),
            'activity_type' => $oldLocationId != $request->location_id ? 'pindah_lokasi' : 'perubahan',
            'description' => $oldLocationId != $request->location_id
                ? 'Barang dipindahkan lokasi'
                : 'Data barang diperbarui',
            'from_location_id' => $oldLocationId != $request->location_id ? $oldLocationId : null,
            'to_location_id' => $oldLocationId != $request->location_id ? $request->location_id : null
        ]);

        return redirect()->route('items.index')->with('success', 'Barang berhasil diperbarui.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Item $item)
    {
        $item->logs()->create([
            'user_id' => Auth::id(),
            'activity_type' => 'penghapusan',
            'description' => 'Barang dihapus dari sistem',
            'from_location_id' => $item->location_id,
            'to_location_id' => null
        ]);
        if ($item->image_path && Storage::disk('public')->exists($item->image_path)) {
            Storage::disk('public')->delete($item->image_path);
        }
        $item->delete();

        return redirect()->route('items.index')->with('success', 'Barang berhasil dihapus.');
    }
}
