<?php

namespace App\Http\Controllers;
use App\Models\relation;
use Validator;
use Illuminate\Http\Request;

class dummyapi extends Controller
{
    function getdata(){
    	return ["name"=>"zille","email"=>"zille@gmail.com" ];
    }
    function getdbdata($id=null){
    	return $id?relation::find($id):relation::all();
    }
    function getdbdataname($name=null){

		return $name?relation::where('companyname',$name)->get():relation::all();
    	//return $id?relation::find($id):relation::all();
    }
    public function add(Request $req)
    {
    	$r=new relation;
    	$r->companyname=$req->companyname;
    	$r->member_id=$req->member_id;
    	$check=$r->save();
    	if ($check) {
    		return ['result'=>'data saved successfully'];
    	}
    	else{
    		return ['result'=>'data not updated'];
    	}
    }
    public function update(Request $req)
    {
    	$r=relation::find($req->id) ;
    	$r->companyname=$req->companyname;
    	$r->member_id=$req->member_id;
    	$check=$r->save();
    	if ($check) {
    		return ['result'=>'data update successfully'];
    	}
    	else{
    		return ['result'=>'data not updated'];
    	}
    }
    public function delete($id)
    {
    	$r=relation::find($id) ;
    	$check=$r->delete();
    	if ($check) {
    		return ['result'=>'data delete successfully'];
    	}
    	else{
    		return ['result'=>'data not delete'];
    	}
    }
    public function search($name)
    {
    	$data= relation::where("companyname","like","%".$name."%")->get();
    	if ($data) {
    		return relation::where("companyname","like","%".$name."%")->get();
    	}
    	else{
    		return ['result'=>'data not found'];
    	}
    }
    public function validate1(Request $req)
    {
    	$rule= array(
    		"companyname"=>"required",
    		"member_id"=>"required | max:4"
    	);
    	$validate=Validator::make($req->all(),$rule);
    	if ($validate->fails()) {
    		return response()->json($validate->errors(),401);
    	}
    	else{
    		$r=new relation;
    	$r->companyname=$req->companyname;
    	$r->member_id=$req->member_id;
    	$check=$r->save();
    	return ['result'=>'data saved successfully'];
    	}    	
    }
}
