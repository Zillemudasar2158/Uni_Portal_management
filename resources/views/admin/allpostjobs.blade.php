<style type="text/css">
	.footer {
  float: left;
  width:99%;
     background-color: #777;
  padding: 5px;
  text-align: center;
  color: white;
}
@media screen and (max-width: 600px) {
  .footer {
  float: left;
  width:100%;
     background-color: #777;
  padding: 5px;
  text-align: center;
  color: white;
    
}}
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
  <h2 style="background-color:green; text-align: center; padding: 5px; color: white">All posted jobs</h2>
                     <!-- database lagani ha messages ki -->
      @foreach($userjob as $user )

          <button class="accordion">

            <b> Subject: </b>  {{$user['subject']}}

          </button>

          <div class="panel">
            <p style="margin-left: 40px;margin-bottom: 30px;">

                <b> Description: </b> {{$user['description']}} 
            </p>

          <form method="post">
            @csrf
            <input type="hidden" value="{{$user['id']}}" name="id"></form> 
       <div style="float: right">  
       <a href="editjob/{{$user['id']}}"><button class="btn btn-info">
                     Edit Job
                </button></a>   
            <a href="deletejob/{{$user['id']}}"><button class="btn btn-danger">
                     Delete Job
                </button></a>
      @if($user['status']==1)
               <a href="deactivejob/{{$user->id}}"><button class="btn btn-success">
                     Active
                </button></a>
                @else
                <a href="activejob/{{$user->id}}"><button class="btn btn-warning">
                    deactive
                </button></a>
                @endif
           
        </div>
          </div>
      
      @endforeach
          
</div>
<br>
<div class="footer">
  <footer>
  <i>
    <p>@This design is created by officials Z'Star.</p>
  </i>
</footer>
</div>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    } 
  });
}
</script>