<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;
    protected $table = 'room';
    protected $fillable = ['hotel_id', 'name', 'image', 'slug', 'properties', 'services', 'prices', 'discount', 'status', 'created_at', 'updated_at'];
}
