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

.topnav1 {
  overflow: hidden;
  
  
  height: 35%;
  margin-left: 50px;
}

.topnav1 a {
  float: left;
  display: block;
  height: 30%;
  background-color: #333;
  color: #f2f2f2;
  text-align: center;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
}

.topnav1 a:hover {
  background-color: #ddd;
  color: black;
}

.topnav1 a.active {
  background-color: #4CAF50;
  color: white;
}
@media screen and (max-width: 600px) {
  .topnav1 {
  overflow: hidden;
  
  
  height: 45%;
  margin-left: 50px;
}

}
.img{
  margin-left: 50px;
}
</style>
<body>

<h2 style="text-align: center; color: #219c9c">Update Department detail</h2><hr>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>

<div class="form">
  <form action="{{route('laravel1.update',[$dept->id])}}" method="post">
    @csrf
   
    <label for="fname"><b>Department name: </b></label>
    <input type="text" class="input" name="deptname" value="{{$dept->dept}}" placeholder="Your job subject..">

    <label for="fname"><b>HOD Name</b> </label>
    <input type="text" class="input" value="{{$dept->head_dept}}" name="dept_head_name" placeholder="Type HOD name here........" required>

    <input type="submit" value="Update HOD name">
  </form>
</div>