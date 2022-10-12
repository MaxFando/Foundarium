<?php

namespace Domain\Car\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class RentCarData extends DataTransferObject
{
    public string $mark;
    public int $clientId;

    public static function fromArray(array $data): self
    {
        return new self(mark: $data['mark'], clientId: $data['client_id']);
    }
}