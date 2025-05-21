<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\department;
use Illuminate\Support\Facades\DB;
use App\Models\usermodel;

class usercontroller extends Controller
{
    public function regd1(){
    	return view('simple_nav').view('footer').view('chatmessage_popup');
    }
    public function login(Request $request){
        if($request->path()=="login" && $request->session()->has('email'))
        {
            $request->session()->flash('msg','Already login');
            return redirect('/');
        }
        else{
    	   return view('simple_nav').view('log').view('footer');
        }
    }
    public function contact(Request $r)
    {
        $session=$r->session()->get('email');
        $data=DB::table('users')->where('email',$session)->get(); 
        
        if(!$r->session()->has('email'))
        {
            return redirect('/login');
        }
        else
        {
            foreach($data as $user){
                $status= $user->status;           
            }   
            if ($status==0) {
                session()->forget('email');
                session()->forget('name');
            session()->flash('msg','logout successfully');
            return redirect('login');
            }
            else{
                $data1=department::all();
                return view('simple_nav',['members'=>$data1]).view('contact').view('footer');
            } 
        }
    }
   // public function admin(){
   // 	return view('simple_nav').view('admin/admin_log').view('footer');
  //  }
    public function regd(Request $r)
    {
        if($r->session()->has('email'))
        {
            return redirect('/');
        } 
        else
        { 
        $data=department::all();
        return view('simple_nav').view('form',['members'=>$data]).view('footer');
    }
    }
}
