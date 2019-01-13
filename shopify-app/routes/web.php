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

include_once 'bundles.php';

use Illuminate\Support\Facades\Log;
use App\Events\TestBroadcast;

Route::get('/',  'HomeController@index')->name('first');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'HomeController@admin')->name('admin')->middleware(['auth']);

Route::get('login/shopify', 'Auth\LoginShopifyController@redirectToProvider')->name('login.shopify');
Route::get('login/shopify/callback', 'Auth\LoginShopifyController@handleProviderCallback');

Route::get('/store/{storeId}', 'ShopifySubcribeController@dashboardStore')->middleware(['auth', 'subscribed']);
Route::get('stores/{storeId}/shopify/subscribe', 'ShopifySubcribeController@handleSubcribeCallback')->name('shopify.subscribe');

Route::get('/oauth/authorize', 'ProductController@getResponse');
Route::get('/shopify', 'ProductController@getPermission');

Route::post('webhook/shopify/order-created', function(\Illuminate\Http\Request $request) {
  Log::info('An product have created');
})->middleware('webhook');

Route::post('webhook/shopify/uninstall', function(\Illuminate\Http\Request $request) {
    // Handle app uninstall
    Log::info('An store have uninstalled the app');
})->middleware('webhook');

Route::post('webhook/shopify/gdpr/customer-redact', function(\Illuminate\Http\Request $request) {
    // Remove customer data
})->middleware('auth.webhook');

Route::post('webhook/shopify/gdpr/shop-redact', function(\Illuminate\Http\Request $request) {
    // Remove shop data
})->middleware('webhook');

Route::get('event', function() {
    event(new TestBroadcast("How are  you!"));
});

Route::get('listen', function() {
    return view('listenBroadcast');
});


Route::get('polar', function() {
  Log::info('asd');
});