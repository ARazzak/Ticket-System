<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tickets extends Model
{
    protected $fillable = ['summary', 'description', 'status'];
}
