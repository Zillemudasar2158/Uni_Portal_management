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
    All Slider images
</h3>

<table align='center' border="2" >
    <tr class="truser">
        <td><b>Name</b></td>
        <td><b>Slider pics</b></td>
        <td><b>Action</b></td>
        <td><b>Delete</b></td>
    </tr>
    @foreach($members as $user )
    <tr style="height: 50px">
        
        <td>{{$user['pic_description']}}</td>

        <td>
            <a href="image/{{$user->id}}" target="_blank">
                <img src="{{ asset('storage/'.$user['pic_path']) }}" width="80px" height="60px">
            </a>
            
        </td>
       
            @if($user['status']==1) 
             <td>
                <a href="sliderdeactivepic/{{$user->id}}"><button class="btn btn-success">
                     Active
                </button></a> 
            </td> 
            @else
            <td>
                <a href="slideractivepic/{{$user->id}}"><button class="btn btn-warning">
                    deactive
                </button></a> 
            </td> 
            @endif 
       
        <td>
            <a href="deleteslidepic/{{$user->id}}">
                <button class="btn btn-danger">
                    Delete
                </button>
            </a> 
        </td>
        
    </tr>
    @endforeach
</table>
