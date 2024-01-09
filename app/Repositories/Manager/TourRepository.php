<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class TourRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }
    public function get_all(){
        return DB::table('tour')
                ->select("tour.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "tour.location_id")
                ->get(); 
    }

    public function get_one($id){
        return DB::table('tour')
                ->select("tour.*", "location.name as location_name", "location.type as location_position")
                ->leftjoin("location", "location.id", "=", "tour.location_id")
                ->where("tour.id", "=", $id)
                ->first(); 
    }

    public function update_trending($id){
        $sql = 'UPDATE tour set trending = !trending WHERE id = '.$id;
        DB::select($sql);
    }

    public function get_trending(){
        return DB::table('tour')
            ->select("tour.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "tour.location_id")
            ->where("trending", "1")
            ->get(); 
    }

    public function get_new_inland($limit){
        return DB::table('tour')
            ->select("tour.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "tour.location_id")
            ->where("type", "1")
            ->orderByDesc('tour.updated_at')
            ->limit($limit)
            ->get(); 
    }
    public function get_new_global($limit){
        return DB::table('tour')
            ->select("tour.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "tour.location_id")
            ->where("type", "2")
            ->orderByDesc('tour.updated_at')
            ->limit($limit)
            ->get(); 
    }

    public function find_real_time($slug, $category){
        $where_category = $category == 0 ? "" : " AND location.type = ".$category;
        $sql = "SELECT tour.*, location.name as location_name, location.type as location_position
                FROM tour 
                LEFT JOIN location
                ON location.id = tour.location_id
                WHERE tour.slug like '%".$slug."%'".$where_category."
                LIMIT 5";
        return DB::select($sql);
    }
    public function category_get($tab, $page, $pageSize, $budget, $location_type, $sort){
        return DB::table('tour')
            ->select("tour.*", "location.name as location_name", "location.type as location_position")
            ->leftjoin("location", "location.id", "=", "tour.location_id")
            ->where("type", $location_type)
            ->orderByDesc('tour.updated_at')
            ->limit($pageSize)
            ->get(); 
    }
 
}
