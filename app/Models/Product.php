<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model {
    protected $primaryKey = 'product_id';
    
    public $timestamps = false;
}
