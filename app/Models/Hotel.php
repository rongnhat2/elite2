<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    protected $fillable = ['location_id', 'name', 'slug', 'images', 'description', 'service', 'detail', 'policy', 'utilities', 'map', 'trending', 'status', 'created_at', 'updated_at'];
}
