<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'type', 'address','p_type', 'bed', 'area', 'price', 'desc', 'number_of_room', 'property_status', 'p_id' , 'number_bathroom', 'year', 'facilities', 'image', 'floor_plan', 'map', 'video',
    ];
}
