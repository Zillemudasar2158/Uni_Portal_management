<style type="text/css">
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
.right {
  width:100%;
  height: auto;
}
.accordion {
  background-color: #eee;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

.active:after {
  content: "\2212";
}

.panel {
  padding: 0 18px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
}
</style>

<div class="right">
  <h2 style="text-align: center; padding: 5px;color: #219c9c">Reviews / Complaints</h2><hr>
                     <!-- database lagani ha messages ki -->
      @foreach($usermem as $user )
          <button class="accordion">
            <b> Email: </b>  {{$user['email']}}
          </button>
          <div class="panel"><br>
            <p style="margin-left: 50px;margin-bottom: 30px;">
               <b> Number: </b> {{$user['number']}}
            </p>
            <p style="margin-left: 50px;margin-bottom: 30px;">
             <b> Message: </b> {{$user['message']}}
            </p>
            <div class="topnav1" id="myTopnav">
          <form method="post">
            @csrf
            <input type="hidden" value="{{$user['id']}}" name="id">
            
            <a href="deletemsg/{{$user['id']}}">Delete Message</a>
          </form>  
          </div>
          </div>  
      @endforeach
          
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) 
{
  acc[i].addEventListener("click", function() 
    {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } 
    else 
    {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>