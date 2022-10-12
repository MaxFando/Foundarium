<?php

namespace Domain\Car\ViewModels;

use Domain\Car\DataTransferObjects\CarData;
use Domain\Car\Models\Car;
use Domain\Client\DataTransferObjects\ClientData;
use Domain\Client\Models\Client;
use Domain\Shared\ViewModels\ViewModel;

class CarViewModel extends ViewModel
{
    public function __construct(public ?Car $car = null)
    {
    }

    public function car(): ?CarData
    {
        if (!$this->car) {
            return null;
        }

        return CarData::from($this->car->load(['client']));
    }

    public function client(): ?ClientData
    {
        if ($client = Client::find($this->car->clientId)) {
            return ClientData::from($client);
        }

        return null;
    }
}