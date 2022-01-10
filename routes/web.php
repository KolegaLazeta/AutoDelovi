<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/



Route::get('/', [\App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::get('/product/{product}', [\App\Http\Controllers\ProductController::class, 'index'])->name('product');
Route::get('/all_products', [\App\Http\Controllers\ProductController::class, 'allProducts'])->name('all_products');

Route::get('/categories/{category}/products', [\App\Http\Controllers\ProductController::class, 'products_by_category'])->name('category_products');
Route::get('/brands/{brand}/products', [\App\Http\Controllers\ProductController::class, 'products_by_brand'])->name('brand_products');
Route::get('/vehicle_type/{vehicle_type}/products', [\App\Http\Controllers\ProductController::class, 'products_by_vehicle_type'])->name('vehicle_type_products');
Route::get('/search', [\App\Http\Controllers\ProductController::class, 'products_by_search'])->name('search_products');

Route::get('/brands', [\App\Http\Controllers\BrandController::class, 'index'])->name('brands');
Route::get('/brands/{brand}', [\App\Http\Controllers\BrandController::class, 'brand'])->name('brand');

Route::get('/vehicle', [\App\Http\Controllers\VehicleController::class, 'index'])->name('vehicle');


#Auth routesd-------------------------------------------------------------------------------------------------------
Auth::routes();


Route::get('/product/purchase/create', [\App\Http\Controllers\PurchaseController::class, 'create'])->name('create_purchase');
Route::post('/product/purchase/store', [\App\Http\Controllers\PurchaseController::class, 'store'])->name('store_purchase');

Route::resource('/cart', 'App\Http\Controllers\CartController');

Route::get('/cart', [\App\Http\Controllers\CartController::class, 'index'])->name('cart');
Route::put('/cart/update/{cart}', [\App\Http\Controllers\CartController::class, 'update'])->name('cart_update');
Route::delete('/cart/delete/{cart}', [\App\Http\Controllers\CartController::class, 'destroy'] )->name('destroy_cart');

Route::post('/product/{product}/comment', [\App\Http\Controllers\CommentController::class, 'store'])->name('store_comment');
Route::delete('/product/{product}/comment/delete/{comment}', 'CommentController@destroy')->name('destory_comment');

#Roles-------------------------------------------------------------------------------------------------------------
Route::middleware(['roles:admin', 'auth'])->group(function () {

    //Purchase
    Route::get('/admin', [\App\Http\Controllers\PurchaseController::class, 'show'])->name('admin');
    Route::get('/admin/purchase/{purchase}/info', [\App\Http\Controllers\PurchaseController::class, 'purchaseInfo'])->name('purchase_info');
    Route::delete('admin/purchase/delete/{brand}', [\App\Http\Controllers\PurchaseController::class, 'destroy'])->name('destroy_purchase');

    
    //Brand
    Route::get('/admin/brands/create_brand', [\App\Http\Controllers\BrandController::class, 'create'])->name('create_brand');
    Route::get('/admin/brands', [\App\Http\Controllers\BrandController::class, 'show'])->name('show_brands');
    Route::post('/admin/brands/store', [\App\Http\Controllers\BrandController::class, 'store'])->name('store_brand');
    Route::delete('admin/brands/delete/{brand}', [\App\Http\Controllers\BrandController::class, 'destroy'])->name('destroy_brand');
    
    //Cateogories
    Route::get('/admin/categories', [\App\Http\Controllers\CategoryController::class, 'show'])->name('show_categories');
    Route::get('/admin/category/create', [\App\Http\Controllers\CategoryController::class, 'create'])->name('create_category');
    Route::post('/admin/category/store', [\App\Http\Controllers\CategoryController::class, 'store'])->name('store_category');
    Route::delete('/admin/category/delete/{category}', [\App\Http\Controllers\CategoryController::class, 'destroy'])->name('destroy_category'); 
    
    //Products
    Route::get('/admin/product/all', [\App\Http\Controllers\ProductController::class, 'allProductsAdmin'])->name('admin_products');
    Route::get('/admin/product/create', [\App\Http\Controllers\ProductController::class, 'create'])->name('create_product');
    Route::post('/admin/product/store', [\App\Http\Controllers\ProductController::class, 'store'])->name('store_product');
    Route::get('/admin/product/edit/{product}', [\App\Http\Controllers\ProductController::class, 'edit'])->name('edit_product');
    Route::patch('/admin/product/update/{id}', [\App\Http\Controllers\ProductController::class, 'update'])->name('update_product');
    Route::delete('/admin/product/delete/{product}', [\App\Http\Controllers\ProductController::class, 'destroy'])->name('destory_product'); 
});
