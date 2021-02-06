<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Carbon\Carbon;
use App\Models\Device;
use App\Models\Product;
use App\Models\Employee;


class DeviceController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
    public function GetDevice(Request $request,$per_page)
    {
        $Device = Device::with('product','employee')->paginate($per_page);
        return $Device;

    }
    public function count_device(Request $request)
    {
        $Device = Device::all();
        return response()->json($Device);

    }
    public function ListDevice(Request $request)
    {
        $Product = Product::ALL()->where('status','empty');
        return $Product;

    }
    public function DeliverDevice(Request $request)
    {
        $time = Carbon::now();
        $id_product = $request->id_product;
        $id_emp = $request->id_emp;
        $CheckProduct = Product::ALL()->where('id_product',$id_product)->where('status','not empty')->count();
        echo $CheckProduct;
        if($CheckProduct>0)
        {
            $message = "อุปกรณ์มีการใช้งานอยู่ " ;
            return $message;

        }
        else if ($CheckProduct==0){
            $Device = Device::create([
                'id_product' => $id_product,
                'id_emp' => $id_emp,
                'status' => 'active',
                'start_time' => $time
                ])->count();
            if($Device!=NULL)
            {
                $Product = Product::where('id_product',$id_product)->update(array(
                    'status' =>'not empty',
                    // 'color' => $request->color
                ));                
                $response = [
                    'Status' => 'Success',
                    'You Deliver ID :' =>$id_emp,
                ];
            }
            else{
                $response = [
                    'Status' => 'Not Success',
                    'You Deliver ID :' =>$id_emp,
                ];
            }
            return $response;
        }

    }
    public function ReturnDevice(Request $request,$id)
    {
        $time = Carbon::now();
        $id_product = $request->id_product;
        $id_emp = $request->id_emp;
        $CheckProduct = Product::ALL()->where('id_product',$id_product)->where('status','empty')->count();
        echo $id;
        echo $id_product;
        Device::where('id',$id)->update(array(
            'status' =>'inactive',
            'end_time'=>$time
        )); 
        if($CheckProduct>0)
        {
            $message = "อุปกรณ์ไม่มีการใช้งานอยู่แล้ว ไม่สามารถส่งคืนได้" ;
            return $message;

        }
        else if ($CheckProduct==0){
            $Product = Product::where('id_product',$id_product)->update(array(
                'status' =>'empty',
                // 'color' => $request->color
            ));   
            $Device = Device::create([
                'id_product' => $id_product,
                'id_emp' => $id_emp,
                'status' => 'inactive',
                'end_time' => $time
                ])->count();
            if($Device!=NULL)
            {               
                $response = [
                    'Status' => 'Success',
                    'You Return ID :' =>$id_emp,
                ];
            }
            else{
                $response = [
                    'Status' => 'Not Success',
                    'You Return ID :' =>$id_emp,
                ];
            }
            return $response;
        }

    }
    public function ReportDevice(Request $request)
    {
        $search_time = $request->search_time;
        $start_time = $request->start_time;
        $end_time = $request->end_time;
        $input_status = $request->status;
        $status = 'all';
        if($input_status=='')
        {
            $status = 'all';
        }else{
            $status = str_replace("all",$input_status,$status);
        }
        $status = strval($status);
        $search_time = strval($search_time);
        echo $status;

        if($start_time!='' || $end_time!='')
        {
            $ReportDevice=Device::ALL()->whereBetween($search_time, [$start_time,$end_time])->where('status',$status);
            if($status=='all')
            {
                // echo 'my function';
                $ReportDevice=Device::ALL()->whereBetween($search_time, [$start_time,$end_time]);
            }
            elseif($status!='')
            {
                // echo ' show fuction status with date_time';
                $ReportDevice=Device::ALL()->whereBetween($search_time, [$start_time,$end_time])->where('status',$status);
            }
        }
        elseif ($start_time=='' && $end_time =='' && $status!='')
        {
            // echo ' show fuction status without date_time';
            $status =$input_status;
            $ReportDevice=Device::ALL()->where('status',$status);
        }
        if($status!='')
        {
            // echo 'all show ';
            $ReportDevice=Device::ALL();
        }
        return $ReportDevice;
    
    }

}
