<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    //
    public function category(Request $request)
    {
        // Validate the incoming request data
        $postcategory = $request->validate([

            'name' => 'required', // Name is required
            'description' => 'required',
        ]);
        // Create a new category with the validated data
        $category = Category::create($postcategory);

        // Return a JSON response indicating success and include the newly created user
        return response()->json([
            'success' => true,
            'message' => 'Category created successfully',
            'data' => $category
        ], 200); // HTTP status code 201 indicates a resource was created

    }


    // controller to  read to  categories

    public function categories(){
        // Find all users
        $categories = Category::all();

        // Return a JSON response containing all users
        return response()->json([
           'success' => true,
            'data' => $categories
        ], 200); // HTTP status code 200 indicates a successful GET request
    }
         /**
     * Handle the deletion of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteCategory($id)
    {
        // Find the user by ID
        $category = User::find($id);

        if ($category) {
            // Delete the user if found
            $category->delete();

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
    public function updateCategory(Request $request, $id)
    {
        // Validate the incoming request data
        $postcategory = $request->validate([
            'name' => 'required', // Name is required
            // 'image' => 'required|email', // Email is required and must be a valid email address
            'description' => 'required' // Phone number is required
        ]);

        // Find the user by ID
        $category = Category::find($id);

        if ($category) {
            // Update the user with the validated data
            $category->update($postcategory);

            // Return a JSON response indicating success and include the updated user
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $category
            ]);
        }

        // Return a JSON response indicating the user was not found
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404); // HTTP status code 404 indicates resource not found
    }
     /**
     * Handle the deletion of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    // public function deleteCategory($id)
    // {
    //     // Find the user by ID
    //     $category = Category::find($id);

    //     if ($category) {
    //         // Delete the user if found
    //         $category->delete();

    //         // Return a JSON response indicating success
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'User deleted successfully'
    //         ]);
    //     }

    //     // Return a JSON response indicating the user was not found
    //     return response()->json([
    //         'success' => false,
    //         'message' => 'User not found'
    //     ], 404); // HTTP status code 404 indicates resource not found
    // }

//     /**
//      * Handle the update of an existing user.
//      *
//      * @param \Illuminate\Http\Request $request
//      * @param int $id
//      * @return \Illuminate\Http\JsonResponse
//      */
//     public function updateCategory(Request $request, $id)
//     {
//         // Validate the incoming request data
//         $postcategory = $request->validate([
//             'name' => 'required', // Name is required
//             'image' => 'required',

//         ]);

//         // Find the user by ID
//         $category = Category::find($id);

//         if ($category) {
//             // Update the user with the validated data
//             $category->update($postcategory);

//             // Return a JSON response indicating success and include the updated user
//             return response()->json([
//                 'success' => true,
//                 'message' => 'User updated successfully',
//                 'data' => $category
//             ]);
//         }

//         // Return a JSON response indicating the user was not found
//         return response()->json([
//             'success' => false,
//             'message' => 'User not found'
//         ], 404); // HTTP status code 404 indicates resource not found
//     }
// }











}
