<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use App\Models\Product;
use App\Models\Device;



class ProductController extends Controller
{
    public function GetProduct(Request $request)
    {
        $id_emp = $request->id_emp;
        $permission = $request->role;
        $Employee = Employee::All();
        if($permission==1){
            $id_device = Device::ALL()->where('id_emp',$id_emp);
            $id_device = $id_device[0]['id_product'];
            $Product = Product::ALL()->where('id_product',$id_device);
        }
        else if($permission==0){
            $Product = Product::ALL();
        }
        return $Product;
    }
    public function UpdateProduct(Request $request,$id)
    {
        // $model = $request->model;
        $Product = Product::where('id_product',$id)->update(array(
            'model' => $request->model,
            'color' => $request->color
        ));
        if($Product==1)
        {
            $response = [
                'Status' => 'Success',
                'You update ID :' =>$id,
            ];
        }
        else{
            $response = [
                'Status' => 'Not Success',
                'You update ID :' =>$id,
            ];

        }
        return $response;
    }
    public function DeleteProduct(Request $request,$id)
    {
        $Product = Product::where('id_product',$id)->delete();

        if($Product==1)
        {
            $response = [
                'Status' => 'Success',
                'You Delete ID :' =>$id,
            ];
        }
        else{
            $response = [
                'Status' => 'Not Success',
                'You Delete ID :' =>$id,
            ];

        }
        return $response;


    }
}
