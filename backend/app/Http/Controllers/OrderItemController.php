<?php 

// app/Http/Controllers/OrderItemController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrderItem;

class OrderItemController extends Controller
{
    // Create a new order item
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'menu_id' => 'required|exists:restaurant_menus,menu_id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0.01',
        ]);

        $orderItem = OrderItem::create($validatedData);

        return response()->json(['message' => 'Order item created successfully', 'data' => $orderItem], 201);
    }

    // Get a list of all order items
    public function index()
    {
        $orderItems = OrderItem::all();

        return response()->json(['data' => $orderItems]);
    }

    // Get details of a specific order item by ID
    public function show($id)
    {
        $orderItem = OrderItem::find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        return response()->json(['data' => $orderItem]);
    }

    // Update order item details by ID
    public function update(Request $request, $id)
    {
        $orderItem = OrderItem::find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'menu_id' => 'required|exists:restaurant_menus,menu_id',
            'quantity' => 'required|integer|min:1',
            'unit_price' => 'required|numeric|min:0.01',
        ]);

        $orderItem->update($validatedData);

        return response()->json(['message' => 'Order item updated successfully', 'data' => $orderItem]);
    }

    // Delete an order item by ID
    public function destroy($id)
    {
        $orderItem = OrderItem::find($id);

        if (!$orderItem) {
            return response()->json(['message' => 'Order item not found'], 404);
        }

        $orderItem->delete();

        return response()->json(['message' => 'Order item deleted successfully']);
    }
}
