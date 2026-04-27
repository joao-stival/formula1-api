<?php

namespace App\Http\Controllers;

use App\Models\Circuit;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CircuitController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Circuit::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'name'      => 'required|string|max:255',
            'country'   => 'required|string|max:255',
            'city'      => 'required|string|max:255',
            'length_km' => 'nullable|numeric|min:0',
        ]);

        $circuit = Circuit::create($validated);

        return response()->json($circuit, 201);
    }

    public function show(string $id): JsonResponse
    {
        $circuit = Circuit::findOrFail($id);
        return response()->json($circuit);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $circuit = Circuit::findOrFail($id);

        $validated = $request->validate([
            'name'      => 'sometimes|required|string|max:255',
            'country'   => 'sometimes|required|string|max:255',
            'city'      => 'sometimes|required|string|max:255',
            'length_km' => 'sometimes|nullable|numeric|min:0',
        ]);

        $circuit->update($validated);

        return response()->json($circuit);
    }

    public function destroy(string $id): JsonResponse
    {
        $circuit = Circuit::findOrFail($id);
        $circuit->delete();

        return response()->json(null, 204);
    }
}
