<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Genre;

class GeneroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Genre::updateOrCreate([
            'id' => 1,
            'name' => 'Juvenil',
            'description' => 'Este es un dato de prueba',
        ]);
        Genre::updateOrCreate([
            'id' => 2,
            'name' => 'Drama',
            'description' => 'Este es un dato de prueba',
        ]);
        Genre::updateOrCreate([
            'id' => 3,
            'name' => 'Novela Negra',
            'description' => 'Este es un dato de prueba',
        ]);
        Genre::updateOrCreate([
            'id' => 4,
            'name' => 'Terror',
            'description' => 'Este es un dato de prueba',
        ]);
        Genre::updateOrCreate([
            'id' => 5,
            'name' => 'Ciencia Ficción',
            'description' => 'Este es un dato de prueba',
        ]);
    }
}
