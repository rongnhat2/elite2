<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;
    protected $table = 'booking';
    protected $fillable = ['customer_id', 'room_id', 'time_start', 'time_end', 'date', 'prices', 'status', 'created_at', 'updated_at'];
}
