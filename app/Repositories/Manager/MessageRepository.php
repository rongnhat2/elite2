<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class MessageRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function get_all($id){
        return DB::table('combo')
                ->where("position_id", "=", $id)
                ->get(); 
    }

    public function get_one($id){
        return DB::table('combo')
                ->where("id", "=", $id)
                ->first(); 
    }

    public function update_trending($id){
        $sql = 'UPDATE hotel set status = !status WHERE id = '.$id;
        DB::select($sql);
    }

    public function get_item(){
        return DB::table('hotel')->get(); 
    }
 
}
