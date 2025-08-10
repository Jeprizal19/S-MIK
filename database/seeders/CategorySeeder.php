<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Categori;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories = ['Elektronik', 'Meubelair','Laboratorium', 'Lain-lain'];

        foreach ($categories as $name) {
            Categori::create([
                'name' => $name,
                'description' => "Kategori $name"
            ]);
        }
    }
}
