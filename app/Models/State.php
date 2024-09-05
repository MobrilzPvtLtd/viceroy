<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'co_name','st_name',
    ];

    public function cities()
    {
        return $this->hasMany(City::class);
    }
}
