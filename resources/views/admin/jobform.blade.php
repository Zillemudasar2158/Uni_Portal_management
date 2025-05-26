@include('admin.admin_nav')
<style>
  .input1{
    height: 50px;
    width: 98%;
    padding: 10px;
    border-radius: 20px;
  }
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
  background-color:color: #219c9c;
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

<h2 style="text-align: center;color: #219c9c">Add Jobs</h2><hr>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="jobpost" method="post">
        @csrf
        <label for="fname"><b>Subject: </b></label>
        <input type="text" class="input" name="subject" placeholder="Your job subject.." required>

        <label for="fname"><b>Description</b> </label> <br><br>
        <input type="text" height="100px;" class="input1" name="description" placeholder="Type text here........" required>

        <button style="margin-top: 6px"  id="payment-button" type="submit" class="btn btn-lg btn-info btn-block ">Post job</button>
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>  
</div>
<hr>
@include('admin/allpostjobs')