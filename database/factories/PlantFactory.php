<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Plant>
 */
class PlantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->sentence(mt_rand(2,5)),
            'category_id' => mt_rand(1,3),
            'desc' => $this->faker->sentence(mt_rand(5,10))
        ];
    }
}
