<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
     public function product(Request $request)
{
    try {
        // Validate the incoming request data
        $postproduct = $request->validate([
            'name' => 'required', // Name is required
            'description' => 'required',
            'category_id' => 'required|exists:categories,id', // Ensure the category_id exists in the categories table
        ]);

        // Create a new product with the validated data
        $product = Product::create($postproduct);

        // Return a JSON response indicating success and include the newly created product
        return response()->json([
            'success' => true,
            'message' => 'Product created successfully',
            'data' => $product
        ], 200); // HTTP status code 200 indicates success
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


// public function productsInAcategory($id){

    // $products = Product::where('category_id', $id)->get();
    // return response()->json($products);
// }

public function productsInAcategory($id){
    $category=Category::find($id);
    if(!$category){
        return response()->json([],401);
    }

    $products=$category->products()->get();

    return response()->json(['category'=>$category,'product'=>$products]);


}
//read all products


    public function productsall(){
        // Find all users
        $products = Product::all();

        // Return a JSON response containing all users
        return response()->json([
           'success' => true,
            'data' => $products
        ], 200); // HTTP status code 200 indicates a successful GET request
    }

         /**
     * Handle the deletion of a user.
     *
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function deleteProduct($id)
    {
        // Find the user by ID
        $product = Product::find($id);

        if ($product) {
            // Delete the user if found
            $product->delete();

            // Return a JSON response indicating success
            return response()->json([
                'success' => true,
                'message' => 'Product deleted successfully'
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
    public function updateProduct(Request $request, $id)
    {
        // Validate the incoming request data
        $postproduct = $request->validate([
            'name' => 'required', // Name is required

            'description' => 'required' // Phone number is required
        ]);

        // Find the user by ID
        $user = Product::find($id);

        if ($user) {
            // Update the user with the validated data
            $user->update($postproduct);

            // Return a JSON response indicating success and include the updated user
            return response()->json([
                'success' => true,
                'message' => 'User updated successfully',
                'data' => $product
            ]);
        }

        // Return a JSON response indicating the user was not found
        return response()->json([
            'success' => false,
            'message' => 'User not found'
        ], 404); // HTTP status code 404 indicates resource not found
    }
     /**
    * Handle the deletion of a us */
    // public function deleteProduct($id)
    // {
    //     // Find the user by ID
    //     $product = User::find($id);

    //     if ($product) {
    //         // Delete the user if found
    //         $product->delete();

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

    /**
     * Handle the update of an existing user.
     *
    //  * @param \Illuminate\Http\Request $request
    //  * @param int $id
    //  * @return \Illuminate\Http\JsonResponse
    //  */
    // public function updateProduct(Request $request, $id)
    // {
    //     // Validate the incoming request data
    //     $postproduct = $request->validate([
    //         'name' => 'required', // Name is required
    //         'description' => 'required',

    //     ]);

    //     // Find the user by ID
    //     $product = User::find($id);

    //     if ($product) {
    //         // Update the user with the validated data
    //         $product->update($postproduct);

    //         // Return a JSON response indicating success and include the updated user
    //         return response()->json([
    //             'success' => true,
    //             'message' => 'User updated successfully',
    //             'data' => $user
    //         ]);
    //     }

    //     // Return a JSON response indicating the user was not found
    //     return response()->json([
    //         'success' => false,
    //         'message' => 'User not found'
    //     ], 404); // HTTP status code 404 indicates resource not found
    // }
}






