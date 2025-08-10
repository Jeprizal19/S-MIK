<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Location;

class LocationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $locations = [
            'Lab Komputer 1',
            'Ruang Kelas B2',
            'Gudang',
        ];

        foreach ($locations as $name) {
            Location::create([
                'name' => $name,
                'description' => "Lokasi $name"
            ]);
        }
    }
}
