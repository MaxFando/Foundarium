<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Domain\Car\Models\Car;
use Domain\Client\Models\Client;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class CarControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testSuccessfulStoreCar()
    {
        $this->actingAs(User::first());

        $requestData = [
            'mark'  => 'Mini Cooper',
            'price' => 300,
        ];

        $this->postJson('/api/cars/store', $requestData)->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('cars', [
            'mark'  => $requestData['mark'],
            'price' => $requestData['price'],
        ]);
    }

    public function testSuccessfulStoreCarWithClient()
    {
        $this->actingAs(User::first());
        $client = Client::factory();

        $requestData = [
            'mark'      => 'Mini Cooper',
            'price'     => 300,
            'client_id' => $client->id,
        ];

        $this->postJson('/api/cars/store', $requestData)->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('cars', [
            'mark'      => $requestData['mark'],
            'price'     => $requestData['price'],
            'client_id' => $client->id,
        ]);
    }

    public function testValidationStoreCar()
    {
        $this->actingAs(User::first());

        $response = $this->postJson('/api/cars/store', []);
        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonStructure(['message', 'errors']);

        $response->assertJsonValidationErrorFor('mark');
        $response->assertJsonValidationErrorFor('price');

        $this->postJson('/api/cars/store', ['mark' => fake()->company()])->assertStatus(
            Response::HTTP_UNPROCESSABLE_ENTITY
        )->assertJsonValidationErrorFor('price')->assertJsonMissingValidationErrors('mark');

        $this->postJson('/api/cars/store', ['price' => 200])->assertStatus(
            Response::HTTP_UNPROCESSABLE_ENTITY
        )->assertJsonValidationErrorFor('mark')->assertJsonMissingValidationErrors('price');
    }

    public function testDelete()
    {
        $this->actingAs(User::first());

        $car = Car::factory()->create();
        $this->assertDatabaseHas('cars', ['id' => $car->id]);

        $this->delete('/api/cars/delete/' . $car->id);
        $this->assertDatabaseMissing('cars', ['id' => $car->id]);
    }

    public function testSuccessfulRentCar()
    {
        $this->actingAs(User::first());

        $car = Car::factory()->create();
        $client = Client::factory()->create();

        $this->patchJson('/api/cars/rent', ['mark' => $car->mark, 'client_id' => $client->id]);

        $this->assertDatabaseHas('cars', ['id' => $car->id, 'client_id' => $client->id]);
    }
}