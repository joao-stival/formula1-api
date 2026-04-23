<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return response()->json(User::all());
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        $login = User::create($validated);

        return response()->json($login, 201);
    }

    public function show(string $id)
    {
        $login = User::findOrFail($id);
        return response()->json($login);
    }

    public function update(Request $request, string $id)
    {
        $login = User::findOrFail($id);

        $validated = $request->validate([
            'email'    => 'sometimes|required|email',
            'password' => 'sometimes|required|string|min:8',
        ]);

        $login->update($validated);

        return response()->json($login);
    }

    public function destroy(string $id)
    {
        $login = User::findOrFail($id);
        $login->delete();
        return response()->json(null, 204);
    }

    public function login(Request $request)
    {
        $validated = $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $validated['email'])->first();

        if (!$user || !Hash::check($validated['password'], $user->password)) {
            return response()->json([
                'message' => 'E-mail ou senha incorretos.'
            ], 401);
        }

        return response()->json([
            'message' => 'Login realizado com sucesso.'
        ]);
    }


}
