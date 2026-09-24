<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class IctActivity extends Model
{
    protected $fillable = ['title','detail','attachment','event_date','starting_date','ending_date','slug'];
}
