<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\NewsRepository;
use App\Models\News; 

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class NewsController extends Controller
{
    protected $news;

    public function __construct(News $news){
        $this->news            = new NewsRepository($news); 
    }
    public function index(){
        return view("admin.manager.news");
    }
    public function get(){
        $data = $this->news->get_all();
        return $this->news->send_response(201, $data, null);
    }
    public function get_one($id){
        $data       = $this->news->get_one($id); 
        return $this->news->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data_item = [ 
            "category_id"   => $request->data_category,  
            "name"          => $request->data_name,  
            "slug"          => $this->news->to_slug($request->data_name),  
            "image"         => $this->news->imageInventor('image-room', $request->data_image, 1920),  
            "description"   => $request->data_description,   
            "detail"        => $request->data_detail,  
        ];

        $item_create = $this->news->create($data_item); 

        return $this->news->send_response(201, null, null);
    }
    public function update(Request $request){
        
        $data_item = [ 
            "category_id"   => $request->data_category,  
            "name"          => $request->data_name,  
            "slug"          => $this->news->to_slug($request->data_name),   
            "description"   => $request->data_description,   
            "detail"        => $request->data_detail,  
        ];
        if ($request->data_image != "null") {
            $data_item["image"] = $this->news->imageInventor('image-room', $request->data_image, 1920);
        }

        $this->news->update($data_item, $request->data_id);

        return $this->news->send_response(200, null, null);
    }

    public function delete($id){
        $this->news->delete($id); 
        return $this->news->send_response(200, "Delete successful", null);
    }

    public function get_limit(Request $request){  
        $limit = $request->limit;
        if ($limit != 0) {
            $data = $this->news->get_limit($limit);
        }

        return $this->news->send_response(200, $data, null);
    }

}
