<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\CategoryController;
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'prefix' => 'v1/'
], function () {

    //Category
    Route::get('category', 'CategoryController@index');
    Route::get('category/{category}', 'CategoryController@show');
    Route::post('category', 'CategoryController@store');
    Route::put('category/{category}', 'CategoryController@update');
    Route::delete('category/{category}', 'CategoryController@delete');

    //Books
    Route::get('book', 'BookController@index');
    Route::get('book/{book}', 'BookController@show');
    Route::post('book', 'BookController@store');
    Route::put('book/{book}', 'BookController@update');
    Route::delete('book/{book}', 'BookController@delete');

});