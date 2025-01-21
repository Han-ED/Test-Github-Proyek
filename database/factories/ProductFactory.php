<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
{
    return [
        'Nama_Produk' => $this->faker->lastName(),
        'Jenis_Product' => $this->faker->state(),
        'Harga' => $this->faker->numberBetween(1000, 100000), // Tentukan rentang sesuai kebutuhan
        'Tanggal' => $this->faker->dateTime(),
    ];
}
}
