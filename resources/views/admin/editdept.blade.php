<!DOCTYPE html>
<html lang="en">
<head>
  <title>GCUF sahiwal campus</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
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
</style>
</head>

<h2 style="text-align: center; color: #219c9c">Update Department detail</h2><hr>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>

<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="{{route('laravel1.update',[$dept->id])}}" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname"><b>Department name: </b></label>
        <input type="text" class="input" name="deptname" value="{{$dept->dept}}" readonly>

        <label for="faculty">Department Faculty</label>

        <select id="faculty" name="facultyname">
        @foreach ($finddept as $faculty)
          @if($faculty->status==1)
              <option value="{{ $faculty->id }},{{ $faculty->name }}">{{ $faculty->name }}</option>
          @endif

        @endforeach
        </select>

        <label for="fname"><b>Department  Profile Pic update</b> </label>
        <input type="file" class="input" name="profile">

        <input type="submit" value="Update HOD name">
      </form>
    </div>
    <div class="col-sm-3"></div>    
  </div>
</div>