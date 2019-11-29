<?php

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

// Route::get('/', function () {
//     return view('home')->name('home');
// });

Auth::routes();

Route::get('/', 'HomeController@index')->name('home');
Route::get('/kalendarz-sezonowy', 'CalendarController@index')->name('calendar');

Route::get('/przepisy-ze-skladnikiem/{id}', 'RecipeAdminController@ingredients')->name('recipes.ingredients');

Route::get('/admin', 'HomeController@admin')->middleware('admin');

// Route::get('/admin/ingredients', 'IngredientAdminController@index')->middleware('admin');
// Route::post('/admin/ingredients', 'IngredientAdminController@store')->middleware('admin');

Route::resource('admin/ingredients', 'IngredientAdminController');
Route::resource('admin/recipes', 'RecipeAdminController');
Route::resource('admin/categories', 'CategoryAdminController');
Route::resource('admin/months', 'MonthAdminController');
