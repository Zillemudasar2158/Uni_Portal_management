@include('simple_nav')
<style type="text/css">
	.col-sm-4{
		margin-bottom: 5px;
	}
	.img_faculty{
		width: 100px;
		height: 100px;
		margin-top: 5px;
		border-radius: 20px
	}
	.img_head{
		width: 200px;
		height: 150px;
		margin-top: 15px;
		border-radius: 10px
	}
	.faclty{
		padding: 10px;
		border-radius: 10px
	}
</style>

<div class="container-fluid text-center"> 
	<div class="row">
		<h1 style="color: #219c9c">{{$dept}} Department</h1>   
		<hr>
		<div class="col-md-2"></div>
		<div class="col-md-9">
			
  <div class="row">
  	@foreach($departments as $user)
  	@if($user->add_charge==1)
	  	<div class="col-md-3"></div>
	    <div class="col-md-9" style="text-align: left"> 
	    	<div style="float: left">
		    	<img src="{{asset($user->profile_img) }}" class="img_head">
	    	</div>
	    	<div style="float: left;margin:10px 0px 0px 20px">
	    		<h4><b> {{$user->name}}</b></h4>
		  		<h5><b> Head of department</b></h5>
		  		<h5><b>{{$user->deptname}}</b></h5>
		  		<h5>
				  	<span class="glyphicon glyphicon-envelope" aria-hidden="true"></span>
				  	<a href="mailto:info@gmail.com">{{$user->email}}</a>
				</h5>
		  		<h5>
				  	<span class="glyphicon glyphicon-earphone" aria-hidden="true"></span>+25648524456</h5>
	    	</div>	    	
	    </div>
    </div>
    @endif	
  	@endforeach
  	<br><br>
	<div class="row">
		@foreach($departments as $user1)
  			@if($user1->add_charge==0)
  				@include('faculty.facultyshow')				
     		@endif
    	@endforeach
	</div>
</div>		
<div class="col-md-1"></div>
</div> 	
</div>