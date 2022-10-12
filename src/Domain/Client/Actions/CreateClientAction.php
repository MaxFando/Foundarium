<?php

namespace Domain\Client\Actions;

use Domain\Client\DataTransferObjects\NewClientData;
use Domain\Client\Models\Client;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class CreateClientAction
{
    public static function execute(NewClientData $data): Builder|Model|Client
    {
        return Client::query()->create($data->all());
    }
}