<?php
// app/Http/Controllers/DeliveryDriverController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DeliveryDriver;

class DeliveryDriverController extends Controller
{
    // Create a new delivery driver
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:delivery_drivers,email',
            'vehicle_info' => 'nullable|string|max:255',
            // Add any other driver-related fields as needed
        ]);

        $driver = DeliveryDriver::create($validatedData);

        return response()->json(['message' => 'Delivery driver created successfully', 'data' => $driver], 201);
    }

    // Get a list of all delivery drivers
    public function index()
    {
        $drivers = DeliveryDriver::all();

        return response()->json(['data' => $drivers]);
    }

    // Get details of a specific delivery driver by ID
    public function show($id)
    {
        $driver = DeliveryDriver::find($id);

        if (!$driver) {
            return response()->json(['message' => 'Delivery driver not found'], 404);
        }

        return response()->json(['data' => $driver]);
    }

    // Update delivery driver details by ID
    public function update(Request $request, $id)
    {
        $driver = DeliveryDriver::find($id);

        if (!$driver) {
            return response()->json(['message' => 'Delivery driver not found'], 404);
        }

        $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'phone_number' => 'nullable|string|max:20',
            'email' => 'required|email|unique:delivery_drivers,email,' . $id,
            'vehicle_info' => 'nullable|string|max:255',
            // Add any other driver-related fields as needed
        ]);

        $driver->update($validatedData);

        return response()->json(['message' => 'Delivery driver updated successfully', 'data' => $driver]);
    }

    // Delete a delivery driver by ID
    public function destroy($id)
    {
        $driver = DeliveryDriver::find($id);

        if (!$driver) {
            return response()->json(['message' => 'Delivery driver not found'], 404);
        }

        $driver->delete();

        return response()->json(['message' => 'Delivery driver deleted successfully']);
    }
}
