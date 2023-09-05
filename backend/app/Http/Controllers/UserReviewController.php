<?php

// app/Http/Controllers/UserReviewController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserReview;

class UserReviewController extends Controller
{
    // Create a new user review
    public function create(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'restaurant_id' => 'required|exists:restaurants,restaurant_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review = UserReview::create($validatedData);

        return response()->json(['message' => 'User review created successfully', 'data' => $review], 201);
    }

    // Get a list of all user reviews
    public function index()
    {
        $reviews = UserReview::all();

        return response()->json(['data' => $reviews]);
    }

    // Get details of a specific user review by ID
    public function show($id)
    {
        $review = UserReview::find($id);

        if (!$review) {
            return response()->json(['message' => 'User review not found'], 404);
        }

        return response()->json(['data' => $review]);
    }

    // Update user review details by ID
    public function update(Request $request, $id)
    {
        $review = UserReview::find($id);

        if (!$review) {
            return response()->json(['message' => 'User review not found'], 404);
        }

        $validatedData = $request->validate([
            'user_id' => 'required|exists:users,user_id',
            'restaurant_id' => 'required|exists:restaurants,restaurant_id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string',
        ]);

        $review->update($validatedData);

        return response()->json(['message' => 'User review updated successfully', 'data' => $review]);
    }

    // Delete a user review by ID
    public function destroy($id)
    {
        $review = UserReview::find($id);

        if (!$review) {
            return response()->json(['message' => 'User review not found'], 404);
        }

        $review->delete();

        return response()->json(['message' => 'User review deleted successfully']);
    }
}
