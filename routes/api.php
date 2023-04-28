<?php

use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Events\sendMessage;
use Illuminate\Support\Facades\Mail;
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

//customer
Route::post('customer/list', 'admin_board\customer_customerController@list');
Route::post('customer/create', 'admin_board\customer_customerController@create');
Route::post('customer/update', 'admin_board\customer_customerController@update');
Route::post('customer/delete', 'admin_board\customer_customerController@delete');


//blog
Route::post('blog/list', 'admin_board\blog_blogController@list');
Route::post('blog/create', 'admin_board\blog_blogController@create');
Route::post('blog/update', 'admin_board\blog_blogController@update');
Route::post('blog/delete', 'admin_board\blog_blogController@delete');


Route::post('blog_rate/list', 'admin_board\blog_rateController@list');
Route::post('blog_rate/create', 'admin_board\blog_rateController@create');



