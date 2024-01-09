<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = 'tour';
    protected $fillable = ['location_id', 'name', 'slug', 'prices', 'discount', 'images', 'description', 'service', 'detail', 'policy', 'trending', 'status', 'created_at', 'updated_at'];
}
