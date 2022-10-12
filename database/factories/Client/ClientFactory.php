<?php

namespace Database\Factories\Client;

use Domain\Client\Models\Client;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientFactory extends Factory
{
    /**
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name(),
        ];
    }

    public function modelName()
    {
        return Client::class;
    }
}