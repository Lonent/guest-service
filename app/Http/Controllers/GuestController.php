<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Guest;

class GuestController extends Controller
{
    public function index()
    {
        return Guest::all();
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|unique:guests,email',
            'phone' => 'required|string|unique:guests,phone',
        ]);

        $guest = Guest::create($validated);
        return response()->json($guest, 201);
    }

    public function show($id)
    {
        return Guest::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'sometimes|required|string|max:255',
            'last_name' => 'sometimes|required|string|max:255',
            'email' => 'sometimes|required|email|unique:guests,email,' . $id,
            'phone' => 'sometimes|required|string|unique:guests,phone,' . $id,
        ]);

        $guest = Guest::findOrFail($id);
        $guest->update($validated);
        return response()->json($guest, 200);
    }

    public function destroy($id)
    {
        Guest::destroy($id);
        return response()->json(null, 204);
    }
}
