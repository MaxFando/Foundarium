<?php

namespace Domain\Car\DataTransferObjects;

use Domain\Car\Models\Car;
use Domain\Client\Models\Client;
use Spatie\DataTransferObject\DataTransferObject;

class CarData extends DataTransferObject
{
    public int $id;
    public string $mark;
    public float $price;
    public ?int $clientId;
    public ?Client $client;

    public static function from(Car $car)
    {
        return new self(
            id: $car->id,
            mark: $car->mark,
            price: $car->price,
            clientId: $car->clientId,
            client: $car->client
        );
    }
}