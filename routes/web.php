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
Route::get('/sztuczne-dodatki', 'PreservativeController@index')->name('preservatives');
Route::get('/przepisy', 'RecipeController@index')->name('recipes');

Route::get('/ajax', 'RecipeController@ajax')->name('ajax');

Route::get('/przepisy-ze-skladnikiem/{slug}', 'RecipeController@recipesWithIngredient')->name('recipes.ingredients');
Route::get('/przepisy-w-kategorii/{slug}', 'RecipeController@recipeInCategories')->name('recipes.categories');
Route::get('/wybrane-przepisy', 'RecipeController@selectedRecipes')->name('recipes.selectedRecipes');
Route::get('/przepis/{slug}', 'RecipeController@recipe')->name('recipes.recipe');

Route::get('/polityka-prywatnosci', 'HomeController@policy');

Route::get('/kontakt', 'ContactController@index')->name('kontakt');
Route::post('/contact-us', 'ContactController@handleForm');

Route::middleware(['auth'])->group(function () {
	Route::get('/admin', 'AdminController@index');

	Route::resource('admin/ingredients', 'IngredientAdminController');
	Route::resource('admin/recipes', 'RecipeAdminController');
	Route::resource('admin/categories', 'CategoryAdminController');
	Route::resource('admin/types', 'TypeAdminController');
	Route::resource('admin/units', 'UnitAdminController');
	Route::resource('admin/months', 'MonthAdminController');
	Route::resource('admin/preservatives', 'PreservativeAdminController');
	Route::post('image-upload', 'CategoryAdminController@store')->name('image.upload.category');
});
