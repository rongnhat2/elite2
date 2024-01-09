<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\TourRepository;
use App\Models\Tour; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class TourController extends Controller
{
    protected $tour;

    public function __construct(Tour $tour){
        $this->tour            = new TourRepository($tour); 
    }
    public function index(){
        return view("admin.manager.tour");
    }
    public function get(){
        $data = $this->tour->get_all();
        return $this->tour->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->tour->get_one($id); 
        return $this->tour->send_response(200, $data, null);
    }
 
    public function store(Request $request){  

        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->tour->to_slug($request->data_name),  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_policy,  
        ];
        $image_list_prev     = $request->data_images_preview; 
        $image_list     = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->tour->imageInventor('image-tour', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $item_create = $this->tour->create($data_item); 

        return $this->tour->send_response(201, null, null);
    }
    public function update(Request $request){

        $data_item = [ 
            "location_id"   => $request->data_position,  
            "name"          => $request->data_name,  
            "slug"          => $this->tour->to_slug($request->data_name),  
            "prices"        => $request->data_prices,  
            "discount"      => $request->data_discount,   
            "description"   => $request->data_description,  
            "service"       => $request->data_service,  
            "detail"        => $request->data_timeline,  
            "policy"        => $request->data_policy,  
        ];
        $image_list_prev    = $request->data_images_preview; 
        $image_list         = array();
        if ($request->image_list_length > 0) {
            for ($i=0; $i < $request->image_list_length; $i++) { 
                array_push($image_list, $this->tour->imageInventor('image-tour', $request['image_list_item_'.$i], 1920));
            }
            $data_item['images'] = $image_list_prev != null ? $image_list_prev.",".implode(",",$image_list) : implode(",",$image_list);
        }else{ 
            $data_item['images'] = $image_list_prev;
        }

        $this->tour->update($data_item, $request->data_id);

        return $this->tour->send_response(200, null, null);
    }

    public function delete($id){
        $this->tour->delete($id); 
        return $this->tour->send_response(200, "Delete successful", null);
    }
    public function update_trending(Request $request){
        $this->tour->update_trending($request->id);
        return $this->tour->send_response(200, null, null);
    }

    public function get_trending(){
        $data = $this->tour->get_trending();
        return $this->tour->send_response(201, $data, null);
    }
    public function get_new(){
        $inland = $this->tour->get_new_inland(8);
        $global = $this->tour->get_new_global(8);
        $data = [
            "inland" => $inland,
            "global" => $global,
        ];
        return $this->tour->send_response(201, $data, null);
    }

    public function get_search(Request $request){
        $text       = $request->data_text;
        $category   = $request->data_category;
        $slug_data  = $this->tour->to_slug($text);
        $data       = $this->tour->find_real_time($slug_data, $category);
        return      $this->tour->send_response(200, $data, null);
    }

    public function category_get(Request $request){
        $tab            = $request->tab;
        $page           = $request->page;
        $pageSize       = $request->pageSize;
        $budget         = $request->budget;
        $location_type  = $request->location_type;
        $sort           = $request->sort;
        $data           = $this->tour->category_get($tab, $page, $pageSize, $budget, $location_type, $sort);
        return      $this->tour->send_response(200, $data, null);
    }
    


}
