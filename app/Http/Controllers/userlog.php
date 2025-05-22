<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\department;
use Illuminate\Support\Facades\DB;

class userlog extends Controller
{
    public function userlog1(Request $r)
    { 
        $email=$r->input('email');
        $pass=$r->input('password');
        
        $users = DB::table('users')->get();

        foreach ($users as $user) 
        {
        	$emaildata=$user->email;
            $passdata=$user->password;
            $namedata=$user->f_name;
            $iddata=$user->id;
       	    if ($emaildata==$email && $passdata==$pass) 
            {
                if ($user->status==0) 
                {
                $r->session()->flash('msg','Your Account has been suspended please contact as administration');
                return redirect('/login'); 
                }
                else
                {
                    $r->session()->put('name',$namedata);
                    $r->session()->put('email',$emaildata);
                    $r->session()->flash('msg','Welcome to GCUF portal');
                    return redirect('/contact'); 
                }
            }
        }
        
        $r->session()->flash('msg','Please Put an valid address');
        return redirect('login'); 
    }
}

