<?php
// app/Http/Controllers/PromoCodeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PromoCode;

class PromoCodeController extends Controller
{
    // Create a new promo code
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'code' => 'required|string|unique:promo_codes,code|max:20',
            'discount_amount' => 'required|numeric|min:0.01',
            'expiration_date' => 'required|date',
        ]);

        $promoCode = PromoCode::create($validatedData);

        return response()->json(['message' => 'Promo code created successfully', 'data' => $promoCode], 201);
    }

    // Get a list of all promo codes
    public function index()
    {
        $promoCodes = PromoCode::all();

        return response()->json(['data' => $promoCodes]);
    }

    // Get details of a specific promo code by ID
    public function show($id)
    {
        $promoCode = PromoCode::find($id);

        if (!$promoCode) {
            return response()->json(['message' => 'Promo code not found'], 404);
        }

        return response()->json(['data' => $promoCode]);
    }

    // Update promo code details by ID
    public function update(Request $request, $id)
    {
        $promoCode = PromoCode::find($id);

        if (!$promoCode) {
            return response()->json(['message' => 'Promo code not found'], 404);
        }

        $validatedData = $request->validate([
            'code' => 'required|string|unique:promo_codes,code,' . $id . '|max:20',
            'discount_amount' => 'required|numeric|min:0.01',
            'expiration_date' => 'required|date',
        ]);

        $promoCode->update($validatedData);

        return response()->json(['message' => 'Promo code updated successfully', 'data' => $promoCode]);
    }

    // Delete a promo code by ID
    public function destroy($id)
    {
        $promoCode = PromoCode::find($id);

        if (!$promoCode) {
            return response()->json(['message' => 'Promo code not found'], 404);
        }

        $promoCode->delete();

        return response()->json(['message' => 'Promo code deleted successfully']);
    }
}
