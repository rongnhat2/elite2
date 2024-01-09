<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\AdminRepository;
use App\Models\Admin;
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class AuthController extends Controller
{
    protected $admin;

    public function __construct(Admin $admin){
        $this->admin        = new AdminRepository($admin);
    }

    public function login(Request $request){
        $admin_id     = $this->admin->checkEmailPassword($request);
        if ($admin_id) {
            $name_cookie = Cookie::queue('_token__', $this->admin->createTokenClient($admin_id), 2628000);
            return redirect()->back()->with('success', 'Đăng nhập thành công');  
        }else{
            return redirect()->back()->with('error', 'Tên tài khoản hoặc mật khẩu không chính xác'); 
        }
    }
    public function api_login(Request $request){
        $admin_id     = $this->admin->checkEmailPassword($request);
        if ($admin_id) {
            $client_token = $this->admin->createTokenClient($admin_id);
            $name_cookie = Cookie::queue('_token__', $client_token, 2628000);
            return $this->admin->send_response("Đăng nhật thành công", $client_token, 200); 
        }else{
            return $this->admin->send_response("Tên tài khoản hoặc mật khẩu không chính xác", "", 500); 
        }
    }
    public function change_status_host(Request $request){
        if ($request->data_id == null) {
            return $this->admin->send_response("Thiếu id Host!!", null, 500);
        }else{
            if ($request->data_status == null) {
                return $this->admin->send_response("Thiếu trạng Host!!", null, 500);
            }else{
                $data_item = [ 
                    "status"      => $request->data_status,  
                ];
                $this->admin->update($data_item, $request->data_id);
                return $this->admin->send_response(200, null, null);
            }
        }
    }
    public function get(){
        $data = $this->admin->get_all();
        return $this->admin->send_response(201, $data, null);
    }
    // Đăng ký
    public function register(Request $request){  
        if ($request->data_password == null || $request->data_email == null) {
            return $this->admin->send_response("Thiếu thông tin đăng kí!!", null, 500);
        }else{
            if ($this->admin->check_email($request->data_email)) {
                return $this->admin->send_response("Email đã tồn tại!!", null, 500);
            }else{
                $secret_key = mt_rand(1, 9999999);
                $data_auth = [
                    "secret_key"    => $secret_key,
                    "email"         => $request->data_email,
                    "password"      => Hash::make($request->data_password), 
                ];
                $auth_register = $this->admin->create($data_auth); 
                return $this->admin->send_response("Đăng kí thành công!!", "/", 201);
            }
        }
    }

    public function logout(){
        Cookie::queue(Cookie::forget('_token__'));
        return redirect()->route('admin.login')->with('success', 'Đăng xuất thành công');  
    }
}
