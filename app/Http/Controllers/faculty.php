<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class faculty extends Controller
{
    function faculty()
    {
    	$data=DB::table('departments')
                ->orderBy('id','DESC')
                ->get();
        return view('simple_nav').view('faculty/faculty',['members'=>$data]);
    }
    function program()
    {
    	$data=DB::table('departments')
                ->orderBy('id','DESC')
                ->get();
        return view('simple_nav').view('program',['members'=>$data]);
    }
}
