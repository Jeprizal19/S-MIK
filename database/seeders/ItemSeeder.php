<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\Categori;
use App\Models\Location;
use App\Models\User;
use Illuminate\Support\Str;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = Categori::all();
        $locations = Location::all();
        $user_id = User::first()->id ?? 1; // Gunakan user pertama atau default 1

        foreach (range(1, 2) as $i) {
            Item::create([
                'code' => 'INV-' . date('Y') . '-' . str_pad($i, 3, '0', STR_PAD_LEFT),
                'name' => 'Barang ke-' . $i,
                'category_id' => $categories->random()->id,
                'location_id' => $locations->random()->id,
                'condition' => ['baik', 'rusak', 'perbaikan'][rand(0, 2)],
                'quantity' => rand(1, 5),
                'description' => 'Deskripsi barang ke-' . $i,
                'created_by' => $user_id,
            ]);
        }
    }
}
