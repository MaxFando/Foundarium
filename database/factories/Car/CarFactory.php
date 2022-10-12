<?php

namespace Database\Factories\Car;

use Domain\Car\Models\Car;
use Illuminate\Database\Eloquent\Factories\Factory;

class CarFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'mark' => fake()->company(),
            'price' => fake()->numberBetween(100, 500),
        ];
    }

    public function modelName()
    {
        return Car::class;
    }
}