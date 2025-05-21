 
<style type="text/css">
  #blink {
            margin-top: 100px;
            font-size: 70px;
            font-weight: bold;
            color:red;
            transition: 0.2s;
            text-align: center;
        }
</style>
<p style="text-align: center;margin-top: 50px">
  @if($dept['status']==1)
 <img src="{{ asset('storage/'.$dept['pic_path']) }}" width="900" height="500">
 @else
 <h1 id="blink">This Image will be block by admin</h1>
 @endif
</p>
<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>