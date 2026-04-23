<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Races;

class RaceController extends Controller
{
    public function index()
    {
        return response()->json(Races::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'date' => 'required|date',
        ]);

        $race = Races::create($validated);

        return response()->json($race, 201);
    }

    public function show(string $id): JsonResponse
    {
        $race = Races::findOrFail($id);
        return response()->json($race); 
}

    public function update(Request $request, string $id): JsonResponse
    {
        $race = Races::findOrFail($id);

        $validated = $request->validate([
            'name' => 'sometimes|required|string|max:255',
            'date' => 'sometimes|required|date',
        ]);

        $race->update($validated);

        return response()->json($race);
    }

    public function destroy(string $id): JsonResponse
    {
        $race = Races::findOrFail($id);
        $race->delete();

        return response()->json(null, 204);
    }
}