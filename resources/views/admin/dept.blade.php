<style>
   .input, select {
   width: 100%;
   padding: 12px 20px;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   }
   #valid{
   color: red;
   }
</style>
   <h2 style="text-align: center;color: #219c9c">Add Department</h2>
   <hr>
   <h3 style="text-align: center;color:red">
      {{session('msg')}}
   </h3>
   <br />
<div class="container">
  <div class="row">
    <div class="col-sm-1"></div>
    <div class="col-sm-10">
      <form action="adddept" method="post" enctype="multipart/form-data">
        @csrf
          <div id="dept_row_box">
          <div id="dept1">
            <div class="row">
              <div class="col-sm-5">
                <label>Department name</label>
                <input type="text" class="input" name="dept[]" placeholder="Enter department name.." required>
              </div>
              <div class="col-sm-5">    
                <label>Department pic</label>
                <input type="file" class="input" name="filess[]"  required>
              </div>
              <div class="col-sm-2">  
                <button type="button" style="margin:22px 0px 0px 5px;" class="btn btn-success btn-lg" onclick="add_more()">
                <span aria-hidden="true">+</span>
            </button>
              </div>
            </div>
          </div>
          </div>    
        
        <br>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="col-md-3" style="margin-left: 50px">
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">Add department info</button>
          </div>
          <div class="col-md-4"></div>          
        </div>
      </form>
    </div>
    <div class="col-sm-1"></div>
  </div>
</div>


<script>
      var loop_count=1; 
      function add_more(){
          loop_count++;
          var html='<div id="dept'+loop_count+'">';
      
          html+='<br><div class="row"><div class="col-sm-5"><input type="text" class="input" name="dept[]" placeholder="Enter department name'+loop_count+'.." required></div><div class="col-sm-5"><input type="file" class="input" name="filess[]" placeholder="Enter HOD name.." required></div><div class="col-sm-2"><button type="button"  class="btn btn-danger btn-lg" style="margin-left: 5px" onclick=remove_more("'+loop_count+'")><span aria-hidden="true">-</span></button></div>          </div>'; 

           html+='</div>';
      
        
          jQuery('#dept_row_box').append(html)
      }
      function remove_more(loop_count){
           jQuery('#dept'+loop_count).remove();
      }
      
     
   </script>