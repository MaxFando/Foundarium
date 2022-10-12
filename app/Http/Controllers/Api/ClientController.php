<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Client\StoreClientRequest;
use Domain\Client\Actions\CreateClientAction;
use Domain\Client\DataTransferObjects\NewClientData;
use Domain\Client\Models\Client;
use Domain\Client\ViewModels\ClientViewModel;
use Illuminate\Http\Response;

class ClientController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Client::all()->map(fn(Client $client) => new ClientViewModel($client))]);
    }

    public function store(StoreClientRequest $request)
    {
        $client = CreateClientAction::execute(NewClientData::fromArray($request->all()));

        return response()->json(['data' => new ClientViewModel($client)], Response::HTTP_CREATED);
    }

    public function delete(Client $client)
    {
        $client->delete();

        return response()->noContent();
    }
}