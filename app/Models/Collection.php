<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    protected $guarded = ['id'];

    public $timestamps = false; // Because not using created_at and updated_at
}
