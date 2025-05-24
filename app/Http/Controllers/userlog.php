<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\department;
use Illuminate\Support\Facades\DB;

class userlog extends Controller
{
    public function saveData(Request $request)
{

    $files = $request->file('filess');
    $names = $request->input('dept');
    $headhod = $request->input('depthod');

    $insertData = [];

    foreach ($names as $i => $name) {
        $file = $files[$i];
        $fileName = Str::uuid() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('files'), $fileName);

        $insertData[] = [
            'dept' => $name,
            'profile_image' => 'files/' . $fileName,
            'head_dept' => $headhod[$i],
            'Status'=>1,
        ];
    }

    department::insert($insertData);

    echo "<script>
           alert('Department Added Successfully');
            window.location.href='dept';
        </script>";
}

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

