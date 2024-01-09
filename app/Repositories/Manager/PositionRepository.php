<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class PositionRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function get_all(){
        return DB::table('position')
                ->select("position.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "position.location_id")
                ->get(); 
    }

    public function get_one($id){
        return DB::table('position')
                ->select("position.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "position.location_id")
                ->where("position.id", "=", $id)
                ->first(); 
    }

    public function update_trending($id){
        $sql = 'UPDATE hotel set status = !status WHERE id = '.$id;
        DB::select($sql);
    }

    public function get_item(){
        return DB::table('hotel')->get(); 
    }
 
    public function get_new_inland($limit){
        return DB::table('position')
            ->select("position.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "position.location_id")
            ->where("type", "1")
            ->orderByDesc('position.updated_at')
            ->get($limit); 
    }
    public function get_new_global($limit){
        return DB::table('position')
            ->select("position.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "position.location_id")
            ->where("type", "2")
            ->orderByDesc('position.updated_at')
            ->get($limit); 
    }
 
}
