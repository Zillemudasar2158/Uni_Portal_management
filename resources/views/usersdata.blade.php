@include('admin.admin_nav');
<style type="text/css">

    .usertbl{
        width: 80%;
        height: auto;
    }
    .truser{
        text-align: center;
        height: 50px;
        background-color: gray;
        color: white;
        border: 1px solid white;
    }
    td{
        text-align: center;
        word-break: break-all;
    }

}
</style>
<h2 style="text-align: center;color:#219c9c">Manage Users data</h2><hr>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
<div class="container">
    <div class="row">
        <div class="col-sm-12">
    <table class="usertbl" align='center' border="2" >
        <tr class="truser">
            <td style="width: 70px"><b>Sr No.</b></td>
            <td><b>User Name</b></td>
            <td><b>Email</b></td>
            <td><b>Department</b></td>
            <td style="width: 80px;"><b>User Pic</b></td>
            <td><b>Active</b></td>
            <td><b>Edit</b></td>
            <td><b>Delete</b></td>
        </tr>
        <?php $i=0;?>
        @foreach($members as $user)
        <tr>
            <td>{{ $loop->iteration + ($members->currentPage() - 1) * $members->perPage() }}</td>
            <td>{{$user['f_name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['dept']}}</td> 
            <td style="padding: 10px"><img src="{{ asset('storage/' . $user['file_path']) }}" width="50" height="50"></td>    
            
             @if($user['status']==1) 
             <td>
                <a href="deactiveuser/{{$user->id}}"><button class="btn btn-success">
                     Active
                </button></a> 
            </td> 
            @else
            <td>
                <a href="activeuser/{{$user->id}}"><button class="btn btn-warning">
                    deactive
                </button></a> 
            </td> 
            @endif       
            <td>
                <a href="edituser/{{$user->id}}"><button class="btn btn-info">
                    Edit
                </button></a> 
            </td> 
            <td>
                <a href="deleteuser/{{$user->id}}"><button class="btn  btn-danger">
                    Delete
                </button></a> 
            </td>
            
        </tr>
        @endforeach
        
    </table>

        </div>
    </div>       
</div>


<div style=" margin-top: 20px">
    <span style="font-size: 20px;padding: 20px;text-align: center;">
    {{$members->links()}}
</span>
</div>
