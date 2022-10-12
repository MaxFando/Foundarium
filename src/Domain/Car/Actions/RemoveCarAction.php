<?php

namespace Domain\Car\Actions;

use Domain\Car\DataTransferObjects\RemoveCarData;
use Domain\Car\Exceptions\CantRemoveRantedCarException;
use Domain\Car\Models\Car;

class RemoveCarAction
{
    /**
     * @param RemoveCarData $data
     *
     * @throws CantRemoveRantedCarException
     */
    public function execute(RemoveCarData $data): void
    {
        if ($data->clientId) {
            throw new CantRemoveRantedCarException();
        }

        Car::query()->where('id', $data->id)->delete();
    }
}