<?php

namespace Domain\Car\Actions;

use Domain\Car\DataTransferObjects\NewCarData;
use Domain\Car\Models\Car;
use Domain\Client\Models\Client;

class CreateCarAction
{
    public static function execute(NewCarData $data): Car
    {
        /** @var Car $car */
        $car = Car::query()->create($data->all());
        if ($data->clientId) {
            $car->client()->associate(Client::find($data->clientId));
        }

        return $car;
    }
}