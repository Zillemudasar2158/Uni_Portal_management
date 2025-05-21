
<style type="text/css">
  #blink {
            font-size: 40px;
            font-weight: bold;
            color:red;
            transition: 0.2s;
            text-align: center;
        }
</style>
<body>

<div class="container">
  <h2 id="blink">SAHIWAL Campus View</h2>
<h3 style="text-align: center;color:red">
        {{session('msg')}}
   </h3><br />
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
                                  <!-- databse ssy fetch ky lia  <div class="item $item['id']==1?'active':''  "> -->
      <div class="item active">
        <img src="image/gcuf.png" alt="Los Angeles" style="width:100%; height: 450px;">
        <div class="carousel-caption">
          <h2 style="color: black">
            <i>
              GCUF Official Icon
            </i>
          </h2>
          <p></p>
        </div>
      </div>

      <div class="item">
        <img src="image/campus2.jpg" alt="Chicago" style="width:100%;height: 450px;">
        <div class="carousel-caption">
          <h2 style="color: white">
            <i>
              Beautiful View of sahiwal Campus
            </i>
          </h2>
          <p></p>
        </div>
      </div>
    
      <div class="item">
        <img src="image/sahiwalcampus.jpg" alt="New York" style="width:100%;height: 450px;">
        <div class="carousel-caption">
          <h2 style="color: black">
            <i>
              Beautiful View of sahiwal Campus
            </i>
          </h2>
          <p></p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>