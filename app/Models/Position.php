<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    use HasFactory;
    protected $table = 'position';
    protected $fillable = ['location_id', 'name', 'slug', 'images', 'description', 'service', 'detail', 'policy', 'utilities', 'map', 'trending', 'status', 'created_at', 'updated_at'];
}
