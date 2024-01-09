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

class BookingController extends Controller
{
    protected $booking; 
    protected $customer;
    protected $customer_detail;

    public function __construct(Booking $booking, CustomerAuth $customer, CustomerDetail $customer_detail ){
        $this->booking            = new BookingRepository($booking);  
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
    }
    public function get(Request $request){
        $is_user = static::check_token($request); 
        if ($is_user) { 
            list($user_id, $token) = static::unpack_token($request); 
            $data = $this->booking->get_all_by_user($user_id);
            return $this->booking->send_response(201, $data, null);
        }else{
            return $this->booking->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    } 
    public function create(Request $request){
        // return $request;
        if ($request->room_id == null || $request->time_start == null || $request->time_end == null || $request->data_date == null || $request->data_prices == null) {
            return $this->booking->send_response("Thiếu thông tin phòng!!", null, 500);
        }else{
            $is_user = static::check_token($request); 
            if ($is_user) { 
                list($user_id, $token) = static::unpack_token($request); 
                 $data_item = [ 
                    "customer_id"      => $user_id,  
                    "room_id"          => $request->room_id,  
                    "time_start"       => $request->time_start,  
                    "time_end"         => $request->time_end,  
                    "date"              => $request->data_date,    
                    "prices"            => $request->data_prices,    
                ]; 
                $item_create = $this->booking->create($data_item); 
                return $this->booking->send_response("Đặt phòng thành công", $item_create, 201);
            }else{
                return $this->booking->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
            } 
        } 
    } 

    public function delete(Request $request){
        // return $request;
        if ($request->booking_id == null) {
            return $this->booking->send_response("Thiếu thông booking!!", null, 500);
        }else{
            $is_user = static::check_token($request); 
            if ($is_user) { 
                list($user_id, $token) = static::unpack_token($request); 

                $item_create = $this->booking->update(["status" => 2], $request->booking_id); 
                return $this->booking->send_response("Hủy phòng thành công", $item_create, 201);
            }else{
                return $this->booking->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
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
