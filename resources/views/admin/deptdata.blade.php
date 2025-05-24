<style type="text/css">
    td{
        padding: 10px;
        height: 30px;
        text-align: center;
    }
    .dept{
        text-align: left;
    }
    .truser{
        text-align: center;
        height: 50px;
        text-align: center;
        background-color: gray;
        color: white;
        border: 1px solid white;
    }
</style>
<h3 style="text-align: center;color: #219c9c"><hr>
    All Department
</h3><hr>

<table align='center' border="2" >
    <tr class="truser data">
        <td><b>Sr No.</b></td>>
        <td><b>Department</b></td>
        <td><b>Head of Department</b></td>
        <td><b>Depatment Picture</b></td>
        <td><b>Status</b></td>
        <td><b>Edit</b></td>
        <td><b>Delete</b></td>
    </tr>
    @foreach($members as $user)
    <tr style="height: 50px">

        <td>{{ $loop->iteration }}</td>
        <td class="dept">{{$user->dept}}</td>
        <td class="dept">{{$user->head_dept}}</td>
        <td>
            <img src="{{$user->profile_image}}" width="50" height="50">
        </td>
        @if($user->status==1) 
         <td>
            <a href="deactivedept/{{$user->id}}"><button class="btn btn-success">
                 Active
            </button></a> 
        </td> 
        @else
        <td>
            <a href="activedept/{{$user->id}}"><button class="btn btn-warning">
                Deactive
            </button></a> 
        </td> 
        @endif         
        <td>
            <a href="editdept/{{$user->id}}">
                <button class="btn btn-info">
                    Edit
                </button>
            </a> 
        </td>
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