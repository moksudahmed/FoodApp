<?php
// app/Http/Controllers/OrderController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Illuminate\Validation\Rule;

class OrderController extends Controller
{
    // Create a new order
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,restaurant_id',
            'status' => 'required|in:pending,delivered',
            'delivery_address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0.01',
        ]);

        $order = Order::create($validatedData);

        return response()->json(['message' => 'Order created successfully', 'data' => $order], 201);
    }

    // Get a list of all orders
    public function index()
    {
        $orders = Order::all();

        return response()->json(['data' => $orders]);
    }

    // Get details of a specific order by ID
    public function show($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        return response()->json(['data' => $order]);
    }

    // Update order details by ID
    public function update(Request $request, $id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $validatedData = $request->validate([
            'customer_id' => 'required|exists:users,id',
            'restaurant_id' => 'required|exists:restaurants,restaurant_id',
            'status' => 'required|in:pending,delivered',
            'delivery_address' => 'required|string|max:255',
            'total_price' => 'required|numeric|min:0.01',
        ]);

        $order->update($validatedData);

        return response()->json(['message' => 'Order updated successfully', 'data' => $order]);
    }

    // Delete an order by ID
    public function destroy($id)
    {
        $order = Order::find($id);

        if (!$order) {
            return response()->json(['message' => 'Order not found'], 404);
        }

        $order->delete();

        return response()->json(['message' => 'Order deleted successfully']);
    }
}
