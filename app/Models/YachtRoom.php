<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class YachtRoom extends Model
{
    use HasFactory;
    protected $table = 'yacht-room';
    protected $fillable = ['yacht_id', 'name', 'image', 'slug', 'properties', 'services', 'prices', 'discount', 'status', 'created_at', 'updated_at'];
}
