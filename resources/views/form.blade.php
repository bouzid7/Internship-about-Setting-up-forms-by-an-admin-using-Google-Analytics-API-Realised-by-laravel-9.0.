@extends('layout')
 <title>@yield('title','form')</title>
@section('content')

<head>
    <script>
        var form_code = "{{$form_code}}";
   </script>



<script type="text/javascript">

  $(function(){




    
    $("button").click(function(){ 
    
   //set values///////////////////////////////
    var i=0;
    for( i=0;i<100;i++)
    {
      $("#id"+i+"").val( $("label[for=id"+i+"]").text());
    }

      



 
            /*
             if($('#idRadio').is(':checked'))
             {
                   
               $("#idRadio").val( $('label[for="idRadio"]').text());
             } 
    
               if($('#idCheckbox').on(':checked=true'))
             {

             
                $("#idCheckbox").val( $('label[for="idCheckbox"]').text());

             }*/
    

             }); 
        
       })
    
    </script>
</head>

<body class='bg-dark'>
    
     <style>
    table th,
    table td {
        padding: 3px !important
    }
    </style>

     <div class="container pt-4">
         <form id="form-data" action="{{route('test.stage')}}">
          {{ require  Storage::path($form_code.'.html') }}
           <input type="hidden"   name="typeUser"  value="{{Auth::user()->role}}">
           <input type="hidden"   name="userName"  value="{{Auth::user()->email}}">
        </form>
        <div class="w-100 d-flex justify-content-center">
            <button class="btn btn-primary" type="submit" form="form-data" id="save_response">submit</button>
        </div>
     </div>
@endsection

