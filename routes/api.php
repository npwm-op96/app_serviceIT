<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\DeviceController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AuthController;




/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group([
    'prefix' => 'auth'
], function () {
    Route::post('login', [AuthController::class,'login']);
    Route::post('signup', [AuthController::class,'signup']);
  
    Route::group(['middleware' => 'auth:api'], function() {
                Route::get('logout', [AuthController::class,'logout']);
                //Product
                Route::get('user', [AuthController::class,'user']);
                Route::get('count_device',[DeviceController::class, 'count_device']);

                Route::get('/GetEmployee',[EmployeeController::class, 'GetEmployee']);

            });         
});
                Route::get('/GetProduct',[ProductController::class, 'GetProduct']);
                Route::post('/UpdateProduct/{id}',[ProductController::class, 'UpdateProduct']);
                Route::delete('/DeleteProduct/{id}',[ProductController::class, 'DeleteProduct']);
        
                // Device
                Route::get('/GetDevice',[DeviceController::class, 'GetDevice']);
                Route::post('DeliverDevice',[DeviceController::class, 'DeliverDevice']);
                Route::post('ReturnDevice/{id}',[DeviceController::class, 'ReturnDevice']);
                Route::get('ListDevice',[DeviceController::class, 'ListDevice']);
                // Route::delete('/DeleteDevice/{id}',[DeviceController::class, 'DeleteDevice']);
                Route::get('/ReportDevice',[DeviceController::class, 'ReportDevice']);
        
                //Employee
                Route::get('/showdetail_emp/{id}',[EmployeeController::class, 'showdetail_emp']);
                Route::post('/CreateEmployee',[EmployeeController::class, 'CreateEmployee']);
                Route::post('/UpdateEmployee/{id}',[EmployeeController::class, 'UpdateEmployee']);
                Route::delete('/DeleteEmployee/{id}',[EmployeeController::class, 'DeleteEmployee']);
        
                // Users
                Route::get('user', [AuthController::class,'user']);
                Route::get('GetUsers', [AuthController::class,'dash_user']);
        
                // Route::get('GetUsers/', [AuthController::class,'user']);
        
        
                // Device
                Route::get('GetDevice/{per_page}', [DeviceController::class,'GetDevice']);






