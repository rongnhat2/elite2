<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Redirect,Response,Config;
use Mail;
use App\Mail\MailNotify;

use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;
use App\Models\CustomerDetail;
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class CustomerController extends Controller
{
    protected $customer;
    protected $customer_detail;

    public function __construct(CustomerAuth $customer, CustomerDetail $customer_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->customer_detail  = new CustomerRepository($customer_detail);
    }

    
    public function get_all(Request $request){
        $data = $this->customer->get_data();
        return $this->customer->send_response(201, $data, null);
    }
    public function create(Request $request){
        if ($request->data_password == null || $request->data_name == null || $request->data_phone == null || $request->data_address == null || $request->data_email == null) {
            return $this->customer->send_response("Thiếu thông tin đăng kí!!", null, 500);
        }else{
            if ($this->customer->check_email($request->data_email)) {
                return $this->customer->send_response("Email đã tồn tại!!", null, 500);
            }else{
                $secret_key = mt_rand(1, 9999999);
                $data_auth = [
                    "secret_key"    => $secret_key,
                    "email"         => $request->data_email,
                    "password"      => Hash::make($request->data_password),
                    "login_type"      => 0,
                    "view_type"      => 0,
                ];
                $auth_register = $this->customer->create($data_auth);
                $data_detail = [
                    "customer_auth_id"   => $auth_register->id,
                    "username"          => $request->data_name,
                    "telephone"         => $request->data_phone,
                    "address"         => $request->data_address,
                ];
                $this->customer_detail->create($data_detail);
                $tokenAuth = $auth_register->id . '$' . Hash::make($auth_register->id . '$' . $secret_key);
                Cookie::queue('_token_', $tokenAuth, 2628000);
                return $this->customer->send_response("Đăng kí thành công!!", "/", 201);
            }
        }
    }
    public function delete(Request $request){
        if ($request->data_id == null) {
            return $this->customer->send_response("Thiếu id user!!", null, 500);
        }else{
            $this->customer->delete($request->data_id); 
            return $this->customer->send_response(200, "Delete successful", null);
        }
    } 
}
