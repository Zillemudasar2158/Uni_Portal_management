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
  height: 295px;
}
@media only screen and (max-width:720px) {
  /* For mobile phones: */
  .form {
    width:75%;
    height: 380px;
    margin-left: 12%;
  }
}
</style>
<body>

<h2 style="text-align: center;text-align: center;color: #219c9c">User Log In</h2><hr>

@error('form')
<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
   {{$message}}  
   <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         <span aria-hidden="true">×</span>
   </button>
</div> 
@enderror
<div class="form">
  <form action="userlog" method="post">
    @csrf
    <label for="fname">Email</label>
    <input type="text" class="input" name="email" placeholder="Your email.." required>

    <label for="fname">Password</label>
    <input type="password" class="input" name="password" placeholder="Your password.." required>

    <input type="submit" value="Log In">
  </form>
</div>