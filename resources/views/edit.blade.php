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
  background-color: #4CAF50;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  border-radius: 4px;
  cursor: pointer;
}

input[type=submit]:hover {
  background-color: #45a049;
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

<h2 style="text-align: center;">Update data</h2>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
<div class="form">
  <form action="{{route('laravel2.update',[$members->id])}}" method="post" >
    @csrf
    <input type="hidden" class="input" name="id" value="{{$members->id}}" placeholder="Your name.." >
    <label for="fname">First Name</label>
    <input type="text" class="input" name="name" value="{{$members->f_name}}" placeholder="Your name.." >

    <label for="lname">Email</label>
    <input type="email" class="input" name="email" value="{{$members->email}}" readonly placeholder="Your Email address.." >
   
    <label for="fname">Password</label>
    <input type="text" class="input" name="password" value="{{$members->password}}" placeholder="Your password.." >
      
    <label for="department">Department</label>
    <select id="department" name="department">
      @foreach($dept as $user )
        @if($user['status']==1)
          @if($members->dept==$user['dept'])
            <option selected value="{{$user['dept']}}">
          @else
            <option  value="{{$user['dept']}}">
          @endif
            {{$user['dept']}}</option>  
        @endif
      @endforeach
      
    </select>
  
    <input type="submit" name="submit" value="Update">
  </form>
</div>