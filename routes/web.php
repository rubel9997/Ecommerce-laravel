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

Route::get('/', 'SiteController@index')->name('index');
Route::get('/product', 'SiteController@product')->name('product');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/brand/add-brand', [App\Http\Controllers\BrandController::class, 'addbrand'])->name('add-brand');

Route::post('/brand/save-brand', [App\Http\Controllers\BrandController::class, 'savebrand'])->name('save-brand');

Route::get('/brand/manage-brand', [App\Http\Controllers\BrandController::class, 'managebrand'])->name('manage-brand');

// Route::get('/brand/inactive/{id}',[App\Http\Controllers\BrandController::class, 'Inactive'])->name('inactive');

// Route::get('/brand/active/{id}',[App\Http\Controllers\BrandController::class, 'active'])->name('active');

Route::get('/brand/delete-brand/{id}', [App\Http\Controllers\BrandController::class, 'delete'])->name('delete-brand');
Route::get('/brand/edit-brand/{id}', [App\Http\Controllers\BrandController::class, 'edit'])->name('edit-brand');
Route::post('/brand/update-brand', [App\Http\Controllers\BrandController::class, 'updatebrand'])->name('update-brand');
Route::get('/brand/admin-profile', [App\Http\Controllers\BrandController::class, 'profile'])->name('admin-profile');
Route::get('/brand/brandstatus/{id}/{s}', [App\Http\Controllers\BrandController::class, 'brandstatus'])->name('brandstatus');
//categories
Route::middleware(['auth'])->group(function(){
Route::get('/category/manage-category', [App\Http\Controllers\CategoryController::class, 'managecategory'])->name('manage-category');
Route::get('/category/add-category', [App\Http\Controllers\CategoryController::class, 'addcategory'])->name('add-category');
Route::post('/category/save-category', [App\Http\Controllers\CategoryController::class, 'savecategory'])->name('save-category');
Route::get('/category/edit-category/{id}', [App\Http\Controllers\CategoryController::class, 'edit'])->name('edit-category');
Route::post('/brand/update-category', [App\Http\Controllers\CategoryController::class, 'updatecategory'])->name('update-category');
Route::get('/category/delete-category/{id}', [App\Http\Controllers\CategoryController::class, 'delete'])->name('delete-category');
Route::get('/category/categorystatus/{id}/{s}', [App\Http\Controllers\CategoryController::class, 'categorystatus'])->name('categorystatus');

//subcategory
Route::get('/category/manage-subcategory', [App\Http\Controllers\SubcategoryController::class, 'managesubcategory'])->name('manage-subcategory');
Route::get('/categroy/add-sub-category',[App\Http\Controllers\SubcategoryController::class, 'addsubcategory'])->name('add-sub-category');
Route::post('/category/save-subcategory', [App\Http\Controllers\SubcategoryController::class, 'savecategory'])->name('save-subcategory');
Route::get('/category/manage-subsubcategory', [App\Http\Controllers\SubsubCategoryController::class, 'managesubsubcategory'])->name('manage-subsubcategory');
});