<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
//use App\Http\Controllers\form;
use App\Http\Controllers\form_data;
use App\Http\Controllers\userlog;
use App\Http\Controllers\admin_auth;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
					//usercontroller 


		Route::get('/',[admin_auth::class,'home']);
		Route::get('/about',[admin_auth::class,'home']);

		//Route::get('regd',[usercontroller::class,'regd']);
		Route::get('login',[usercontroller::class,'login']);
		Route::get('regd',[usercontroller::class,'regd']);
		Route::get('gallery',[usercontroller::class,'gallery']);

		
				//form controller

		Route::post('user_regd',[form_data::class,'store']);
		Route::get('deleteuser/{id}',[form_data::class,'destroy']);
		Route::get('edituser/{id}',[form_data::class,'edit']);
		//Route::get('edituser/{id}',[form_data::class,'edit1']);
		Route::post('userupdate/{id}',[form_data::class,'update'])->name('laravel1.update');
												/*  datebase connection */

		Route::get('db',[form_data::class,'db']);
		Route::get('delete/{id}',[admin_auth::class,'destroydept']);
		Route::get('deletejob/{id}',[admin_auth::class,'destroyjob']);

				//admin_auth controller

		Route::get('admin',[admin_auth::class,'admin']);
		Route::post('adminlog',[admin_auth::class,'logincheck']);  
		Route::get('/logout', function () {
		    session()->forget('name');
		    session()->flash('msg','logout successfully');
		    return redirect('admin');
		});
		
		Route::get('jobshow',[admin_auth::class,'alljobs']);
		
											
	Route::group(['middleware'=>['adminpage']],function(){

		//Route::get('usersdata',[form::class,'show']);
		Route::get('usersdata',[form_data::class,'show']);
		Route::get('msg',[admin_auth::class,'msg']);
		Route::get('notification',[admin_auth::class,'jobs']);
		Route::get('jobs',[admin_auth::class,'jobs']);
		Route::post('jobpost',[admin_auth::class,'storejob']);
		Route::get('dept',[admin_auth::class,'dept']);
		Route::post('adddept',[admin_auth::class,'store']);
		Route::get('slider',[admin_auth::class,'slider']);
		Route::post('sliderpic',[admin_auth::class,'addsliderpic']);
		Route::get('deptt',[admin_auth::class,'show']);
		Route::get('activeuser/{id}',[form_data::class,'active']);
		Route::get('deactiveuser/{id}',[form_data::class,'deactive']);
		Route::get('activedept/{id}',[form_data::class,'activedept']);
		Route::get('deactivedept/{id}',[form_data::class,'deactivedept']);
		Route::get('activejob/{id}',[form_data::class,'activejob']);
		Route::get('deactivejob/{id}',[form_data::class,'deactivejob']);
		Route::get('slideractivepic/{id}',[admin_auth::class,'activepic']);
		Route::get('sliderdeactivepic/{id}',[admin_auth::class,'deactivepic']);
		Route::get('deleteslidepic/{id}',[admin_auth::class,'deleteslidepic']);
		Route::get('image/{id}',[admin_auth::class,'imageshow']);
		Route::get('editjob/{id}',[form_data::class,'editjob']);
		Route::post('updatejob/{id}',[form_data::class,'updatejob'])->name('laravel.update');

		Route::get('/download',[form_data::class,'download']);
	});

Route::get('career',[usercontroller::class,'regd1']);
		Route::get('contact',[usercontroller::class,'contact']);
			/*           user login 
is middleware me issue a ra ha isko check krna ha */
		Route::group(['middleware'=>['userlog']],function(){

		});

		Route::post('userlog',[userlog::class,'userlog1']);
		
		Route::get('/userlogout', function () {
		    session()->forget('email');
		    session()->flash('msg','logout successfully');
		    return redirect('login');
		});
				// message user 


		Route::post('usermsg',[form_data::class,'msguser']);
		
		Route::get('deletemsg/{id}',[admin_auth::class,'deletemsg']);