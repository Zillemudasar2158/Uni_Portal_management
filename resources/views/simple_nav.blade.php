<!DOCTYPE html>
<html lang="en">
<head>
  <title>GCUF sahiwal campus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  
.img{
  margin-left: 50px;
}
</style>
<body>
<div class="container-fluid">
 <a href="/"><img src="/image/gcuf.png" class="img" height="80"></a>
</div><br>
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="/">GCUF Sahiwal Campus</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li><a href="contact">Contact us</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="jobshow">Careers</a></li>
           
          </ul>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
@if(Session::has('email'))
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome, 
            {{Session::get('name')}}
          
          @foreach($members as $user )
            @if($user->email==Session::get('email'))
             <img src="{{ asset('storage/'.$user['file_path']) }}" width="30" height="30">
            @endif
          @endforeach
           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="userlogout">Log out</a></li>
          </ul>
        </li>
        @else
        <li><a href="regd"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="login"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
      </ul>
                                       <!--
                                        <form class="navbar-form navbar-right" action="">
                                        <div class="input-group">
                                          <input type="text" class="form-control" placeholder="Search" name="search">
                                          <div class="input-group-btn">
                                            <button class="btn btn-default" type="submit">
                                              <i class="glyphicon glyphicon-search"></i>
                                            </button>
                                          </div>
                                        </div>
                                      </form> -->
     </div>
  </div>
</nav>
  