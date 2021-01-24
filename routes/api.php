<?php

use App\Http\Controllers\memberController;
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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post('/login', 'adminController@login');
Route::post('/store', 'memberController@store');
Route::post('/update', 'memberController@update');
Route::post('/delete', 'memberController@delete');
Route::get('/viewall', 'memberController@viewall');
Route::post('/search', 'memberController@search');
Route::get('/export', 'memberController@export');
Route::post('/viewone', 'memberController@viewone');
