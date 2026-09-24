<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IctInformation extends Model
{
    protected $fillable = ['title','detail','category','attachment','link','slug'];
}
