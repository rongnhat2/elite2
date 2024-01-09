<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Yacht extends Model
{
    use HasFactory;
    protected $table = 'yacht';
    protected $fillable = ['location_id', 'name', 'slug', 'map', 'images', 'description', 'service', 'utilities', 'vehicle', 'detail', 'policy', 'trending', 'status', 'created_at', 'updated_at'];
}
