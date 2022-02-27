<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Venta>
 */
class VentaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'numero_factura' => $this->faker->numberBetween(1, 100),
            'cliente' => $this->faker->name,
            'telefono' => $this->faker->phoneNumber,
            'email' => $this->faker->email,
        ];
    }
}
