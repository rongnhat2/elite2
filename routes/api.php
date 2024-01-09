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

Route::post('/sign_up', 'Customer\AuthController@register')->name('admin.auth.register'); 
Route::post('/login', 'Customer\AuthController@login')->name('admin.auth.login'); 
Route::post('/logout', 'Customer\AuthController@logout')->name('admin.auth.logout'); 
Route::post('/resend-verify-code', 'Customer\AuthController@code')->name('admin.auth.code'); 
Route::post('/reset_password', 'Customer\AuthController@change')->name('admin.auth.change'); 

Route::put('/edit_user_info', 'Customer\AuthController@update')->name('admin.auth.update'); 

Route::get('/get_list_location', 'Admin\HotelController@get')->name('admin.room.get'); 
Route::get('/get_detail_location', 'Admin\HotelController@find_one')->name('admin.room.get'); 


Route::post('/login_admin', 'Admin\AuthController@api_login')->name('admin.auth.login'); 

Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::get('/get_status_room', 'Admin\RoomController@get_status')->name('admin.room.get'); 

    Route::get('/get_list_user', 'Admin\CustomerController@get_all')->name('admin.user.get'); 
    Route::post('/add_user', 'Admin\CustomerController@create')->name('admin.user.create'); 
    Route::delete('/delete_user', 'Admin\CustomerController@delete')->name('admin.user.create'); 
});