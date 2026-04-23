<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdressController extends Controller
{
    public function index(): JsonResponse
    {
        return response()->json(Adress::all());
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'country' => 'required|string|max:255',
            'city'    => 'required|string|max:255',
            'user_id' => 'required|integer|exists:users,id',
        ]);

        $adress = Adress::create($validated);

        return response()->json($adress, 201);
    }

    public function show(string $id): JsonResponse
    {
        $adress = Adress::findOrFail($id);
        return response()->json($adress);
    }

    public function update(Request $request, string $id): JsonResponse
    {
        $adress = Adress::findOrFail($id);

        $validated = $request->validate([
            'country' => 'sometimes|required|string|max:255',
            'city'    => 'sometimes|required|string|max:255',
            'user_id' => 'sometimes|required|integer|exists:users,id',
        ]);

        $adress->update($validated);

        return response()->json($adress);
    }

    public function destroy(string $id): JsonResponse
    {
        $adress = Adress::findOrFail($id);
        $adress->delete();

        return response()->json(null, 204);
    }
}
