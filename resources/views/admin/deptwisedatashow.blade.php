@include('admin/admin_nav')
<style type="text/css">
    td{
        padding: 10px;
        height: 30px;
        text-align: center;
    }
    .dept{
        width: 200px
    }
    .set{
        width: 210px;
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
    {{$dept}} Department
</h3><hr>
<table align='center' border="2" >
    <tr class="truser data">
        <td><b>Sr No.</b></td>
        <td class="dept"><b>CNIC</b></td>
        <td class="dept"><b>Name</b></td>
        <td class="dept"><b>Designation</b></td>
        <td class="dept"><b>Email</b></td>
        <td class="dept"><b>Department Name</b></td>
        <td><b>profile image</b></td>
        <td><b>Action</b></td>
        <td><b>Edit</b></td>
        <td><b>Delete</b></td>
    </tr>
    @foreach($members as $user)
    <tr style="height: 50px">

        <td>{{ $loop->iteration }}</td>
        <td>{{$user->CNIC}}</td>
        <td>{{$user->name}}</td>
        <td>{{$user->designation}}</td>
        <td>{{$user->email}}</td>
        <td>{{$user->deptname}}</td>
        <td><img src="../{{$user->profile_img}}" width="50" height="50"></td>
        @if($user->status==1) 
         <td>
            <a href="deactivefaculty/{{$user->id}}"><button class="btn btn-success">
                 Active
            </button></a> 
        </td> 
        @else
        <td>
            <a href="activefaculty/{{$user->id}}"><button class="btn btn-warning">
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