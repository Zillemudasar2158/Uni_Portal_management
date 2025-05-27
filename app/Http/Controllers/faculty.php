<?php

namespace App\Http\Controllers;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\department;
use App\Models\facultymem;
use Illuminate\Support\Facades\DB;

class faculty extends Controller
{
    function faculty()
    {
        $dept = DB::table('departments')
                    ->leftJoin('facultymem',function ($join) {
                        $join->on('departments.id', '=', 'facultymem.dept_id')
                        ->where('facultymem.add_charge', 1);
                        })
                    ->select('departments.*', 'facultymem.profile_img','facultymem.add_charge')
                    ->where('departments.status', 1)
                    ->get();

        return view('faculty.faculty',['dept'=>$dept]);
    }
    function program()
    {
    	$data=DB::table('departments')
                ->orderBy('id','DESC')
                ->get();
        return view('program',['members'=>$data]);
    }
    function deptprofile($dept)
    {
        $data= facultymem::where('deptname', $dept)->get();
        $data1=$dept;

        return view('faculty/deptfaculty', ['departments' => $data],['dept' => $data1]);
    }
    function addfaculty()
    {
        $data = department::all();        
        return view('admin/addfacultyform', ['members' => $data]);
    }
    function postfaculty(Request $request)
    {
        $request->validate([
        'name' => 'required|string|max:255',
        'cnic' => 'required|string|max:20|unique:facultymem,cnic',
        'email' => 'required|email',
        'designation' => 'required',
        'department' => 'required',
        'profile' => 'required|image',
    ]);  
        $imageName = time().'.'.$request->profile->extension();
        $request->profile->move(public_path('deptimg'), $imageName);

        list($deptid, $deptname) = explode(',', $request->input('department'));
        $deptid;
        $deptname;

        facultymem::create([
        'CNIC' => $request->cnic,
        'name' => $request->name,
        'email' => $request->email,
        'dept_id' => $deptid,
        'deptname' => $deptname,
        'password' => $request->cnic,
        'designation' => $request->designation,
        'add_charge' => 0,
        'profile_img' => 'deptimg/'.$imageName,
        'status' => 1,
    ]);

        return redirect()->back()->with('success', 'Faculty member added successfully!');   
    }
    function alldeptfaculty()
    {
        $data = department::all();        
        return view('admin.alldeptfaculty', ['members' => $data]);        
    }
    function allfacultyshow($dept)
    {
        $data= facultymem::where('deptname', $dept)->get();
        $dept;

        return view('admin.deptwisedatashow',['members' => $data],['dept'=>$dept]);        
    }    
	public function deactivefaculty($id): RedirectResponse
	{
	    $faculty = Facultymem::findOrFail($id);
	    
	    if ($faculty->status === 0) {
	        return redirect()->back()->with('info', 'Faculty member is already deactivated.');
	    }

	    $faculty->update(['status' => 0]);

	    return redirect()->back()->with('success', 'Faculty member status updated successfully.');
	}
    
    public function activefaculty(Request $req,$id)
    {
        $res=facultymem::find($id);
        $res->status=1;
        $res->save();
        
        return redirect()->back()->with('success', 'Faculty member Status change successfully!');
    }   
    public function destoryfaculty(Request $req,$id)
    {
        facultymem::destroy(array('id',$id));
        return redirect()->back()->with('success', 'Faculty member Status change successfully!');
    } 
}