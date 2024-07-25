<?php

use App\Models\User;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FoodController;
use App\Http\Controllers\ProductController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for retrieving and returning all users as JSON
Route::get('/allusers', function () {
    $users = User::all(); // Retrieve all users from the database
    return response()->json(['users' => $users]); // Return the users as JSON
});

// Route for retrieving a specific user by ID and returning it as JSON
Route::get('/singleUser/{id}', function ($id) {
    $user = User::find($id); // Find the user by ID

    if ($user) {
        // If the user is found, return the user data as JSON
        return response()->json( $user);
    }

    // If the user is not found, return a 404 error with a message
    return response()->json(['message' => 'User not found'], 404);
})->name('updateProssy'); // Name this route 'updateProssy'

// Route for creating a new user
Route::post('/createUser',[UserController::class,'createUser'])->name('createUser');

// Route for deleting a user by ID
Route::delete('/deleteUser/{id}', [UserController::class, 'deleteUser'])->name('deleteUser');

// Route for updating a user by ID
Route::put('/updateUser/{id}',[UserController::class, 'updateUser'])->name('updateUser');

//Route for food
Route::post('/food',[FoodController::class,'food'])->name('food');
//Route for  category
//Route::post('/category',[CategoryController::class,'category'])->name('category');

//Categories and food APIS relationships
//Route for food
Route::post('/category',[CategoryController::class,'category'])->name('category');
//Route for  category
Route::post('/product',[ProductController::class,'product'])->name('product');

//  rout to read categories


Route::get('/categories', [CategoryController::class, 'categories'])->name('categories');

// read products with in the specific category
    Route::get('products/{id}/category', [ProductController::class, 'productsInAcategory'])->name('categories');

//read all the products
         Route::get('productsall', [ProductController::class, 'productsall'])->name('productsall');




