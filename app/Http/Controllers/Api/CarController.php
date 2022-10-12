<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Car\RentCarRequest;
use App\Http\Requests\Car\StoreCarRequest;
use Domain\Car\Actions\CreateCarAction;
use Domain\Car\Actions\RentCarAction;
use Domain\Car\DataTransferObjects\NewCarData;
use Domain\Car\DataTransferObjects\RentCarData;
use Domain\Car\Models\Car;
use Domain\Car\ViewModels\CarViewModel;
use Illuminate\Http\Response;

class CarController extends Controller
{
    public function index()
    {
        return response()->json(['data' => Car::all()->map(fn(Car $car) => new CarViewModel($car))]);
    }

    public function store(StoreCarRequest $request)
    {
        $car = CreateCarAction::execute(NewCarData::fromArray($request->all()));

        return response()->json(['data' => new CarViewModel($car)], Response::HTTP_CREATED);
    }

    public function rent(RentCarRequest $request)
    {
        $car = RentCarAction::execute(RentCarData::fromArray($request->all()));

        return response()->json(['data' => new CarViewModel($car)]);
    }

    public function delete(Car $car)
    {
        $car->delete();

        return response()->noContent();
    }
}