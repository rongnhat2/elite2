<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ReviewRepository;

use App\Repositories\Manager\BookingRepository;
use App\Models\Booking;  

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;
use App\Models\CustomerDetail;
use App\Models\Review;  

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ReviewController extends Controller
{
    protected $review; 
 
    protected $booking; 
    protected $customer;
    protected $customer_detail;

    public function __construct(Review $review, Booking $booking, CustomerAuth $customer, CustomerDetail $customer_detail ){
        $this->booking            = new BookingRepository($booking);  
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
        $this->review            = new ReviewRepository($review);  
    }


    public function get_one(Request $request){ 
        if ($request->room_id == null) {
            return $this->review->send_response("Thiếu thông review!!", null, 500);
        }else{
            $data       = $this->review->get_one_room($request->room_id);  
            return $this->review->send_response(200, $data, null);
        } 
    }
 
    public function store(Request $request){  
        // return $request;
        if ($request->room_id == null || $request->data_rate == null || $request->data_comment == null ) {
            return $this->review->send_response("Thiếu thông review!!", null, 500);
        }else{
            $is_user = static::check_token($request); 
            if ($is_user) { 
                list($user_id, $token) = static::unpack_token($request); 
                $data_item = [ 
                    "customer_id"      => $user_id,  
                    "room_id"         => $request->room_id,  
                    "rate"         => $request->data_rate,  
                    "comment"         => $request->data_comment,   
                ]; 
                $item_create = $this->review->create($data_item); 
                return $this->review->send_response("Review thành công", $item_create, 201);
            }else{
                return $this->review->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
            } 
        } 
    }

    // Kiểm tra token hợp lệ
    public function check_token(Request $request){
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $token, 2); 
            $user = $this->customer->get_secret($user_id);
            if ($user) {
                return Hash::check($user_id . '$' . $user->secret_key, $token);
            }else{
                return false;
            }
        }else{
            $res = [
                'status'    => 403,
                'data'      => null,
                'message'   => "Token không hợp lệ",
            ];
            return response()->json($res);
            return abort('403');
        }
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }

}
