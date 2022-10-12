<?php

namespace Domain\Car\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class NewCarData extends DataTransferObject
{
    public string $mark;
    public float $price;
    public ?int $clientId;

    public static function fromArray(array $data): self
    {
        return new self(mark: $data['mark'], price: $data['price'], clientId: $data['client_id'] ?? null);
    }
}