<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ComboRepository;
use App\Models\Combo; 
use App\Repositories\Manager\PositionRepository;
use App\Models\Position; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ComboController extends Controller
{
    protected $combo;
    protected $position;

    public function __construct(Combo $combo, Position $position){
        $this->combo            = new ComboRepository($combo); 
        $this->position           = new PositionRepository($position); 
    }
    public function get(Request $request){
        $id = $request->id;
        $data = [
            "combo"  => $this->combo->get_all($id),
            "position" => $this->position->get_one($id),
        ];
        return $this->combo->send_response(201, $data, null);
    }

    public function get_one($id){
        $data       = $this->combo->get_one($id); 
        return $this->combo->send_response(200, $data, null);
    }
 
    public function store(Request $request){
        $data_image = $this->combo->imageInventor('image-room', $request->data_image, 600);
        $data_item = [ 
            "position_id"      => $request->data_id,  
            "name"          => $request->data_name,  
            "slug"          => $this->combo->to_slug($request->data_name),  
            "image"         => $data_image,  
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ]; 
        $item_create = $this->combo->create($data_item); 
        return $this->combo->send_response(201, null, null);
    }
    public function update(Request $request){
        $data_item = [ 
            "name"          => $request->data_name,  
            "slug"          => $this->combo->to_slug($request->data_name), 
            "properties"    => $request->data_properties,   
            "services"      => $request->data_service,  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,  
        ];
        if ($request->data_image != "null") {
            $data_item["image"] = $this->combo->imageInventor('image-room', $request->data_image, 600);
        }

        $this->combo->update($data_item, $request->data_id);
        return $this->combo->send_response(200, null, null);
    }

    public function delete($id){
        $this->combo->delete($id); 
        return $this->combo->send_response(200, "Delete successful", null);
    }
}
