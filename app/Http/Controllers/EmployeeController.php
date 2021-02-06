<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Employee;
use Carbon\Carbon;


class EmployeeController extends Controller
{ 
    public function GetEmployee(Request $request)
    {
        $id_emp = $request->id_emp;
        $permission = $request->role;
        $start_time = $request->start_time;
        $Search_emp = $request->Search_emp;


        if($permission==1){
            $Employee = Employee::ALL()->where('id_emp',$id_emp);
        }
        else if($permission==0){
            $Employee = Employee::ALL();
        }
       
         if($Search_emp!='')
       {
           $Employee = Employee::where('name', 'LIKE', '%' . $Search_emp . '%')
           ->orwhere('id_emp', 'LIKE', '%' . $Search_emp . '%')->get();
           
       }
         else if($start_time!='')
        {
            $Employee = Employee::ALL()->where('start_time',$start_time);
            
        }
        else
        {
            $Employee = Employee::ALL();
            
        }
        return $Employee;
    }
    public function showdetail_emp(Request $request ,$id)
    {
  
        $response = Employee::ALL()->where('id_emp',$id);
        return $response;
    }

    public function CreateEmployee(Request $request)
    {
        $id_emp = $request->id_emp;
        $name = $request->name;
        $lastname = $request->lastname;
        $id_department = $request->id_department;
        $id_position = $request->id_position;
        $birthdayold= $request->date_emp;
        $start_time = date("Y-m-d");
        // $b_Date = explode("-", $birthdayold);
        // $datnow = explode("-",$datnowold);
        // $ks = intval($datnow[0]+543);
        // $age[0] =  "จำนวนปี = ".intval($ks-$b_Date[0]);
        // $age[1] = "จำนวนเดือน = ".intval($datnow[1]-$b_Date[1]);
        // $age[2] = "จำนวนวัน = ".intval($datnow[2]-$b_Date[2]);
        // $Employee = Employee::ALL('id_emp')->where('id_emp',$id_emp)->count();
        // if($Employee==0)
        // {
            $Employee = Employee::create([
                'id_emp' => $id_emp,
                'name' => $name,
                'lastname' => $lastname,
                'id_department' => $id_department,
                'id_position' => $id_position,
                'birthday' => $birthdayold,
                // 'age'=>$age[0].$age[1].$age[2],
                'start_time'=>$start_time 
                ])->count();
        // }
        // else if($Employee>0){
        //     $Employee = "รหัสพนักงานซ้ำ";
        // }
        return $Employee;
    }
    public function UpdateEmployee(Request $request,$id)
{
    $name = $request->name;
    $lastname = $request->lastname;
    $id_department = $request->id_department;
    $id_position = $request->id_position;
    $birthdayold= $request->birthday;
    $Employee = Employee::where('id_emp',$id)->update(array(
        'name' => $name,
        'lastname' => $lastname,
        'id_department' => $id_department,
        'id_position' => $id_position,
        'birthday' => $birthdayold,
        ));
        if($Employee==1)
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
        public function DeleteEmployee(Request $request,$id)
        {
        $Employee = Employee::where('id_emp',$id)->delete();

        if($Employee==1)
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
        return $Employee;


        }


        }
