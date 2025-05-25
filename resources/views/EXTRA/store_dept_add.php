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