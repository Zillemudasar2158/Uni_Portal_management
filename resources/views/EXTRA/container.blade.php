<style type="text/css">
	.home {
  border-radius: 5px;
  margin: 5px;	
  height: 500px;
}
.main {
  float:left;
  width:68%;
  margin-right: 2%;
  padding:0 20px;
  height: 480px;
  background-image: url('image/sahiwalcampus.jpg');
}
.right {
  float:left;
  width:25%;
  text-align:center;
  height: auto;
}
.break{
  word-break: break-all;
  }

#blink {
            font-size: 40px;
            font-weight: bold;
            color:red;
            transition: 0.2s;
            text-align: center;
		    margin-top: 130px;
        }
@media only screen and (max-width:850px) {
  /* For mobile phones: */
  .main {
    width:95%;
    height: 480px;
  }
  .right {
    width:100%;
    height: auto;
  }
}
@media only screen and (max-width:620px) {
  /* For mobile phones: */
 .main {
    width:92%;
    height: 430px;
  }
  .right {
    width:100%;
    height: auto;
  }
}

</style>

      
<div class="home">

	  <div class="main">

      <h1 id="blink">SAHIWAL Campus View</h1>
    </div>

  <div class="right">
  <h2 style="background-color:green; padding: 5px; color: white">Notification</h2>
    <p>
    	<marquee direction="up" behavior="scroll" scrollamount="5" width="100%" height="390px">
    		<ul style="text-decoration: bold;">
          
          @foreach($jobdata as $user )
    			<li>
            <h3>New annoucement</h3>
            <p class="break">{{$user['description']}}</p>
          </li><br>
    			@endforeach
    		</ul>
    	</marquee>
    </p>
  </div>
</div>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>

