<!DOCTYPE html>
<html lang="en">
<head>
  <title>GCUF sahiwal campus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<style type="text/css">
  
.img{
  margin-left: 50px;
}
</style>
<style>
.input, select {
  width: 100%;
  padding: 12px 20px;
  margin: 8px 0;
  display: inline-block;
  border: 1px solid #ccc;
  border-radius: 4px;
  box-sizing: border-box;
}
input[type=submit] {
  width: 100%;
  background-color: #219c9c;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}
.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  height: 280px;
}


</style></head>

<h2 style="text-align: center; color:#219c9c ">Update Jobs</h2><hr>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="{{route('laravel.update',[$job->id])}}" method="post" enctype="multipart/form-data">
        @csrf
       
        <label for="fname"><b>Subject: </b></label>
        <input type="text" class="input" name="subjectjob" value="{{$job->subject}}" placeholder="Your job subject.." required>
        <label for="fname"><b>Description</b> </label> <br><br>
        <textarea name="descriptionjob" rows="8" cols="76">
          {{$job->description}}
        </textarea>
        <input type="submit" value="Update job">
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>