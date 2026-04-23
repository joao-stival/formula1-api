<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Teams;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Teams::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'  => 'required|string|max:255',
            'logo'  => 'required|string',
            'color' => 'required|string|max:7',
        ]);

        $team = Teams::create($validated);

        return response()->json($team, 201);
    }

    public function show(string $id) : JsonResponse
    {
        $team = Teams::findOrFail($id);
        return response()->json($team);
    }

    public function update(Request $request, string $id) : JsonResponse
    {
        $team = Teams::findOrFail($id);

        $validated = $request->validate([
            'name'  => 'sometimes|required|string|max:255',
            'logo'  => 'sometimes|required|string',
            'color' => 'sometimes|required|string|max:7',
        ]);

        $team->update($validated);

        return response()->json($team);
    }

    public function destroy(string $id) : JsonResponse
    {
        $team = Teams::findOrFail($id);
        $team->delete();

        return response()->json(null, 204);
    }
}
