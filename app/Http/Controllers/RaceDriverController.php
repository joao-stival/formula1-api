<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\RaceDrivers;

class RaceDriverController extends Controller
{
    public function index()
    {
        $raceDrivers = RaceDrivers::all();
        return response()->json($raceDrivers);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'race_id'   => 'required|integer|exists:races,id',
            'driver_id' => 'required|integer|exists:drivers,id',
            'position'  => 'required|integer',
        ]);

        $raceDriver = RaceDrivers::create($validated);
        return response()->json($raceDriver, 201); 
    }

    public function show(string $id): JsonResponse
    {
        $raceDriver = RaceDrivers::findOrFail($id);
        return response()->json($raceDriver);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $raceDriver = RaceDrivers::findOrFail($id);

        $validated = $request->validate([
            'race_id'   => 'sometimes|required|integer|exists:races,id',
            'driver_id' => 'sometimes|required|integer|exists:drivers,id',
            'position'  => 'sometimes|required|integer',
        ]);

        $raceDriver->update($validated);
        return response()->json($raceDriver);
    }

    public function destroy(string $id): JsonResponse
    {
        $raceDriver = RaceDrivers::findOrFail($id);
        $raceDriver->delete();
        return response()->json(null, 204);
    }

}