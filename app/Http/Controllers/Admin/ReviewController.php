<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ReviewRepository;
use App\Models\Review;  

use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ReviewController extends Controller
{
    protected $review; 

    public function __construct(Review $review ){
        $this->review            = new ReviewRepository($review);  
    }

    
}
