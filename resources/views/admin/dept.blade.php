<style>
   .input, select {
   width: 80%;
   padding: 12px 20px;
   margin: 8px 0;
   display: inline-block;
   border: 1px solid #ccc;
   border-radius: 4px;
   box-sizing: border-box;
   }
   .form {
   border-radius: 5px;
   background-color: #f2f2f2;
   padding: 20px;
   height: auto;
   }
   #valid{
   color: red;
   }
</style>
<body>
   <h2 style="text-align: center;">Add Department</h2>
   <h3 style="text-align: center;color:red">
      {{session('msg')}}
   </h3>
   <br />

        <div class="form" id="dept_data">
           <form action="adddept" method="post">
              @csrf
              <label for="fname">Department Name</label>
              <div id="dept_row_box">
                <div id="dept1">
                  <input type="text" class="input" name="dept[]" placeholder="Enter department name.." required><button type="button" style="margin-left: 5px" class="btn btn-success btn-lg" onclick="add_more()">
              <span aria-hidden="true">+</span>
              </button>
                </div>
              </div>
              <!--    <div class="alert alert-danger">
                 @error('dept')
                 {{$message}} 
                 @enderror
                 </div>
                 -->      
              
              <div>
            <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
              Submit
            </button>
         </div>
           </form>
        </div>
   <script>
      var loop_count=1; 
      function add_more(){
          loop_count++;
          var html='<div id="dept'+loop_count+'">';
      
          html+='<input type="text" class="input" name="dept[]" placeholder="Enter department name'+loop_count+'.." required><button type="button"  class="btn btn-danger btn-lg" style="margin-left: 5px" onclick=remove_more("'+loop_count+'")><span aria-hidden="true">-</span></button>'; 

           html+='</div>';
      
        
          jQuery('#dept_row_box').append(html)
      }
      function remove_more(loop_count){
           jQuery('#dept'+loop_count).remove();
      }
      
      var loop_image_count=1; 
      function add_image_more(){
         loop_image_count++;
         var html='<input id="piid" type="hidden" name="piid[]" value=""><div class="col-md-4 product_images_'+loop_image_count+'"><label for="images" class="control-label mb-1"> Image</label><input id="images" name="images[]" type="file" class="form-control" aria-required="true" aria-invalid="false" required></div>';
         //product_images_box
          html+='<div class="col-md-2 product_images_'+loop_image_count+'""><label for="attr_image" class="control-label mb-1"> &nbsp;&nbsp;&nbsp;</label><button type="button" class="btn btn-danger btn-lg" onclick=remove_image_more("'+loop_image_count+'")><i class="fa fa-minus"></i>&nbsp; Remove</button></div>'; 
          jQuery('#product_images_box').append(html)
      }
      
      function remove_image_more(loop_image_count){
           jQuery('.product_images_'+loop_image_count).remove();
      }
      CKEDITOR.replace('short_desc');
      CKEDITOR.replace('desc');
      CKEDITOR.replace('technical_specification');
   </script>