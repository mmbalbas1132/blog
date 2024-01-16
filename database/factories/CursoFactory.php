<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Curso>
 */
class CursoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre' => $this->faker->sentence(), 
            'slug' => $this->faker->slug(), /*crea los slugs para la base de datos de prueba*/
            'descripcion' => $this->faker->paragraph(), 
            'categoria' => $this->faker->randomElement(['Desarrollo web', 'Diseño web'])
        ];
    }
}
