<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\HotelRepository;
use App\Models\Hotel; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class HotelController extends Controller
{
    protected $hotel;

    public function __construct(Hotel $hotel){
        $this->hotel            = new HotelRepository($hotel); 
    }
    public function index(){
        return view("admin.manager.hotel");
    }
    public function get(){
        $data = $this->hotel->get_all();
        return $this->hotel->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->hotel->get_one($id); 
        return $this->hotel->send_response(200, $data, null);
    }
    public function find_one(Request $request){
        if ($request->data_id == null) {
            return $this->customer->send_response("Thiếu id khách sạn!!", null, 500);
        }else{
            $data       = $this->hotel->get_one($request->data_id); 
            return $this->hotel->send_response(200, $data, null);
        }
    }
    public function store(Request $request){  

        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->hotel->to_slug($request->data_name),  
            "utilities"     => $request->data_utilities,  
            "map"           => $request->data_map,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_policy,  
        ];
        $image_list_prev     = $request->data_images_preview; 
        $image_list     = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->hotel->imageInventor('image-hotel', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }
        
        $item_create = $this->hotel->create($data_item); 

        return $this->hotel->send_response(201, null, null);
    }
    public function update(Request $request){
        
        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->hotel->to_slug($request->data_name),  
            "utilities"     => $request->data_utilities,  
            "map"           => $request->data_map,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_policy,  
        ];
        $image_list_prev    = $request->data_images_preview; 
        $image_list         = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->hotel->imageInventor('image-hotel', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $this->hotel->update($data_item, $request->data_id);

        return $this->hotel->send_response(200, null, null);
    }

    public function delete($id){
        $this->hotel->delete($id); 
        return $this->hotel->send_response(200, "Delete successful", null);
    }
    public function update_trending(Request $request){
        $this->hotel->update_trending($request->id);
        return $this->hotel->send_response(200, null, null);
    }


    public function get_trending(){
        $data = $this->hotel->get_trending();
        return $this->hotel->send_response(201, $data, null);
    }
    public function get_new(){
        $inland = $this->hotel->get_new_inland(8);
        $global = $this->hotel->get_new_global(8);
        $data = [
            "inland" => $inland,
            "global" => $global,
        ];
        return $this->hotel->send_response(201, $data, null);
    }
}
