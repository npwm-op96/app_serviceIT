<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // protected $primaryKey = 'id_product';
    protected $table ='product';
    public $timestamps = false;
        // protected $gru
    use HasFactory;
}
