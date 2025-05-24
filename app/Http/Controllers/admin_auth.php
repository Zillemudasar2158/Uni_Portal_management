<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\job;
use App\Models\department;
use App\Models\msg_user;
use App\Models\slider;
use Illuminate\Support\Facades\DB;

class admin_auth extends Controller
{
    function msg1()
    {
        return view('admin/msg');
    }
    function home()
    {
        $data=user::all();
        return view('simple_nav',['members'=>$data]).view('slider').view('footer').view('chatmessage_popup');

        //return view('simple_nav').view('container',['jobdata'=>$jobdatapost]).view('footer').view('chatmessage_popup');
    }
    function alljobs()
    {
        $data=job::all();
        $datapic=user::all();
        return view('simple_nav',['members'=>$datapic]).view('userjob',['userjob'=>$data]).view('chatmessage_popup');
    }
	function admin()
    {
		return view('admin/admin_nav').view('admin/admin_log').view('footer');
	}
    function msg()
    {
        $data=msg_user::all();
        return view('admin/admin_nav').view('admin/user_msg',['usermem'=>$data]);
    }
    function dept(){
        $data=DB::table('departments')
                ->orderBy('id','DESC')
                ->get();    
                return view('admin/admin_nav').view('admin/dept').view('admin/deptdata',['members'=>$data])
                .view('footer');
    }
    public function editdept(user $user,$id)
    {
       $data=department::where(['id'=>$id])->first();
        
       return view('admin/editdept',['dept'=>$data]);
    }
    public function updatedept(Request $request,$id)
    {     
        $request->validate([
        'deptname' => 'required|string|max:255',
        'dept_head_name' => 'required|string|max:255',
        'profile' => 'nullable|mimes:jpg,png,jpeg|max:2048',
    ]);
        $department = Department::findOrFail($id);

        $department->dept=$request->input('deptname');
        $department->head_dept=$request->input('dept_head_name'); 

        if ($request->hasFile('profile')) {
        $image = $request->file('profile');
        $imageName = time() . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('files'), $imageName);
        $department->profile_image = 'files/' . $imageName;
    } 
             
        $department->save();
        
        return redirect('dept');        
    }

    function jobs()
    {
        $data=job::all();
        return view('admin/admin_nav').view('admin/jobform').view('admin/allpostjobs',['userjob'=>$data]);
    }
    public function storejob(Request $r)
    {
        $res= new job;
         $res->subject=$r->input('subject');
         $res->description=$r->input('description');
         $res->status=1;
        $res->save();

        $r->session()->flash('msg','Job posted Successfully');
        
        return redirect('jobs'); 
    } 
    public function destroyjob(user $user,$id)
    {
        job::destroy(array('id',$id));

        return redirect('jobs');
    }
    public function destroydept(user $user,$id)
    {
        department::destroy(array('id',$id));

        return redirect('dept');
    }
    public function store(Request $r)
    {        
        $r->validate([
            'dept'=>'required|unique:departments'
]);
        
        $dept=$r->post('dept');
        $dept1=$r->post('depthod');
        foreach ($dept as $key => $value) {
            $deptarr['dept']=$dept[$key];
            $deptarr['head_dept']=$dept1[$key];
            $deptarr['profile_image']=0;
            $deptarr['status']=1;
            DB::table('departments')->insert($deptarr);
        }
        echo "<script>
           alert('Department Added Successfully');
            window.location.href='dept';
        </script>";

        //$r->session()->flash('message','Department Added Successfully');
        //return redirect()->back()->with('status',"data posted");        
    } 
    function logincheck(Request $request)
    {
        $request->validate
        ([
            'email'=>'required|email',
            'password'=>'required|min:5|max:9',
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        if ($email=='zillemudasar60@gmail.com' && $password=='12345') {
            $request->session()->put('name','zille mudasar');
            return redirect('usersdata');
        }
        else{
            $request->session()->flash('error','Please enter valid detail');
            return redirect('admin');
        }
    }
    function profile(Request $request){
        if ($request->session()->has('name')) {
            return view('header').view('user.profile').view('user.footer');
        }
        else{
        	$request->session()->flash('error','Access denied');
            return redirect('login');
        }    	
    }
    public function slider(Request $r)
    {

        $data=slider::all();
        return view('admin/admin_nav').view('admin/slider').view('admin/sliderpics',['members'=>$data]);
    } 
    public function addsliderpic(Request $r)
    {  
                $res= new slider;
                $res->id=$r->input('id');
                $res->pic_description=$r->input('description');
                $res->status=1;
                $res->pic_path=$r->file('slider_pic')->store('media','public');
                $res->save();

        $r->session()->flash('msg','Pic Added Successfully');
        
        return redirect('slider'); 
    } 
    public function deactivepic(Request $request)
    {
        $res=slider::find($request->id);
        $res->status=0;
        $res->save();
        
        return redirect('slider');
    } 
    public function activepic(Request $request)
    {
        $res=slider::find($request->id);
        $res->status=1;
        $res->save();
        
        return redirect('slider');
    }
    public function deleteslidepic(user $user,$id)
    {
        slider::destroy(array('id',$id));

        return redirect('slider');
    }
    public function imageshow(user $user,$id)
    {
       $data=slider::find($id);
       return view('admin/image',['dept'=>$data]).view('footer');
    }
}
