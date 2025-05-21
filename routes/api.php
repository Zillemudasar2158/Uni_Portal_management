<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\dummyapi;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get("/data",[dummyapi::class,'getdata']);
Route::get("/dbdata/{id?}",[dummyapi::class,'getdbdata']);
Route::get("/dbname/{key:companyname?}",[dummyapi::class,'getdbdataname']);
Route::post("/savedata",[dummyapi::class,'add']);
Route::put("/update",[dummyapi::class,'update']);
Route::delete("/delete/{id}",[dummyapi::class,'delete']);
Route::get("/search/{companyname}",[dummyapi::class,'search']);
Route::post("/validate1",[dummyapi::class,'validate1']);