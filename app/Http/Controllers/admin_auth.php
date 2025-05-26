<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\user;
use App\Models\job;
use App\Models\department;
use App\Models\facultymem;
use App\Models\msg_user;
use App\Models\sliderpic;
use Illuminate\Support\Facades\DB;

class admin_auth extends Controller
{
    function home()
    {
        $data=user::all();
        $sliderdata=sliderpic::orderBy('order_pic')->get();
        return view('slider', ['members' => $data,'slider'=>$sliderdata]);
    }
    function alljobs()
    {
        $data=job::all();
        return view('userjob',['userjob'=>$data]);
    }
	function admin()
    {
		return view('admin.admin_log');
	}
    function msg()
    {
        $data=msg_user::all();
        return view('admin.user_msg',['usermem'=>$data]);
    }
    function dept(){
        $data=DB::table('departments')
                ->orderBy('id','DESC')
                ->get();    
                return view('admin.dept',['members'=>$data]);
    }
    public function editdept(user $user,$id)
    { 
        $data = Department::find($id);
        if ($data) 
        {
            $department= $data->dept;
         
            $finddata= facultymem::where('deptname', $department)->get();  
            
            return view('admin.editdept',['dept'=>$data,'finddept'=>$finddata]);
        }
    }
    public function updatedept(Request $request,$id)
    { 
        $department = Department::findOrFail($id);

        $department->dept=$request->input('deptname');
        if ($request->input('facultyname')=='')
        {
            $department->head_dept='';
            $department->head_id='';
        }
        else
        {
            list($facultyid, $facultyname) = explode(',', $request->input('facultyname'));
            $department->head_id=$facultyid;
            $department->head_dept=$facultyname;
            
            if ($id && $facultyid) 
            {
            DB::transaction(function () use ($id, $facultyid) 
            {
                // Step 1: Reset all add_charge flags in the same department
            DB::table('facultymem')
            ->where('dept_id', $id)
            ->update(['add_charge' => 0]);

            // Step 2: Assign add_charge to the selected faculty member
            DB::table('facultymem')
            ->where('id', $facultyid)
            ->where('dept_id', $id) // Make sure the faculty is in the same department
            ->update(['add_charge' => 1]);
            });
        }

        }      

        if ($request->hasFile('profile')) 
        {
            $image = $request->file('profile');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('files'), $imageName);
            $department->profile_image = 'files/' . $imageName;
        } 
             
        $department->save();
        
        return redirect('dept');        
    }
    function msg1()
    {
        return view('admin.msg');
    }
    function jobs()
    {
        $data=job::all();
        return view('admin/jobform',['userjob'=>$data]);
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
    function logincheck(Request $request)
    {
        $request->validate
        ([
            'email'=>'required|email',
            'password'=>'required|min:5|max:9',
        ]);
        $email=$request->input('email');
        $password=$request->input('password');
        if ($email=='zillemudasar@gmail.com' && $password=='12345') {
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
        $data=sliderpic::all();
        return view('admin.slider',['members'=>$data]);
    } 
    public function addsliderpic(Request $r)
    { 
        $data=sliderpic::all();
        $count=count($data);
        $countdata= $count+1;

        $res= new sliderpic;
        $res->id=$r->input('id');
        $res->pic_description=$r->input('description');
        $res->order_pic=$countdata;

        if ($r->hasFile('Slider_pic')) 
        {
            $image = $r->file('Slider_pic');
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('slider'), $imageName);
            $res->pic_path= 'slider/' . $imageName;
        } 

        $res->save();

        $r->session()->flash('msg','Pic Added Successfully');
        
        return redirect('addslider');
    } 
    public function updateOrder(Request $request)
    {
        foreach ($request->orders as $id => $newOrder) {
            \App\Models\SliderPic::where('id', $id)->update([
                'order_pic' => $newOrder,
            ]);
        }

        return redirect()->back()->with('success', 'Slider orders updated successfully.');
    }
    public function deleteslidepic($id)
    {
        \App\Models\SliderPic::destroy($id);
        return redirect('addslider')->with('success', 'Slider pic deleted successfully.');
    }
    public function imageshow(user $user,$id)
    {
       $data=sliderpic::find($id);
       return view('admin.image',['dept'=>$data]);
    }
}

