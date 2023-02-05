<!DOCTYPE html>
<html>
<head>
<!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  
  
  
  
  
<script type="text/javascript">
      
$(function(){

$("button").click(function(){    

  //set values///////////////////////////////
  $("#id1").val( $('label[for="id1"]').text());
  $("#id2").val( $('label[for="id2"]').text());
  $("#id3").val( $('label[for="id3"]').text());
  $("#id4").val( $('label[for="id4"]').text());
 ///////////////////////////////////////////////


/////get values////////////////////
          var    v1=$("#id1").val();
          var    v2=$("#id2").val();
          var    v3=$("#id3").val();
          var    v4=$("#id4").val();
          var    v5=$('#id5').val();
////////////////////////////////////


         if($('#id1').is(':checked'))
         {
           
          var checkbox1=v1;

         }

         if($('#id2').is(':checked'))
         {
           
          var checkbox2=v2;

         }

         if($('#id3').is(':checked'))
         {
           
          var radio1=v3;

         }

         if($('#id4').is(':checked'))
         {
           
          var radio2=v4;

         }


     
    }); 
    
  })
 
</script>

</head>
<body>
 

<div  class="container"   style="margin-top:10%">
    <form   id="formTest"  method=""  action="" >
  <div class="form-check">
    <input class="form-check-input" name="id1"   type="checkbox" value=""  id="id1">
    <label  class="form-check-label-1" for="id1">
      checkbox1
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" name="id2" type="checkbox"  id="id2" checked>
    <label class="form-check-label-2" for="id2">
      Checkbox2
    </label>
  </div>

  <div class="form-check">
    <input class="form-check-input" name="id3"  type="radio"  id="id3">
    <label class="form-check-label" for="id3">
      radio1
    </label>
  </div>
  <div class="form-check">
    <input class="form-check-input" name="id4" type="radio"  id="id4" checked>
    <label class="form-check-label" for="id4">
      radio2
    </label>
  </div>


  <div class="form-floating"> 
    <textarea class="form-control" name="id5" placeholder="Leave a comment here" id="id5"></textarea>
    <label for="id5">Comments</label>
  </div>
  </form>

</div>
<center>
<button  type="submit" class="btn btn-primary"  form="formTest"  id="sendData">submit</button>
</center>

<script>

$(document).ready(function() {
  
  for(i=1;i=<5;i++)
  {
    $("#id"i"").prop('checked', true);
  }

});


</script>
</body>
</html>