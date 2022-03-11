<?php

use Illuminate\Http\Request;
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

Route::get('/programming-data/search/{campus}/{clave}', 'App\Http\Controllers\ProgramacionDocenteController@getProgrammingData');

Route::get('/find-jobs/all', 'App\Http\Controllers\FindJobsController@getJobs');

Route::get('/consultecti/categories', 'App\Http\Controllers\ConsultecController@getCategories');
Route::get('/consultecti/products', 'App\Http\Controllers\ConsultecController@getProducts');
Route::get('/consultecti/product/{id}', 'App\Http\Controllers\ConsultecController@getProduct');
