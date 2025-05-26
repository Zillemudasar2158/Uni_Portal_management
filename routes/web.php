<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\usercontroller;
use App\Http\Controllers\faculty;
use App\Http\Controllers\form;
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

		//Route::get('regd',[usercontroller::class,'regd']);
		Route::get('login',[usercontroller::class,'login'])->name('login.page');
		Route::get('regd',[usercontroller::class,'regd'])->name('regd.page');

		
				//form controller

		Route::post('user_regd_form',[form::class,'store']);
		Route::get('deleteuser/{id}',[form::class,'destroy']);
		Route::get('edituser/{id}',[form::class,'edit']);
		Route::post('userupdate/{id}',[form::class,'update'])->name('laravel2.update');
												
							/*  datebase connection */

		Route::get('db',[form::class,'db']);
		Route::get('delete/{id}',[admin_auth::class,'destroydept']);
		Route::get('deletejob/{id}',[admin_auth::class,'destroyjob']);

				//faulty controller
		Route::get('faculty',[faculty::class,'faculty'])->name('faculty.page');
		Route::get('deptfaculty/{id}',[faculty::class,'deptprofile']);

				//Program route
		Route::get('program',[faculty::class,'program'])->name('program.page');

				//admin_auth controller

		Route::get('admin',[admin_auth::class,'admin']);
		Route::post('admin/adminlog',[admin_auth::class,'logincheck']); 
		Route::post('adminlog',[admin_auth::class,'logincheck']);  
		Route::get('/logout', function () {
		    session()->forget('name');
		    session()->flash('msg','logout successfully');
		    return redirect('admin');
		});
		
		Route::get('jobshow',[admin_auth::class,'alljobs'])->name('jobshow.page');		
											
	Route::group(['middleware'=>['adminpage']],function(){

		//Route::get('usersdata',[form::class,'show']);
		Route::get('usersdata',[form::class,'show'])->name('usersdata.page');
		Route::get('msg',[admin_auth::class,'msg'])->name('msg.page');
		Route::get('notification',[admin_auth::class,'jobs']);
		Route::get('jobs',[admin_auth::class,'jobs'])->name('jobs.page');
		Route::post('jobpost',[admin_auth::class,'storejob']);

		Route::get('dept',[admin_auth::class,'dept'])->name('dept.page');

		Route::get('msg1',[admin_auth::class,'msg1']);
		Route::post('adddept',[userlog::class,'saveData']);

				//admin faculty member
		Route::get('addfaculty',[faculty::class,'addfaculty'])->name('addfaculty.page');
		Route::post('facultypost',[faculty::class,'postfaculty']);
		Route::get('alldept',[faculty::class,'alldeptfaculty'])->name('alldept.page');
		Route::get('alldept/{id}',[faculty::class,'allfacultyshow'])->name('laravel3.update');
		Route::get('alldept/deactivefaculty/{id}',[faculty::class,'deactivefaculty']);
		Route::get('alldept/activefaculty/{id}',[faculty::class,'activefaculty']);
		Route::get('alldept/delete/{id}',[faculty::class,'destoryfaculty']);

		Route::get('editdept/{id}',[admin_auth::class,'editdept']);
		Route::post('updatedept/{id}',[admin_auth::class,'updatedept'])->name('laravel1.update');

		Route::get('addslider',[admin_auth::class,'slider'])->name('addslider.page');
		Route::post('sliderpic',[admin_auth::class,'addsliderpic']);
		Route::post('/admin/slider/update-order', [admin_auth::class, 'updateOrder'])->name('admin.slider.updateOrder');
		Route::get('deptt',[admin_auth::class,'show']);
		Route::get('activeuser/{id}',[form::class,'active']);
		Route::get('deactiveuser/{id}',[form::class,'deactive']);
		Route::get('activedept/{id}',[form::class,'activedept']);
		Route::get('deactivedept/{id}',[form::class,'deactivedept']);
		Route::get('activejob/{id}',[form::class,'activejob']);
		Route::get('deactivejob/{id}',[form::class,'deactivejob']);
		Route::get('slideractivepic/{id}',[admin_auth::class,'slideractivepic']);
		Route::get('sliderdeactivepic/{id}',[admin_auth::class,'deactivepic']);
		Route::get('deleteslidepic/{id}', [admin_auth::class, 'deleteslidepic'])->name('slider.delete');
		Route::get('image/{id}',[admin_auth::class,'imageshow']);
		Route::get('editjob/{id}',[form::class,'editjob']);
		Route::post('updatejob/{id}',[form::class,'updatejob'])->name('laravel.update');

		Route::get('/download',[form::class,'download']);
});

		Route::get('career',[usercontroller::class,'regd1']);
		Route::get('contact',[usercontroller::class,'contact'])->name('contact.page');		
			
			/*           user login 
is middleware me issue a ra ha isko check krna ha */
		//Route::group(['middleware'=>['userlog']],function(){
			
		//});

		Route::post('userlog',[userlog::class,'userlog1']);
		
		Route::get('/userlogout', function () {
		    session()->forget('email');
		    session()->flash('msg','logout successfully');
		    return redirect('login');
		});
				// message user 
		Route::post('usermsg',[form::class,'msguser']);		
		Route::get('deletemsg/{id}',[form::class,'deletemsg']);