<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\YachtRepository;
use App\Models\Yacht; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class YachtController extends Controller
{
    protected $yacht;

    public function __construct(Yacht $yacht){
        $this->yacht            = new YachtRepository($yacht); 
    }
    public function index(){
        return view("admin.manager.yacht");
    }
    public function get(){
        $data = $this->yacht->get_all();
        return $this->yacht->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->yacht->get_one($id); 
        return $this->yacht->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->yacht->to_slug($request->data_name),
            "map"           => $request->data_map,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "utilities"     => $request->data_utilities,  
            "vehicle"       => $request->data_policy,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_regulation,  
        ];
        $image_list_prev     = $request->data_images_preview; 
        $image_list     = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->yacht->imageInventor('image-tour', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $item_create = $this->yacht->create($data_item); 

        return $this->yacht->send_response(201, null, null);
    }
    public function update(Request $request){
        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->yacht->to_slug($request->data_name),
            "map"           => $request->data_map,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "utilities"     => $request->data_utilities,  
            "vehicle"       => $request->data_policy,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_regulation,  
        ];
        $image_list_prev    = $request->data_images_preview; 
        $image_list         = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->yacht->imageInventor('image-tour', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $this->yacht->update($data_item, $request->data_id);

        return $this->yacht->send_response(200, null, null);
    }

    public function delete($id){
        $this->yacht->delete($id); 
        return $this->yacht->send_response(200, "Delete successful", null);
    }
    public function get_new(){
        $inland = $this->yacht->get_new_inland(8);
        $global = $this->yacht->get_new_global(8);
        $data = [
            "inland" => $inland,
            "global" => $global,
        ];
        return $this->yacht->send_response(201, $data, null);
    }
}
