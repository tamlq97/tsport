<?php

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/getAllProducts1', function () {
    return Product::paginate(10);
});
Route::group([
    'middleware' => 'api',
    'prefix' => 'auth'
], function () {
    Route::namespace('Auth_Api')->group(function () {
        Route::post('login', 'AuthController@login');
        Route::get('logout', 'AuthController@logout');
        Route::put('changePassword/{user}', "AuthController@changePassword");
        Route::put('update/{user}', "AuthController@update");
        Route::post('refresh', 'AuthController@refresh');
        Route::post('me', 'AuthController@me');
        Route::post('me1', 'AuthController@me1');
    });
});
Route::get('/demo', function (Request $request) {
    return (int) $request->user('api')->hasRole('admin');
});
Route::get('shippings', 'ShippingController@index');
Route::get('payments', 'PaymentController@index');


Route::apiResource('categories', 'CategoryController');
Route::group([
    'namespace' => 'Home',
], function () {
    Route::get('getAllProducts', 'ProductController@getAllProducts');
    Route::get('fetchProdsByKey', 'ProductController@fetchProdsByKey');
    Route::get('getProductsNewRelease', 'ProductController@getProductsNewRelease');
    Route::get('getRelatedProducts/{product}', 'ProductController@getRelatedProducts');
    Route::get('filterProductsBySize', 'ProductController@filterProductsBySize1');
    Route::get('getProduct/{product}', 'ProductController@getProduct');
});

Route::get('getRolesAll', function () {
    return \Spatie\Permission\Models\Role::pluck('name');
});

Route::get('fetchOrders/{uid}', 'OrderController@fetchOrdersByUserID');

Route::apiResource('colors', 'ColorController');

Route::get('sizes', 'SizeController@index');
Route::post('login', 'AuthController@login')->name('login');
Route::post('register', 'AuthController@register');
Route::group(['middleware' => 'auth.api'], function () {
    Route::get('user', function (Request $request) {
        return $request->user();
    });
    Route::get('admin/dashboard', 'Admin\AdminDashboard@index');
    Route::get('admin/dashboard/customer', 'Admin\AdminDashboard@filterCustomerBtwDate');
    Route::get('admin/dashboard/supplier', 'Admin\AdminDashboard@filterSupplierBtwDate');
    Route::get('admin/dashboard/order', 'Admin\AdminDashboard@filterOrderBtwDate');
    Route::post('orders', 'OrderController@store');
    Route::get('orders', 'OrderController@index');
    Route::post('confirmOrder/{madh}', 'OrderController@confirmOrder');
    Route::post('outOfStock/{madh}', 'OrderController@outOfStock');
    Route::delete('delete/{madh}', 'OrderController@delete');

    Route::get('notifications', 'NotificationController@notifications');
    Route::delete('deleteNotify/{user}/{id}', 'NotificationController@delete');
    Route::get('unread/{notifyID}/{userID}', 'NotificationController@unread');


    Route::put('userDetail/{userDetailID}', 'UserDetailController@update');

    Route::apiResource('users', 'UserController');
    Route::get('rules', 'RuleController@index');
    // Route::apiResource('pictures', 'ProductPictureController');
    Route::apiResource('roles', 'RoleController');
    // Route::apiResource('products', 'ProductController');
    Route::get('products', 'ProductController@index');
    Route::get('products/{product}', 'ProductController@show');
    Route::post('products', 'ProductController@store');
    Route::post('products', 'ProductController@store');
    Route::put('products/saveQuantity/{color_size}', 'ProductController@saveQuantity');
    Route::put('products/updateProdStatus/{product}', 'ProductController@updateProdStatus');
    Route::get('products/{product_id}/colors/{color_id}', 'ColorProductPictureController@show');
    Route::post('products/{product_id}/colors/{color_id}', 'ColorProductPictureController@addImageForProductColor');
    Route::put('products/{product}', 'ProductController@update');
    Route::delete('products/{product}', 'ProductController@destroy');
    Route::post(
        'products/deleteItems',
        'ProductController@deleteItems'
    );
    Route::post('colorpicture/deleteSelectedItem', 'ColorProductPictureController@deleteSelectedItem');
    // Route::apiResource('suppliers', 'SupplierController');

    Route::get('suppliers', 'SupplierController@index');
    Route::get('suppliers/{userID}', "SupplierController@show");
    Route::post('suppliers', "SupplierController@store");
    Route::put("suppliers/{supplier}", 'SupplierController@update');
    Route::delete("suppliers/{supplier}", 'SupplierController@destroy');

    Route::get('categoriesM', 'CategoryController@fetchAll');
    Route::post('categoriesM', 'CategoryController@storeCate');
    Route::put('categoriesM/{category}', 'CategoryController@update');
    Route::delete('categoriesM/{category}', 'CategoryController@destroy');
    Route::put('subcategories/{sub_category}', 'SubCategoryController@update');
    Route::delete('subcategories/{sub_category}', 'SubCategoryController@destroy');

    Route::get('customers', 'CustomerController@index');
    Route::get('customers/{customer}', 'CustomerController@show');
    Route::post('customers/{customer}', 'CustomerController@store');
    Route::put('customers/{customer}', 'CustomerController@update');
    Route::put('customers1/{customer}', 'CustomerController@update1');
    Route::delete('customers/{customer}', 'CustomerController@destroy');

    Route::apiResource('permissions', 'PermissionController');
});
