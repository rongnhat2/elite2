<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\LocationRepository;
use App\Models\Location; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class LocationController extends Controller
{
    protected $location;

    public function __construct(Location $location){
        $this->location            = new LocationRepository($location); 
    }
    public function index(){
        return view("admin.manager.location");
    }
    public function get(){
        $data = $this->location->get_all();
        return $this->location->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->location->get_one($id); 
        
        return $this->location->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data_item = [ 
            "type"      => $request->data_location,  
            "name"         => $request->data_name,  
            "slug"         => $this->location->to_slug($request->data_name),  
        ];
        // dd($this->location->create($data_item));
        $item_create = $this->location->create($data_item); 

        return $this->location->send_response(201, null, null);
    }
    public function update(Request $request){   
        $data_item = [ 
            "type"  => $request->data_location,
            "name"         => $request->data_name,  
            "slug"         => $this->location->to_slug($request->data_name),  
        ];
        $this->location->update($data_item, $request->data_id);

        return $this->location->send_response(200, null, null);
    }

    public function delete($id){
        $this->location->delete($id); 
        return $this->location->send_response(200, "Delete successful", null);
    }
}
