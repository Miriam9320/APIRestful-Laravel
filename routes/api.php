<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/
/**
 * primer parametro es el recurso, segundo ruta y controlador, tercero se restringe a que la ruta solo sea para index y show
 * Buyers
 */
Route::resource('buyers', 'Buyer\BuyerController', ['only' => ['index', 'show']]);
 /**
 * All operations except create and edit
 * Categories
 */
Route::resource('category', 'Category\CategoryController', ['except' => ['create', 'edit']]);
 /*
 * Products
 */
Route::resource('products', 'Product\ProductController', ['only' => ['index', 'show']]);
 /*
 * Transactions
 */
Route::resource('transactions', 'Transaction\TransactionController', ['only' => ['index', 'show']]);
 /*
 * Sellers
 */
Route::resource('sellers', 'Seller\SellerController', ['only' => ['index', 'show']]);
 /*
 * Users
 */
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
