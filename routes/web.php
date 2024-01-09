<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', 'Customer\DisplayController@index')->name('customer.index');
Route::get('category', 'Customer\DisplayController@category')->name('customer.category');
Route::get('tour', 'Customer\DisplayController@tour')->name('customer.tour');
Route::get('tour-detail/{id}-{slug}', 'Customer\DisplayController@tour_detail')->name('customer.tour_detail');
Route::get('hotel', 'Customer\DisplayController@hotel')->name('customer.hotel');
Route::get('hotel-detail/{id}-{slug}', 'Customer\DisplayController@hotel_detail')->name('customer.hotel_detail');
Route::get('hotel-book', 'Customer\DisplayController@hotel_book')->name('customer.hotel.book');
Route::get('booking-success', 'Customer\DisplayController@booking_success')->name('customer.hotel.book');
Route::get('combo', 'Customer\DisplayController@combo')->name('customer.combo');
Route::get('combo-detail/{id}-{slug}', 'Customer\DisplayController@combo_detail')->name('customer.combo_detail');
Route::get('ship', 'Customer\DisplayController@ship')->name('customer.ship');
Route::get('yacht-detail/{id}-{slug}', 'Customer\DisplayController@ship_detail')->name('customer.ship_detail');

Route::get('blog', 'Customer\DisplayController@blog')->name('customer.blog');
Route::get('blog-detail/{id}-{slug}', 'Customer\DisplayController@blog_detail')->name('customer.blog_detail');

Route::prefix('customer')->group(function () {
    Route::prefix('apip')->group(function () { 

        Route::prefix('location')->group(function () {
            Route::get('/get', 'Admin\locationController@get')->name('admin.location.get'); 
        });

        Route::prefix('tour')->group(function () {
            Route::get('/get', 'Admin\TourController@get')->name('admin.tour.get'); 
            Route::post('get-search', 'Admin\TourController@get_search')->name('customer.tour.get.search');
            Route::get('/get-trending', 'Admin\TourController@get_trending')->name('admin.tour.get'); 
            Route::get('/get-new', 'Admin\TourController@get_new')->name('admin.tour.get'); 
            Route::get('/get-one/{id}', 'Admin\TourController@get_one')->name('admin.tour.get_one');
        });

        Route::prefix('hotel')->group(function () {
            Route::get('/get-new', 'Admin\HotelController@get_new')->name('admin.hotel.get'); 
            Route::get('/get-one/{id}', 'Admin\RoomController@get')->name('admin.hotel.get_one');
        });

        Route::prefix('combo')->group(function () {
            Route::get('/get-new', 'Admin\PositionController@get_new')->name('admin.combo.get'); 
            Route::get('/get-one/{id}', 'Admin\ComboController@get')->name('admin.combo.get_one');
        });

        Route::prefix('yacht')->group(function () {
            Route::get('/get-new', 'Admin\YachtController@get_new')->name('admin.yacht.get'); 
            Route::get('/get-one/{id}', 'Admin\YachtRoomController@get')->name('admin.yacht.get_one');
        });

        Route::prefix('room')->group(function () {
            Route::get('/get-one/{id}', 'Admin\RoomController@get_one')->name('admin.room.get_one');
        });

        Route::prefix('category')->group(function () {
            Route::get('/get', 'Admin\TourController@category_get')->name('admin.category.get_one');
        });

        Route::prefix('blog')->group(function () {
            Route::get('/get', 'Admin\NewsController@get_limit')->name('admin.blog.get');
        });

        Route::prefix('message')->group(function () {
            Route::post('/sending', 'Admin\MessageController@sending')->name('admin.location.store');
        });

    });
});

