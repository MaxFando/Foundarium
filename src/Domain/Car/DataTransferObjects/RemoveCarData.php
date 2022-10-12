<?php

namespace Domain\Car\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class RemoveCarData extends DataTransferObject
{
    public int $id;
    public ?int $clientId;

    public static function fromArray(array $data): self
    {
        return new self(id: $data['car_id'], clientId: $data['client_id']);
    }
}