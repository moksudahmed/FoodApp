<?php
// app/Http/Controllers/PaymentTransactionController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PaymentTransaction;

class PaymentTransactionController extends Controller
{
    // Create a new payment transaction
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $transaction = PaymentTransaction::create($validatedData);

        return response()->json(['message' => 'Payment transaction created successfully', 'data' => $transaction], 201);
    }

    // Get a list of all payment transactions
    public function index()
    {
        $transactions = PaymentTransaction::all();

        return response()->json(['data' => $transactions]);
    }

    // Get details of a specific payment transaction by ID
    public function show($id)
    {
        $transaction = PaymentTransaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Payment transaction not found'], 404);
        }

        return response()->json(['data' => $transaction]);
    }

    // Update payment transaction details by ID
    public function update(Request $request, $id)
    {
        $transaction = PaymentTransaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Payment transaction not found'], 404);
        }

        $validatedData = $request->validate([
            'order_id' => 'required|exists:orders,order_id',
            'amount' => 'required|numeric|min:0.01',
            'payment_method' => 'nullable|string|max:50',
        ]);

        $transaction->update($validatedData);

        return response()->json(['message' => 'Payment transaction updated successfully', 'data' => $transaction]);
    }

    // Delete a payment transaction by ID
    public function destroy($id)
    {
        $transaction = PaymentTransaction::find($id);

        if (!$transaction) {
            return response()->json(['message' => 'Payment transaction not found'], 404);
        }

        $transaction->delete();

        return response()->json(['message' => 'Payment transaction deleted successfully']);
    }
}
