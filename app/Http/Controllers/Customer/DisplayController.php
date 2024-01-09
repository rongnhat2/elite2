<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BookingRepository;
use App\Models\Booking;  

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;
use App\Models\CustomerDetail;

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class DisplayController extends Controller
{
    protected $booking; 
    protected $customer;
    protected $customer_detail;

    public function __construct(Booking $booking, CustomerAuth $customer, CustomerDetail $customer_detail ){
        $this->booking            = new BookingRepository($booking);  
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
    }
    public function index(Request $request){
        $page = "index";
        $customer_data = static::generate_logined($request); 
        return view('customer.index', compact("page", "customer_data"));
    }
    public function login(Request $request){
        $page = "login";
        $customer_data = static::generate_logined($request); 
        return view('customer.login', compact("page", "customer_data"));
    }
    public function tour(Request $request){
        $page = "tour";
        $customer_data = static::generate_logined($request); 
        $customer_data = static::generate_logined($request); 
        return view('customer.tour', compact("page", "customer_data"));
    }
    public function tour_detail(Request $request, $id, $slug){
        $page = "tour";
        $customer_data = static::generate_logined($request); 
        return view('customer.tour-detail', compact("page", "id", "customer_data"));
    }
    public function hotel_book(Request $request){
        $page = "tour";
        $customer_data = static::generate_logined($request); 
        return view('customer.hotel-book', compact("page", "customer_data"));
    }
    public function booking_success(Request $request){
        $page = "tour";
        $customer_data = static::generate_logined($request); 
        return view('customer.booking-success', compact("page", "customer_data"));
    }
    public function category(Request $request){
        $page = "tour";
        $customer_data = static::generate_logined($request); 
        return view('customer.category', compact("page", "customer_data"));
    }
    public function combo(Request $request){
        $page = "combo";
        $customer_data = static::generate_logined($request); 
        return view('customer.combo', compact("page", "customer_data"));
    }
    public function combo_detail(Request $request, $id, $slug){
        $page = "combo";
        $customer_data = static::generate_logined($request); 
        return view('customer.combo-detail', compact("page", "id", "customer_data"));
    }
    public function hotel(Request $request){
        $page = "hotel";
        $customer_data = static::generate_logined($request); 
        return view('customer.hotel', compact("page", "customer_data"));
    }
    public function hotel_detail(Request $request, $id, $slug){
        $page = "hotel";
        $customer_data = static::generate_logined($request); 
        return view('customer.hotel-detail', compact("page", "id", "customer_data"));
    }
    public function ship(Request $request){
        $page = "ship";
        $customer_data = static::generate_logined($request); 
        return view('customer.ship', compact("page", "customer_data"));
    }
    public function ship_detail(Request $request, $id, $slug){
        $page = "ship";
        $customer_data = static::generate_logined($request); 
        return view('customer.ship-detail', compact("page", "id", "customer_data"));
    }
    public function blog(Request $request){
        $page = "blog";
        $customer_data = static::generate_logined($request); 
        return view('customer.blog', compact("page", "customer_data"));
    }
    public function blog_detail(Request $request, $id, $slug){
        $page = "blog";
        $customer_data = static::generate_logined($request); 
        return view('customer.blog-detail', compact("page", "id", "customer_data"));
    }

    // Generate user detail
    public function generate_logined($request){
        $user_login = [
            'id'        => null,
            'email'     => null,
            'name'      => null,
            'phone'     => null,
            'avatar'    => null,
            'address'   => null,
            'is_login'  => false
        ];
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $request->cookie('_token_'), 2);
            $sql_getAuth    = 'SELECT   customer_auth.id,
                                        customer_auth.view_type,
                                        customer_auth.email,
                                        customer_detail.username,
                                        customer_detail.telephone,
                                        customer_detail.avatar,
                                        customer_detail.identity,
                                        customer_detail.address
                                FROM customer_auth 
                                LEFT JOIN customer_detail
                                ON customer_auth.id = customer_detail.customer_auth_id
                                WHERE customer_auth.id = "'.$user_id.'"';
            $hasAuth    = DB::select($sql_getAuth);
            if (count($hasAuth) != 0) {
                $user_login['id']           = $hasAuth[0]->id;
                $user_login['view_type']    = $hasAuth[0]->view_type;
                $user_login['email']        = $hasAuth[0]->email;
                $user_login['name']         = $hasAuth[0]->username;
                $user_login['avatar']       = $hasAuth[0]->avatar;
                $user_login['phone']        = $hasAuth[0]->telephone;
                $user_login['identity']     = $hasAuth[0]->identity;
                $user_login['address']      = $hasAuth[0]->address;
                $user_login['is_login']     = true;
            }
        }
        return $user_login;
    }
}
