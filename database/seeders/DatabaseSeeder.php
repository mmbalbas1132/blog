<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Curso;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $curso = new Curso();
        
        $curso-> nombre = 'Laravel';
        $curso-> descripcion = 'El mejor framework de PHP';
        $curso-> categoria = 'Desarrollo web';

        $curso -> save();
        
    }
}
