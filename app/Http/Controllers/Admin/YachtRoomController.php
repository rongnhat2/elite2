<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\YachtRoomRepository;
use App\Models\YachtRoom; 
use App\Repositories\Manager\YachtRepository;
use App\Models\Yacht; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class YachtRoomController extends Controller
{
    protected $yachtRoom;
    protected $yacht;

    public function __construct(YachtRoom $yachtRoom, Yacht $yacht){
        $this->yachtRoom       = new YachtRoomRepository($yachtRoom); 
        $this->yacht           = new YachtRepository($yacht); 
    }
    public function get(Request $request){
        $id = $request->id;
        $data = [
            "room"  => $this->yachtRoom->get_all($id),
            "yacht" => $this->yacht->get_one($id),
        ];
        return $this->yachtRoom->send_response(201, $data, null);
    }

    public function get_one($id){
        $data       = $this->yachtRoom->get_one($id); 
        return $this->yachtRoom->send_response(200, $data, null);
    }
 
    public function store(Request $request){
        $data_image = $this->yachtRoom->imageInventor('image-room', $request->data_image, 600);
        $data_item = [ 
            "yacht_id"      => $request->data_id,  
            "name"          => $request->data_name,  
            "slug"          => $this->yachtRoom->to_slug($request->data_name),  
            "image"         => $data_image,  
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ]; 
        $item_create = $this->yachtRoom->create($data_item); 
        return $this->yachtRoom->send_response(201, null, null);
    }
    public function update(Request $request){
        $data_item = [ 
            "name"          => $request->data_name,  
            "slug"          => $this->yachtRoom->to_slug($request->data_name), 
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        if ($request->data_image != "null") {
            $data_item["image"] = $this->yachtRoom->imageInventor('image-room', $request->data_image, 600);
        }

        $this->yachtRoom->update($data_item, $request->data_id);
        return $this->yachtRoom->send_response(200, null, null);
    }

    public function delete($id){
        $this->yachtRoom->delete($id); 
        return $this->yachtRoom->send_response(200, "Delete successful", null);
    }
}
