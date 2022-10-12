<?php

namespace Tests\Feature\Api;

use App\Models\User;
use Domain\Client\Models\Client;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Http\Response;
use Tests\TestCase;

class ClientControllerTest extends TestCase
{
    use DatabaseTransactions;

    public function testStoreClient()
    {
        $this->actingAs(User::first());

        $requestData = ['name' => fake()->name()];

        $response = $this->postJson('/api/clients/store', $requestData);

        $response->assertStatus(Response::HTTP_CREATED);

        $this->assertDatabaseHas('clients', ['name' => $requestData['name']]);
    }

    public function testDeleteClient()
    {
        $this->actingAs(User::first());

        $client = Client::factory()->create();
        $this->assertDatabaseHas('clients', ['name' => $client->name]);

        $this->delete('/api/clients/delete/' . $client->id);
        $this->assertDatabaseMissing('clients', ['name' => $client->name]);
    }
}