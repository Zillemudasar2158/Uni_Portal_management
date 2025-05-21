<style type="text/css">

    .usertbl{
        width: 70%;
        height: auto;
    }
    .truser{
        text-align: center;
        height: 50px;
        background-color: gray;
        color: white;
        border: 1px solid white;
    }
    .divuser{
        float: left;
        width: 100%;
        height: auto;
    }
    td{
        text-align: center;
    }
    @media screen and (max-width: 600px) {
  .usertbl{
        width:100%;
        height: auto;
    }
    .divuser{
        float: left;
        width: 100%;
        height: auto;
    }
    td{
        text-align: center;
        width: 100px;
  word-break: break-all;
    }

}
</style>
<h2 align='center'>
    <u>Manage Users data</u>
</h2>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
<div class="divuser">
    <table class="usertbl" align='center' border="2" >
        <tr class="truser">
            <td><b>Name</b></td>
            <td><b>Email</b></td>
            <td><b>Password</b></td>
            <td><b>Department</b></td>
            <td><b>Pic</b></td>
            <td><b>Active</b></td>
            <td><b>Edit</b></td>
            <td><b>Delete</b></td>
        </tr>
        @foreach($members as $user)
        <tr>
            <td>{{$user['f_name']}}</td>
            <td>{{$user['email']}}</td>
            <td>{{$user['password']}}</td>
            <td>{{$user['dept']}}</td>    
            <td>
               <img src="{{ asset('storage/'.$user['file_path']) }}" width="80px" height="60px">
            </td> 
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
<div style=" margin-top: 20px">
    <span style="font-size: 20px;padding: 20px;text-align: center;">
    {{$members->links()}}
</span>
</div>
