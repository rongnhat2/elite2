<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class HotelRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function get_all(){
        return DB::table('hotel')
                ->select("hotel.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "hotel.location_id")
                ->get(); 
    }

    public function get_one($id){
        return DB::table('hotel')
                ->select("hotel.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "hotel.location_id")
                ->where("hotel.id", "=", $id)
                ->first(); 
    }

    public function update_trending($id){
        $sql = 'UPDATE hotel set trending = !status WHERE id = '.$id;
        DB::select($sql);
    }

    public function get_item(){
        return DB::table('hotel')->get(); 
    }

    public function get_trending(){
        return DB::table('tour')
            ->select("tour.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "tour.location_id")
            ->where("trending", "1")
            ->get(); 
    }

    public function get_new_inland($limit){
        return DB::table('hotel')
            ->select("hotel.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "hotel.location_id")
            ->where("type", "1")
            ->orderByDesc('hotel.updated_at')
            ->get($limit); 
    }
    public function get_new_global($limit){
        return DB::table('hotel')
            ->select("hotel.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "hotel.location_id")
            ->where("type", "2")
            ->orderByDesc('hotel.updated_at')
            ->get($limit); 
    }
 
}
