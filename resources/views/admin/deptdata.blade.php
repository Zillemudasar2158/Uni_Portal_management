<style type="text/css">
    tr td{
        width: 200px;
        height: 30px;
        text-align: center;
    }
    .truser{
        text-align: center;
        height: 50px;
        background-color: gray;
        color: white;
        border: 1px solid white;
    }
</style>
<h3 align='center'>
    All Department
</h3>

<table align='center' border="2" >
    <tr class="truser">
        <td><b>Department</b></td>
        <td><b>Action</b></td>
        <td><b>Delete</b></td>
    </tr>
    @foreach($members as $user)
    <tr style="height: 50px">
        
        <td>{{$user->dept}}</td>
       
            @if($user->status==1) 
             <td>
                <a href="deactivedept/{{$user->id}}"><button class="btn btn-success">
                     Active
                </button></a> 
            </td> 
            @else
            <td>
                <a href="activedept/{{$user->id}}"><button class="btn btn-warning">
                    deactive
                </button></a> 
            </td> 
            @endif 
       
        <td>
            <a href="delete/{{$user->id}}">
                <button class="btn btn-danger">
                    Delete
                </button>
            </a> 
        </td>
        
    </tr>
    @endforeach
</table>
<!--
<div style=" margin-top: 20px">
    <span style="font-size: 20px;padding: 20px;text-align: center;">
    //      $members->links()
</span>
</div>
-->