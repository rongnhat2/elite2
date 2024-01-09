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

Route::post('/sign_up', 'Customer\AuthController@register')->name('customer.auth.register'); 
Route::post('/login', 'Customer\AuthController@login')->name('customer.auth.login'); 
Route::post('/logout', 'Customer\AuthController@logout')->name('customer.auth.logout'); 
Route::post('/resend-verify-code', 'Customer\AuthController@code')->name('customer.auth.code'); 
Route::post('/reset_password', 'Customer\AuthController@change')->name('customer.auth.change'); 

Route::put('/edit_user_info', 'Customer\AuthController@update')->name('customer.auth.update'); 

Route::get('/get_list_booking-room', 'Customer\BookingController@get')->name('customer.booking.get'); 
Route::post('/booking-room', 'Customer\BookingController@create')->name('customer.booking.create'); 
Route::post('/cancel_booking', 'Customer\BookingController@delete')->name('customer.booking.delete'); 

Route::get('/get_list_review_room', 'Customer\ReviewController@get_one')->name('customer.booking.get_one'); 
Route::post('/set_review_room', 'Customer\ReviewController@store')->name('customer.review.store'); 

Route::post('/search', 'Admin\TourController@get_search')->name('customer.tour.search'); 
Route::post('/set_message', 'Customer\BookingController@set_message')->name('customer.booking.set_message'); 


    Route::post('/login_admin', 'Admin\AuthController@api_login')->name('admin.auth.login'); 


Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::get('/get_list_host', 'Admin\AuthController@get')->name('admin.auth.get'); 
    Route::post('/sign_host', 'Admin\AuthController@register')->name('admin.auth.register'); 
    Route::put('/change_status_host', 'Admin\RoomController@change_status_host')->name('admin.room.set'); 


    Route::get('/get_status_room', 'Admin\RoomController@get_status')->name('admin.room.get'); 
    Route::put('/set_status_room', 'Admin\RoomController@set_status')->name('admin.room.set'); 

    Route::delete('/delete_room', 'Admin\RoomController@delete')->name('admin.room.delete'); 

    Route::post('/upload_image_room', 'Admin\RoomController@upload_image')->name('admin.image.post'); 

    Route::get('/get_list_user', 'Admin\CustomerController@get_all')->name('admin.user.get'); 
    Route::post('/set_list_user', 'Admin\CustomerController@set_all')->name('admin.user.set'); 
    Route::post('/add_user', 'Admin\CustomerController@create')->name('admin.user.create'); 
    Route::delete('/delete_user', 'Admin\CustomerController@delete')->name('admin.user.create'); 

    Route::put('/edit_room', 'Customer\RoomController@api_update')->name('admin.room.api_update'); 


    Route::get('/get_list_location', 'Admin\HotelController@get')->name('admin.room.get'); 
    Route::get('/get_detail_location', 'Admin\HotelController@find_one')->name('admin.room.get'); 

    Route::get('/get_list_booking', 'Admin\BookingController@get')->name('admin.booking.get'); 
    Route::post('/set_payment', 'Admin\BookingController@payment')->name('admin.booking.payment'); 
    Route::post('/set_payment', 'Admin\BookingController@payment')->name('admin.booking.payment'); 


});