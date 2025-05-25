@include('admin/admin_nav')
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
  background-color:  #219c9c;
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
  margin-left: 25%;
  padding: 20px;
  width: 50%;
}
@media only screen and (max-width:720px) {
  /* For mobile phones: */
  .form {
    width:75%;
    margin-left: 12%;
  }
}
</style>
<body>

<h2 style="text-align: center;color:#219c9c">Add faculty members</h2><hr>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>
<div class="form">
	<form action="{{ url('facultypost') }}" method="POST" enctype="multipart/form-data">
      @csrf
      <label for="fname">Name</label>
      <input type="text" class="input" name="name" placeholder="Member Name .." required>

      <label for="fname">CNIC</label>
      <input type="text" class="input" name="cnic" placeholder="CNIC number.." required>

      <label for="fname">Email</label>
      <input type="email" class="input" name="email" placeholder="Your email.." required>

      <label for="fname">Designation</label>
      <select id="designation" name="designation">
      	 <option value="">-- Select designation --</option>
      	<option value="Professor">Professor</option>
      	<option value="Associate Professor">Associate Professor</option>
      	<option value="Assistant professor">Assistant professor</option>
      	<option value="Lecturer">Lecturer</option>
      	<option value="Lab Engineer">Lab Engineer</option>
      </select>

      <label for="department">Department</label>
        <select id="department" name="department">
         <option value="">-- Select department --</option>
        @foreach($members as $user )
        @if($user['status']==1) 
        <option value="{{ $user['id'] }},{{ $user['dept'] }}">{{ $user['dept'] }}</option>
        @endif
        @endforeach          
        </select>

      <label for="fname">Profile Image</label>
      <input type="file" class="input" name="profile" accept="image/*" required>

      <input type="submit" value="Add faculty member">
    </form>

</div>