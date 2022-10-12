<?php

namespace Domain\Client\DataTransferObjects;

use Domain\Client\Models\Client;
use Spatie\DataTransferObject\DataTransferObject;

class ClientData extends DataTransferObject
{
    public int $id;
    public string $name;

    public static function from(Client $client)
    {
        return new self(id: $client->id, name: $client->name,);
    }
}