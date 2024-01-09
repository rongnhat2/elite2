<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DisplayController extends Controller
{
    public function index(){
        $page = "index";
        return view('customer.index', compact("page"));
    }
    public function tour(){
        $page = "tour";
        return view('customer.tour', compact("page"));
    }
    public function tour_detail($id, $slug){
        $page = "tour";
        return view('customer.tour-detail', compact("page", "id"));
    }
    public function hotel_book(){
        $page = "tour";
        return view('customer.hotel-book', compact("page"));
    }
    public function booking_success(){
        $page = "tour";
        return view('customer.booking-success', compact("page"));
    }
    public function category(){
        $page = "tour";
        return view('customer.category', compact("page"));
    }
    public function combo(){
        $page = "combo";
        return view('customer.combo', compact("page"));
    }
    public function combo_detail($id, $slug){
        $page = "combo";
        return view('customer.combo-detail', compact("page", "id"));
    }
    public function hotel(){
        $page = "hotel";
        return view('customer.hotel', compact("page"));
    }
    public function hotel_detail($id, $slug){
        $page = "hotel";
        return view('customer.hotel-detail', compact("page", "id"));
    }
    public function ship(){
        $page = "ship";
        return view('customer.ship', compact("page"));
    }
    public function ship_detail($id, $slug){
        $page = "ship";
        return view('customer.ship-detail', compact("page", "id"));
    }
    public function blog(){
        $page = "blog";
        return view('customer.blog', compact("page"));
    }
    public function blog_detail($id, $slug){
        $page = "blog";
        return view('customer.blog-detail', compact("page", "id"));
    }
}
