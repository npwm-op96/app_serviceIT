<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table ='employee';
    public $timestamps = false;
    protected $fillable = [
        'id_emp', 
        'name',
        'lastname',
        'id_department',
        'id_position',
        'birthday',
        'age',
        'start_time',
    ];

}
