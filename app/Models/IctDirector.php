<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IctDirector extends Model
{
    protected $fillable = ['title','detail','image','name','designation','address','slug'];
}
