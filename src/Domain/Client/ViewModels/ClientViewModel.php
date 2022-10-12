<?php

namespace Domain\Client\ViewModels;

use Domain\Car\DataTransferObjects\CarData;
use Domain\Car\Models\Car;
use Domain\Client\DataTransferObjects\ClientData;
use Domain\Client\Models\Client;
use Domain\Shared\ViewModels\ViewModel;

class ClientViewModel extends ViewModel
{
    public function __construct(private ?Client $client = null)
    {
    }

    public function client(): ?ClientData
    {
        if (!$this->client) {
            return null;
        }

        return ClientData::from($this->client->load(['car']));
    }

    public function car(): ?CarData
    {
        /** @var Car|null $car */
        if ($car = Car::query()->where('client_id', $this->client->id)->first()) {
            return CarData::from($car);
        }

        return null;
    }
}