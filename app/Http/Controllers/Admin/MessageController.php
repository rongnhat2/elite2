<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\MessageRepository;
use App\Models\Message;  

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class MessageController extends Controller
{
    protected $message;

    public function __construct(Message $message){
        $this->message            = new MessageRepository($message);  
    }
    public function sending(Request $request){
        
         $data_item = [ 
            "name"          => $request->data_name,  
            "email"         => $request->data_email,  
            "telephone"     => $request->data_telephone,   
            "metadata"      => $request->data_meta, 
        ];

        $item_create = $this->message->create($data_item); 

        return $this->message->send_response(201, null, 201);
    }
}
