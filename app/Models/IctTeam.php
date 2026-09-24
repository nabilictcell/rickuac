<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IctTeam extends Model
{
    protected $fillable = ['title','detail','category','image','order_by_number','slug'];
}
