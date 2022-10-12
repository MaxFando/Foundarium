<?php

namespace Domain\Car\Actions;

use Domain\Car\DataTransferObjects\RentCarData;
use Domain\Car\Models\Car;

class RentCarAction
{
    public static function execute(RentCarData $data): Car
    {
        /** @var Car $car */
        $car = Car::free()->where('mark', $data->mark)->first();
        $car->client_id = $data->clientId;
        $car->save();

        return $car->refresh();
    }
}