<?php

namespace App\Http\Controllers;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Driver;

class FavoriteDriverController extends Controller
{
    public function index(): JsonResponse
    {
        $user = Auth::user();
        return response()->json($user->favorite_pilot);
    }

    public function store(Request $request): JsonResponse
    {
        $validated = $request->validate([
            'driver_id' => 'required|integer|exists:drivers,id',
        ]);

        $user = Auth::user();
        $user->favorite_pilot = $validated['driver_id'];
        $user->save();

        return response()->json(['favorite_pilot' => $user->favorite_pilot]);
    }

    public function destroy(int $driverId): JsonResponse
    {
        $user = Auth::user();
        if ($user->favorite_pilot == $driverId) {
            $user->favorite_pilot = null;
            $user->save();
        }
        return response()->json(null, 204);
    }
}
