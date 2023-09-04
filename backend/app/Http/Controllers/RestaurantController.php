<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use App\Models\Restaurant;
use Illuminate\Validation\Rule;

class RestaurantController extends Controller
{
    // Create a new restaurant
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100|unique:restaurants',
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|string|email|unique:restaurants',
            'owner_id' => 'required|exists:users,id', // Assumes "users" is the table name for the User model
        ]);

        $restaurant = Restaurant::create($validatedData);

        return response()->json(['message' => 'Restaurant created successfully', 'data' => $restaurant], 201);
    }

    // Get a list of all restaurants
    public function index()
    {
        $restaurants = Restaurant::all();

        return response()->json(['data' => $restaurants]);
    }

    // Get details of a specific restaurant
    public function show($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        return response()->json(['data' => $restaurant]);
    }

    // Update restaurant details
    public function update(Request $request, $id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('restaurants')->ignore($restaurant->id),
            ],
            'description' => 'nullable|string',
            'address' => 'required|string|max:255',
            'phone_number' => 'nullable|string|max:20',
            'email' => [
                'required',
                'string',
                'email',
                Rule::unique('restaurants')->ignore($restaurant->id),
            ],
            'owner_id' => 'required|exists:users,id', // Assumes "users" is the table name for the User model
        ]);

        $restaurant->update($validatedData);

        return response()->json(['message' => 'Restaurant updated successfully', 'data' => $restaurant]);
    }

    // Delete a restaurant
    public function destroy($id)
    {
        $restaurant = Restaurant::find($id);

        if (!$restaurant) {
            return response()->json(['message' => 'Restaurant not found'], 404);
        }

        $restaurant->delete();

        return response()->json(['message' => 'Restaurant deleted successfully']);
    }
}
