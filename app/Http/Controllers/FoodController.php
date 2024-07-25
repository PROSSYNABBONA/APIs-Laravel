<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Food;


class FoodController extends Controller
{
    //
    public function food(Request $request)
    {
        // Validate the incoming request data
        $postfood = $request->validate([
            'id'=>'required',
            'name' => 'required', // Name is required
            'description'=>'required',
            'image' => 'required', // Password is required
        ]);
   // Create a new user with the validated data
        $food = Food::create($postfood);

        // Return a JSON response indicating success and include the newly created user
        return response()->json([
            'success' => true,
            'message' => 'Food added successfully',
            'data' => $food
        ], 200); // HTTP status code 201 indicates a resource was created
    }
}
