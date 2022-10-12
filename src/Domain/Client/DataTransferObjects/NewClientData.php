<?php

namespace Domain\Client\DataTransferObjects;

use Spatie\DataTransferObject\DataTransferObject;

class NewClientData extends DataTransferObject
{
    public string $name;

    public static function fromArray(array $data): self
    {
        return new self(name: $data['name']);
    }
}