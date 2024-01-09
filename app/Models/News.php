<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $fillable = ['category_id', 'name', 'slug', 'image', 'description', 'detail', 'status', 'created_at', 'updated_at'];
}