Route::middleware(['AuthAdmin:auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Admin\DisplayController@login')->name('admin.login');
        Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
    });
});

Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');
        
        Route::get('/', 'Admin\DisplayController@index')->name('admin.index');

        Route::prefix('booking')->group(function () {
            Route::get('/', 'Admin\BookingController@index')->name('admin.booking.index');
        });
        Route::prefix('location')->group(function () {
            Route::get('/', 'Admin\LocationController@index')->name('admin.location.index');
        });
        Route::prefix('tour')->group(function () {
            Route::get('/', 'Admin\TourController@index')->name('admin.tour.index');
        });
        Route::prefix('hotel')->group(function () {
            Route::get('/', 'Admin\HotelController@index')->name('admin.hotel.index');
        });
        Route::prefix('combo')->group(function () {
            Route::get('/', 'Admin\PositionController@index')->name('admin.combo.index');
        });
        Route::prefix('carousel')->group(function () {
            Route::get('/', 'Admin\CarouselController@index')->name('admin.carousel.index');
        });
        Route::prefix('yacht')->group(function () {
            Route::get('/', 'Admin\YachtController@index')->name('admin.yacht.index');
        });
        Route::prefix('news')->group(function () {
            Route::get('/', 'Admin\NewsController@index')->name('admin.news.index');
        });
    });

    Route::prefix('apip')->group(function () {
        Route::post('post-image', 'Admin\DisplayController@image')->name('admin.image.post'); 

        Route::prefix('location')->group(function () {
            Route::get('/get', 'Admin\locationController@get')->name('admin.location.get');
            Route::post('/store', 'Admin\locationController@store')->name('admin.location.store');
            Route::get('/get-one/{id}', 'Admin\locationController@get_one')->name('admin.location.get_one');
            Route::post('/update', 'Admin\locationController@update')->name('admin.location.update');
            Route::get('/delete/{id}', 'Admin\locationController@delete')->name('admin.location.delete');
        });

        Route::prefix('tour')->group(function () {
            Route::get('/get', 'Admin\TourController@get')->name('admin.tour.get');
            Route::post('/store', 'Admin\TourController@store')->name('admin.tour.store');
            Route::get('/get-one/{id}', 'Admin\TourController@get_one')->name('admin.tour.get_one');
            Route::post('/update', 'Admin\TourController@update')->name('admin.tour.update');
            Route::get('/delete/{id}', 'Admin\TourController@delete')->name('admin.tour.delete');
            Route::put('/update-trending', 'Admin\TourController@update_trending')->name('admin.tour.trending.update');
        });

        Route::prefix('hotel')->group(function () {
            Route::get('/get', 'Admin\HotelController@get')->name('admin.hotel.get');
            Route::post('/store', 'Admin\HotelController@store')->name('admin.hotel.store');
            Route::get('/get-one/{id}', 'Admin\HotelController@get_one')->name('admin.hotel.get_one');
            Route::post('/update', 'Admin\HotelController@update')->name('admin.hotel.update');
            Route::get('/delete/{id}', 'Admin\HotelController@delete')->name('admin.hotel.delete');
            Route::put('/update-trending', 'Admin\HotelController@update_trending')->name('admin.hotel.trending.update');
        });

        Route::prefix('room')->group(function () {
            Route::get('/get', 'Admin\RoomController@get')->name('admin.room.get');
            Route::post('/store', 'Admin\RoomController@store')->name('admin.room.store');
            Route::get('/get-one/{id}', 'Admin\RoomController@get_one')->name('admin.room.get_one');
            Route::post('/update', 'Admin\RoomController@update')->name('admin.room.update');
            Route::get('/delete/{id}', 'Admin\RoomController@delete')->name('admin.room.delete');
        });

        Route::prefix('position')->group(function () {
            Route::get('/get', 'Admin\PositionController@get')->name('admin.position.get');
            Route::post('/store', 'Admin\PositionController@store')->name('admin.position.store');
            Route::get('/get-one/{id}', 'Admin\PositionController@get_one')->name('admin.position.get_one');
            Route::post('/update', 'Admin\PositionController@update')->name('admin.position.update');
            Route::get('/delete/{id}', 'Admin\PositionController@delete')->name('admin.position.delete');
        });

        Route::prefix('combo')->group(function () {
            Route::get('/get', 'Admin\ComboController@get')->name('admin.combo.get');
            Route::post('/store', 'Admin\ComboController@store')->name('admin.combo.store');
            Route::get('/get-one/{id}', 'Admin\ComboController@get_one')->name('admin.combo.get_one');
            Route::post('/update', 'Admin\ComboController@update')->name('admin.combo.update');
            Route::get('/delete/{id}', 'Admin\ComboController@delete')->name('admin.combo.delete');
        });

        Route::prefix('yacht')->group(function () {
            Route::get('/get', 'Admin\YachtController@get')->name('admin.yacht.get');
            Route::post('/store', 'Admin\YachtController@store')->name('admin.yacht.store');
            Route::get('/get-one/{id}', 'Admin\YachtController@get_one')->name('admin.yacht.get_one');
            Route::post('/update', 'Admin\YachtController@update')->name('admin.yacht.update');
            Route::get('/delete/{id}', 'Admin\YachtController@delete')->name('admin.yacht.delete');
        });

        Route::prefix('yacht-room')->group(function () {
            Route::get('/get', 'Admin\YachtRoomController@get')->name('admin.yachtRoom.get');
            Route::post('/store', 'Admin\YachtRoomController@store')->name('admin.yachtRoom.store');
            Route::get('/get-one/{id}', 'Admin\YachtRoomController@get_one')->name('admin.yachtRoom.get_one');
            Route::post('/update', 'Admin\YachtRoomController@update')->name('admin.yachtRoom.update');
            Route::get('/delete/{id}', 'Admin\YachtRoomController@delete')->name('admin.yachtRoom.delete');
        });

        Route::prefix('news')->group(function () {
            Route::get('/get', 'Admin\NewsController@get')->name('admin.news.get');
            Route::post('/store', 'Admin\NewsController@store')->name('admin.news.store');
            Route::get('/get-one/{id}', 'Admin\NewsController@get_one')->name('admin.news.get_one');
            Route::post('/update', 'Admin\NewsController@update')->name('admin.news.update');
            Route::get('/delete/{id}', 'Admin\NewsController@delete')->name('admin.news.delete');
        });

        Route::prefix('booking')->group(function () {
            Route::get('/get', 'Admin\BookingController@get')->name('admin.booking.get');
            Route::post('/store', 'Admin\BookingController@store')->name('admin.booking.store');
            Route::get('/get-one/{id}', 'Admin\BookingController@get_one')->name('admin.booking.get_one');
            Route::post('/update', 'Admin\BookingController@update')->name('admin.booking.update');
            Route::get('/delete/{id}', 'Admin\BookingController@delete')->name('admin.booking.delete');
        });

    });
});