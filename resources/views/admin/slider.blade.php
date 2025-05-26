@include('admin.admin_nav')
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

#valid{
  color: red;
}
</style>
<body>

<h2 style="text-align: center;color: #219c9c">Add slider Pics</h2><hr>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="sliderpic" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">Description</label>
        <input type="text" class="input" name="description" placeholder="Your name.." required>
        <label id="valid">
          @error('description')
           {{$message}} 
          @enderror
        </label><br/>

        <label for="pic">Slider pic</label>
        <input type="file" class="input" name="Slider_pic" required >
        <label id="valid">
          @error('slider_pic')
           {{$message}} 
          @enderror
        </label><br/>
      <input type="submit" name="submit" value="Add Pictures">
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>
@include('admin.sliderpics')