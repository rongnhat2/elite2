<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Combo extends Model
{
    use HasFactory;
    protected $table = 'combo';
    protected $fillable = ['position_id', 'name', 'image', 'slug', 'properties', 'services', 'prices', 'discount', 'status', 'created_at', 'updated_at'];
}
