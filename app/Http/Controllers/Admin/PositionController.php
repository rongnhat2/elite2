<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\PositionRepository;
use App\Models\Position; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class PositionController extends Controller
{
    protected $position;

    public function __construct(Position $position){
        $this->position            = new PositionRepository($position); 
    }
    public function index(){
        return view("admin.manager.combo");
    }
    public function get(){
        $data = $this->position->get_all();
        return $this->position->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->position->get_one($id); 
        return $this->position->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->position->to_slug($request->data_name),  
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
                array_push($image_list, $this->position->imageInventor('image-hotel', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }
        $item_create = $this->position->create($data_item); 

        return $this->position->send_response(201, null, null);
    }
    public function update(Request $request){

        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->position->to_slug($request->data_name),  
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
                array_push($image_list, $this->position->imageInventor('image-hotel', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $this->position->update($data_item, $request->data_id);

        return $this->position->send_response(200, null, null);
    }

    public function delete($id){
        $this->position->delete($id); 
        return $this->position->send_response(200, "Delete successful", null);
    }
    public function get_new(){
        $inland = $this->position->get_new_inland(8);
        $global = $this->position->get_new_global(8);
        $data = [
            "inland" => $inland,
            "global" => $global,
        ];
        return $this->position->send_response(201, $data, null);
    }
}
