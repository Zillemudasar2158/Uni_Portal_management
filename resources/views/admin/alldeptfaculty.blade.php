@include('admin/admin_nav')
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
        <td><b>Department Name</b></td>
        <td><b>Faculty</b></td>
    </tr>
    @foreach($members as $user)
    <tr style="height: 50px">

        <td>{{ $loop->iteration }}</td>
        <td class="dept">{{$user->dept}}</td>
        <td class="dept"><a href="alldept/{{$user->dept}}"><button class="btn btn-success">View faculty</button></a></td>
    </tr>
    @endforeach
</table>