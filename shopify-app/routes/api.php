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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::resource('bundles', 'BundlesController');

Route::group([
  'middleware' => ['cors'],
], function() {
  Route::get('bundles', 'BundlesController@index');
  Route::post('bundles', 'BundlesController@store');
  Route::get('bundles/{id}', 'BundlesController@show');
  Route::put('bundles/{id}', 'BundlesController@update');
  Route::delete('bundles/{id}', 'BundlesController@destroy');
});
