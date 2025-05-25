<style type="text/css">
	.col-sm-4{
		margin-bottom: 5px;
	}
	.img_faculty{
		width: 350px;
		height: 200px;
		margin-top: 5px;
	}
</style>
<div class="container-fluid text-center"> 
	<h1 style="color: #219c9c">Undergraduate pragrams</h1>   
	<hr>
  <div class="row content">
	@foreach($members as $user)
	@if($user->status==1)
    <div class="col-sm-4"> 
    	<a href="deptfaculty/{{$user->dept}}"><img src="{{$user->profile_image}}" class="img_faculty">
      	<h4>{{$user->dept}}</a></h4>
    </div> 
    @endif
  @endforeach
   </div>
</div>