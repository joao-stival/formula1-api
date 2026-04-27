<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DriverController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Driver::with('team')->get());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'    => 'required|string|max:255',
            'team_id' => 'required|integer|exists:teams,id',
        ]);

        $driver = Driver::create($validated);

        return response()->json($driver, 201);
    }

    public function show(string $id): JsonResponse
    {
        $driver = Driver::with('team')->findOrFail($id);
        return response()->json($driver);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $driver = Driver::findOrFail($id);

        $validated = $request->validate([
            'name'    => 'sometimes|required|string|max:255',
            'team_id' => 'sometimes|required|integer|exists:teams,id',
        ]);

        $driver->update($validated);

        return response()->json($driver);
    }

    public function destroy(string $id): JsonResponse
    {
        $driver = Driver::findOrFail($id);
        $driver->delete();

        return response()->json(null, 204);
    }
}
