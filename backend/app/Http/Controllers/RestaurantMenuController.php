<?php 
// app/Http/Controllers/RestaurantMenuController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\RestaurantMenu;
use Illuminate\Validation\Rule;

class RestaurantMenuController extends Controller
{
    // Create a new menu item
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,id',
            'name' => 'required|string|max:100|unique:restaurant_menus',
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'category' => 'nullable|string|max:50',
        ]);

        $menu = RestaurantMenu::create($validatedData);

        return response()->json(['message' => 'Menu item created successfully', 'data' => $menu], 201);
    }

    // Get a list of all menu items
    public function index()
    {
        $menuItems = RestaurantMenu::all();

        return response()->json(['data' => $menuItems]);
    }

    // Get details of a specific menu item by ID
    public function show($id)
    {
        $menuItem = RestaurantMenu::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Menu item not found'], 404);
        }

        return response()->json(['data' => $menuItem]);
    }

    // Update menu item details by ID
    public function update(Request $request, $id)
    {
        $menuItem = RestaurantMenu::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Menu item not found'], 404);
        }

        $validatedData = $request->validate([
            'restaurant_id' => 'required|exists:restaurants,restaurant_id',
            'name' => [
                'required',
                'string',
                'max:100',
                Rule::unique('restaurant_menus')->ignore($menuItem->menu_id),
            ],
            'description' => 'nullable|string',
            'price' => 'required|numeric|min:0.01',
            'category' => 'nullable|string|max:50',
        ]);

        $menuItem->update($validatedData);

        return response()->json(['message' => 'Menu item updated successfully', 'data' => $menuItem]);
    }

    // Delete a menu item by ID
    public function destroy($id)
    {
        $menuItem = RestaurantMenu::find($id);

        if (!$menuItem) {
            return response()->json(['message' => 'Menu item not found'], 404);
        }

        $menuItem->delete();

        return response()->json(['message' => 'Menu item deleted successfully']);
    }
}
