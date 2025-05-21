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
textarea {
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
  height: 460px;
}
@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .form {
    width:100%;
    height: 480px;
  }
}
</style>
<body>

<h2 style="text-align: center;">Review</h2>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
</h3><br />
<div class="form">
  <form action="usermsg" method="post">
    @csrf
    <label for="email">Email</label>
    <input type="email" class="input" name="email" placeholder="Your email address.." required>

    <label for="num">Mobile number</label>
    <input type="text" class="input" name="num" placeholder="Your mobile number.." required>

    <label for="email">Subject</label>
    <input type="text" class="input" name="subject" placeholder="Enter subject here....." required>

    <label for="msg">Message</label><br><br><br>
    <input type="text" height="100px;" class="input1" name="msg" placeholder="Type text here........" required>
 
    <input type="submit" value="Send Review">
  </form>
</div>