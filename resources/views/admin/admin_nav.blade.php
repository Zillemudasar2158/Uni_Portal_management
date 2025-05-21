<!DOCTYPE html>
<html lang="en">
<head>
  <title>Admin Panel</title>
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
                                     <a href="/">             <img src="/image/gcuf.png" class="img" height="80">
                                                  </a>
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
        <li><a href="msg">See User's Reviews</a></li>
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Manage data<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="usersdata">All User's</a></li>
            <li><a href="#">Download userdata</a></li>
          </ul>


        
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">Add <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="dept">Add department</a></li>
            <li><a href="jobs">Add jobs</a></li>
            <li><a href="slider">Add slider Pics</a></li>
          </ul>
        </li> 
      </ul>
      <ul class="nav navbar-nav navbar-right">

    @if(Session::has('name'))
        <li class="dropdown">
          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
            Welcome, {{Session::get('name', ['name'])}}
                                                     <!--  <img src="/image/pic.jpg" width="30" height="40"> ---->
           <span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="logout">Log out</a></li>
          </ul>
        </li>
    @else
        <li><a href="/admin"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
    @endif
      </ul>
    </div>
  </div>
</nav>
  