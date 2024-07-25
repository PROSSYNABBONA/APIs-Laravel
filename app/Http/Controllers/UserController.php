<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


class UserController extends Controller
{
    /**
     * Handle the creation of a new user.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createUser(Request $request)
    {
        // Validate the incoming request data
        $postuser = $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email', // Email is required and must be a valid email address
            'password' => 'required', // Password is required
            'phone' => 'required' // Phone number is required
        ]);

        // Create a new user with the validated data
        $user = User::create($postuser);

        // Return a JSON response indicating success and include the newly created user
        return response()->json([
            'success' => true,
            'message' => 'User created successfully',
            'data' => $user
        ], 200); // HTTP status code 201 indicates a resource was created
    }

    /**
     * Handle the deletion of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteUser($id)
    {
        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Delete the user if found
            $user->delete();

            // Return a JSON response indicating success
            return response()->json([
                'success' => true,
                'message' => 'User deleted successfully'
            ]);
        }

        // Return a JSON response indicating the user was not found
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404); // HTTP status code 404 indicates resource not found
    }

    /**
     * Handle the update of an existing user.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request, $id)
    {
        // Validate the incoming request data
        $postuser = $request->validate([
            'name' => 'required', // Name is required
            'email' => 'required|email', // Email is required and must be a valid email address
            'phone' => 'required' // Phone number is required
        ]);

        // Find the user by ID
        $user = User::find($id);

        if ($user) {
            // Update the user with the validated data
            $user->update($postuser);

            // Return a JSON response indicating success and include the updated user
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $user
            ]);
        }

        // Return a JSON response indicating the user was not found
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404); // HTTP status code 404 indicates resource not found
    }
}


