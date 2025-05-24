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

<h2 style="text-align: center;color: #219c9c;">User Registration form</h2><hr>
@if (session('msg'))
    <div class="alert">{{ session('msg') }}</div>
@endif
<br />
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="user_regd_form" method="post" enctype="multipart/form-data">
        @csrf
        <label for="fname">First Name</label>
        <input type="text" class="input" name="firstname" placeholder="Your name.." required>
        <label id="valid">
          @error('firstname')
           {{$message}} 
          @enderror
        </label><br/>

        <label for="lname">Email</label>
        <input type="email" class="input" name="email" placeholder="Your Email address.." required>
        <label id="valid">
          @error('email')
           {{$message}} 
          @enderror
        </label><br/>

        <label for="fname">Password</label>
        <input type="password" class="input" name="password" placeholder="Your password.." required>
        <label id="valid">
          @error('password')
           {{$message}} 
          @enderror
        </label><br/>
        
        <label for="pic">Profile pic</label>
        <input type="file" class="input" name="pic" required >
        <label id="valid">
          @error('pic')
           {{$message}} 
          @enderror
        </label><br/>
        
        <label for="department">Department</label>
        <select id="department" name="department">
        @foreach($members as $user )
        @if($user['status']==1) 
        <option value="{{$user['dept']}}">{{$user['dept']}}</option>
        @endif
        @endforeach
          
        </select>
      
        <input type="submit" name="submit" value="Registration">
      </form>
    </div>
    <div class="col-sm-3"></div>
  </div>
</div>