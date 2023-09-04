<?php

namespace App\Http\Controllers;
use App\UserReview;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class UserReviewController extends Controller
{
    //
    public function store(Request $request)
    {
        // Validate and create a new user review
        // ...

        return response()->json(['message' => 'Review submitted successfully', 'review' => $review], 201);
    }

    public function show($id)
    {
        // Retrieve and return a user review by ID
        // ...

        return response()->json(['review' => $review]);
    }
}
