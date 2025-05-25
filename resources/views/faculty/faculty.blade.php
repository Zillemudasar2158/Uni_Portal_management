<style type="text/css">
	.col-sm-4{
		margin-bottom: 5px;
	}
	.img_faculty{
		width: 150px;
		height: 150px;
		margin-top: 5px;
		border-radius: 50%;
	}
</style>
<div class="container-fluid text-center"> 
	<h1 style="color: #219c9c">Head of Department Profile</h1>   
	<hr>
  <div class="row content">
	@foreach($dept as $user)
    <div class="col-sm-4"> 
    	<img src="{{ asset($user->profile_img ?? 'image/pic1.jpg') }}" class="img_faculty" alt="Faculty Image">
    	<h3 style="font-weight: bold;">{{ $user->head_dept ?: 'Anonymous' }}</h3>
      	<p style="font-size: 25px;">Head of department</p>
      	<h4><a href="deptfaculty/{{$user->dept}}">{{$user->dept}}</a></h4>
    </div> 
  @endforeach
   </div>
</div>