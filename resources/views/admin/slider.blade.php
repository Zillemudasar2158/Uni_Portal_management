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
  background-color: #66d9ff
;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #4dd2ff;
}

.form {
  border-radius: 5px;
  background-color: #f2f2f2;
  padding: 20px;
  height: auto;
}
#valid{
  color: red;
}
</style>
<body>

<h2 style="text-align: center;">Add slider Pics</h2>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
<div class="form">
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
      
    <input type="submit" name="submit" value="Add Pic">
  </form>
</div>