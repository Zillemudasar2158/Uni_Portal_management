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
  .navbar-sticky-top
{
    position: fixed;
    z-index: 999;
    opacity:1;
    width: 100%;
}
.img{
  margin-left: 50px;
}
</style>
<body>
  
<nav class="navbar navbar-inverse navbar-sticky-top">
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
        <li><a href="{{ route('faculty.page') }}">Faculty</a></li>
        <li><a href="{{ route('program.page') }}">Programmes</a></li>
        <li><a href="{{ route('contact.page') }}">Contact us</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Pages <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="{{ route('jobshow.page') }}">Careers</a></li>
           
          </ul>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">
      @if(Session::has('email'))
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Welcome, 
            {{Session::get('name')}}
           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="userlogout">Log out</a></li>
          </ul>
        </li>
        @else
        <li><a href="{{ route('regd.page') }}"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
        <li><a href="{{ route('login.page') }}"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
        @endif
      </ul>
     </div>
  </div>
</nav>
<div class="container-fluid">
  <div class="col-sm-12" style="height: 50px"></div>
</div>
  