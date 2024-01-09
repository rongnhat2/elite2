<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\RoomRepository;
use App\Models\Room; 
use App\Repositories\Manager\HotelRepository;
use App\Models\Hotel; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class RoomController extends Controller
{
    protected $room;
    protected $hotel;

    public function __construct(Room $room, Hotel $hotel){
        $this->room            = new RoomRepository($room); 
        $this->hotel           = new HotelRepository($hotel); 
    }
    public function get(Request $request){
        $id = $request->id;
        $data = [
            "room"  => $this->room->get_all($id),
            "hotel" => $this->hotel->get_one($id),
        ];
        return $this->room->send_response(201, $data, null);
    }

    public function get_one($id){
        $data       = $this->room->get_one($id); 
        return $this->room->send_response(200, $data, null);
    }
    public function get_status(Request $request){
        if ($request->data_id == null) {
            return $this->room->send_response("Thiếu id phòng!!", null, 500);
        }else{
            $data       = $this->room->get_one($request->data_id)->status; 
            return $this->room->send_response(200, $data, null);
        }
    }
 
    public function store(Request $request){
        $data_image = $this->room->imageInventor('image-room', $request->data_image, 600);
        $data_item = [ 
            "hotel_id"      => $request->data_id,  
            "name"          => $request->data_name,  
            "slug"          => $this->room->to_slug($request->data_name),  
            "image"         => $data_image,  
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        $item_create = $this->room->create($data_item); 
        return $this->room->send_response(201, null, null);
    }
    public function update(Request $request){
        $data_item = [ 
            "name"          => $request->data_name,  
            "slug"          => $this->room->to_slug($request->data_name), 
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        if ($request->data_image != "null") {
            $data_item["image"] = $this->room->imageInventor('image-room', $request->data_image, 600);
        }

        $this->room->update($data_item, $request->data_id);
        return $this->room->send_response(200, null, null);
    }

    public function delete($id){
        $this->room->delete($id); 
        return $this->room->send_response(200, "Delete successful", null);
    }

    public function api_store(Request $request){
        $data_image = $this->room->imageInventor('image-room', $request->data_image, 600);
        $data_item = [ 
            "hotel_id"      => $request->data_id,  
            "name"          => $request->data_name,  
            "slug"          => $this->room->to_slug($request->data_name),  
            "image"         => $data_image,  
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        $item_create = $this->room->create($data_item); 
        return $this->room->send_response(201, null, null);
    }
    public function api_update(Request $request){
        $data_item = [ 
            "name"          => $request->data_name,  
            "slug"          => $this->room->to_slug($request->data_name), 
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        if ($request->data_image != "null") {
            $data_item["image"] = $this->room->imageInventor('image-room', $request->data_image, 600);
        }
        $this->room->update($data_item, $request->data_id);
        return $this->room->send_response(200, null, null);
    }
    public function api_delete(Request $request){
        if ($request->data_id == null) {
            return $this->room->send_response("Thiếu id user!!", null, 500);
        }else{
            $this->room->delete($request->data_id); 
            return $this->room->send_response(200, "Delete successful", null);
        }
    }
    
}
