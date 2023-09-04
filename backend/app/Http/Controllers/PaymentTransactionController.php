<?php

namespace App\Http\Controllers;
use App\PaymentTransaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PaymentTransactionController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate and create a new payment transaction
        // ...

        return response()->json(['message' => 'Payment transaction recorded successfully', 'transaction' => $transaction], 201);
    }

    public function show($id)
    {
        // Retrieve and return a payment transaction by ID
        // ...

        return response()->json(['transaction' => $transaction]);
    }
}
