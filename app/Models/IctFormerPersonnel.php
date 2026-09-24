<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IctFormerPersonnel extends Model
{
    protected $fillable = ['title','address','designation','from','to','order_by_number','slug'];
}
