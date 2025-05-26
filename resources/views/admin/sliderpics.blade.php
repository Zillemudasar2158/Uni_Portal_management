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
<hr>
<h3 style="text-align: center;color: #219c9c;">All Slider images</h3><hr>

<form method="POST" action="{{ route('admin.slider.updateOrder') }}">
    @csrf
<table align='center' border="2" >
    <tr class="truser">
        <td><b>Name</b></td>
        <td><b>Slider pics</b></td>
        <td><b> Slider image order</b></td>
        <td><b>Delete</b></td>
    </tr>
    @foreach($members as $user )
    <tr style="height: 50px">
        
        <td>{{$user['pic_description']}}</td>

        <td><img src="{{$user['pic_path']}}" width="80px" height="60px" style="padding: 5px"></a></td>
        <td>
            <input type="number" name="orders[{{ $user->id }}]" value="{{ $user->order_pic }}" 
                style="width:40px;text-align: center;">
        </td> 
       
        <td>
            <a href="{{ route('slider.delete', $user->id) }}"
                <button class="btn btn-danger">Delete</button>
            </a>
        </td>
        
    </tr>
    @endforeach
    @if($members->isEmpty())

    @else
    <tr>
        <td colspan="4" style="text-align: center;padding: 10px">
            <button class="btn btn-success">Re-ordering Slider images</button>
        </td>
    </tr>
    @endif
</table>
</form>
@include('footer')