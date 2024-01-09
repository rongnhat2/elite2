<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use DB;

class CustomerRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }


    public function get_data(){
        return DB::table('customer_auth')
                ->select('customer_auth.*', 'customer_detail.username', 'customer_detail.telephone', 'customer_detail.address')
                ->leftjoin('customer_detail', 'customer_detail.customer_auth_id', '=', 'customer_auth.id')
                ->get(); 
    }

    public function update_trending($id){
        $sql = 'UPDATE customer_auth set view_type = !view_type WHERE id = '.$id;
        DB::select($sql);
    }

    public function getOne($id){
        return $this->model->where('id', '=', $id)->get();
    }
    // Kiểm tra Email tồn tại
    public function check_email($email){
        return $this->model->where('email', '=', $email)->first() ? true : false;
    }

    // Tìm customer với Email
    public function find_with_email($email){
        return $this->model->where('email', '=', $email)->first();
    }

    // Tìm customer với Id
    public function find_with_id($id){
        return $this->model->where('customer_auth.id', '=', $id)->leftjoin("customer_detail", "customer_auth.id", "=", "customer_detail.customer_auth_id")->first();
    }
    
    // Kiểm tra Email / Mật khẩu
    public function checkEmailPassword($request){
        $user = $this->model->where('email', '=', $request->data_email)->first();
        if ($user) {
            return Hash::check($request->data_password, $user->password) ? $user->id : false;
        }else{
            return false;
        }
    }

    // Tạo token client
    public function createTokenClient($id){
        return $id . '$' . Hash::make($id . '$' . $this->model->findOrFail($id)->secret_key);
    }

    // Lấy ra secret_key
    public function get_secret($id){ 
        return DB::table('customer_auth') 
                    ->select("secret_key")  
                    ->where([["id", "=", $id]])
                    ->first();
    } 

    // Lấy ra Name, Phone, Address 
    public function get_profile($id){ 
        return DB::table('customer_detail') 
                    ->select("id", 'username', 'avatar', 'telephone', 'address', 'identity')  
                    ->where([["customer_detail.customer_auth_id", "=", $id]])
                    ->first();
    }
 

    
}
