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
  margin-left: 25%;
  padding: 20px;
  width: 50%;
  height: 295px;
}
@media only screen and (max-width:750px) {
  /* For mobile phones: */
  .form {
    width:100%;
    height: 380px;
    margin-left: 0%;
  }
}
</style>
<body>

<h2 style="text-align: center;">Admin Log In</h2>
<h3 style="color: red;text-align: center; ">{{session('msg')}}</h3>
<div class="form">
  <form action="adminlog" method="post">
    @csrf
    <label for="fname">Email</label>
    <input type="email" class="input" name="email" placeholder="Your email.." required>

    <label for="fname">Password</label>
    <input type="password" class="input" name="password" placeholder="Your password.." required>

    <input type="submit" value="Log In">
  </form>
</div>