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
  height: 200px;
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
@media only screen and (max-width:620px) {
  /* For mobile phones: */
  .form {
    width:100%;
    height: 480px;
  }
}
</style>

<h2 style="text-align: center;color: #219c9c">Contact us</h2><hr>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
</h3><br />
<div class="container">
  <div class="row">
    <div class="col-sm-3"></div>
    <div class="col-sm-6">
      <form action="usermsg" method="post" enctype="multipart/form-data">
          @csrf
          <label for="email">Email</label>
          <input type="email" class="input" name="email" placeholder="Enter email here.." required>

          <label for="num">Mobile number</label>
          <input type="text" class="input" name="num" placeholder="Your mobile number.." required>

          <label for="email">Subject</label>
          <input type="text" class="input" name="subject" placeholder="Enter subject here....." required>

          <label for="msg">Message</label><br>
          <input type="textarea" class="input1" name="msg" placeholder="Type text here........" required>
       
          <input type="submit" value="Contact">
        </form>
    </div>
    <div class="col-sm-3"></div>    
  </div>
</div>