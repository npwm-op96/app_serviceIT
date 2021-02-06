<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;
use App\Models\Employee;



class Device extends Model
{
    protected $primaryKey = 'id_device';
    protected $table ='device';
    protected $fillable = ['id_emp', 'id_product','status','start_time','end_time'];
    public $timestamps = false;



    use HasFactory;
    public function product()
    {
    return $this->hasOne(Product::class, 'id_product', 'id_product');
    }
    public function employee()
    {
    return $this->hasOne(Employee::class, 'id_emp', 'id_emp');
    }
}
