<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


use Carbon\Carbon;
use Session;
use Hash;
use DB;

class DisplayController extends Controller
{
    public function login(){
        return view('admin.auth.login');
    }
    public function index(){
        return redirect()->route("admin.location.index");
    }
    public function statistic(){
        return view('admin.manager.statistic');
    }
    public function image(Request $request){
        $data = $this->news->imageInventor('image-upload', $request->file, 1280);
        return $this->news->send_response(201, $data, null);
    }
}
