<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\BookingRepository;
use App\Models\Booking;  

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class BookingController extends Controller
{
    protected $booking; 

    public function __construct(Booking $booking ){
        $this->booking            = new BookingRepository($booking);  
    }
    public function get(Request $request){
        $data = $this->booking->get_all(),
        return $this->booking->send_response(201, $data, null);
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
