
<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\user;
use App\Models\department;
use App\Models\msg_user;
use App\Models\job;
use Illuminate\Support\Facades\DB;

//use Excel;
//use Maatwebsite\Excel\Concerns\Formcollection;


class form extends Controller
{
    function form_validate(Request $res){
    	$res->validate([
    		'firstname'=>'required|min:4',
    		'email'=>'required',
    		'password'=>'required|min:8',
    		'pic'=>'required|mimes:jpeg,png|max:1024'	
    	]);   
    	$res->file('pic')->store('media');
    }
   
    public function store(Request $r)
    {

        $chkemail=$r->input('email');
        $users = DB::table('users')->get();

        foreach ($users as $user) {
            $emaildata=$user->email;
            if ($emaildata==$chkemail) {
                $r->session()->flash('emailerror','Email Already exists');
                 return redirect('regd'); 
            }
            else{
                $res= new user;
                $res->id=$r->input('id');
                $res->f_name=$r->input('firstname');
                $res->email=$r->input('email');
                $res->password=$r->input('password');
                $res->status=1;
                $res->file_path=$r->file('pic')->store('media','public');
                $res->dept=$r->input('department');
                $res->save();

        $r->session()->flash('msg','Registration successfully');
        
        return redirect('regd'); 
            }
        }
    }   
       
    public function show()
    {
    	//$data=user::paginate(5);           .view('usersdata',['members'=>$data])
    	return view('admin/admin_nav');
    }
    public function destroy(user $user,$id)
    {
        user::destroy(array('id',$id));

        return redirect('usersdata');
    }
    public function edit(user $user,$id)
    {
        $data=department::all();
        return view('edit',['dept'=>$data])->with('members',user::find($id));
    }
    public function update(Request $request)
    {
        $res=user::find($request->id);
        $res->f_name=$request->input('name');
        $res->email=$request->input('email');
        $res->password=$request->input('password');
        $res->dept=$request->input('department');
        $res->save();
        $request->session()->flash('msg','Data updated successfully');
        
        return redirect('usersdata');
    }
    public function msguser(Request $r)
    {
        
        $res= new msg_user;
        $res->email=$r->input('email');
        $res->number=$r->input('num');
        $res->subject=$r->input('subject');
        $res->message=$r->input('msg');
        $res->save();

        $r->session()->flash('msg','Your message sent by admin. our team will response very soon');
        
        return redirect('contact'); 
    }  
    public function deactive(Request $request)
    {
        $res=user::find($request->id);
        $res->status=0;
        $res->save();
        
        return redirect('usersdata');
    } 
    public function active(Request $request)
    {
        $res=user::find($request->id);
        $res->status=1;
        $res->save();
        
        return redirect('usersdata');
    }  
    public function deactivedept(Request $request)
    {
        $res=department::find($request->id);
        $res->status=0;
        $res->save();
        
        return redirect('dept');
    } 
    public function activedept(Request $request)
    {
        $res=department::find($request->id);
        $res->status=1;
        $res->save();
        
        return redirect('dept');
    }  
    public function deactivejob(Request $request)
    {
        $res=job::find($request->id);
        $res->status=0;
        $res->save();
        
        return redirect('jobs');
    } 
    public function activejob(Request $request)
    {
        $res=job::find($request->id);
        $res->status=1;
        $res->save();
        
        return redirect('jobs');
    } 
    public function editjob(user $user,$id)
    {
       $data=job::where(['id'=>$id])->first();
        
       return view('admin/editjob',['job'=>$data]);
    }
    public function updatejob(Request $request)
    {
        $res=job::find($request->id);
        $res->subject=$request->input('subjectjob');
        $res->description=$request->input('descriptionjob');
        $res->save();
        
        return redirect('jobs');
    }
    public function download()
    {
        return Excel::download(new userexport,'alluserdata.xlsx');
    }
}
/*
class userexport implements Formcollection
{
    public function collection()
    {
        return user::all();
    }
}
*/