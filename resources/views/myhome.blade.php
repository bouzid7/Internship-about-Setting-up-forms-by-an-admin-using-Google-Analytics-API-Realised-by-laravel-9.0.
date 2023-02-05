
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
    <link rel="stylesheet" href="{{asset("/css/style1.css")}}">
    <title>Home</title>
</head>


<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
   <a  style="font-size:large;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"  class="navbar-brand" href="#"><img src="https://kstatic.googleusercontent.com/files/9f04faac24aed8bf8fb381029de951128d1d36373f89675265a6654d0c47b74b2d83a26b68b834ce2eea3bfe8001966f76895888138f135a81d099fc207c73bb" alt="Icône Forms">
       <strong>{{__('Forms')}} </strong></a> 
    <ul class="nav nav-pills">
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{ url('/login') }}">{{__('Log in')}} </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{ url('/register') }}">{{__('Register')}}</a>
      </li>
    </ul>
  </nav>
  <body>
    <div class="alert">
      <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span> 
      <strong>Welcome at home!</strong> <em>to access try to log in or register</em>.
    </div>
    <main>
   <div>
      <div class="slideshow-container">

        <div class="mySlides fade">
          <img src="{{asset('img/S2.jpg')}}" style="width:100%;height:30%;">
        </div>
        
        <div class="mySlides fade">
          <img src="{{asset('img/S3.jpg')}}" style="width:100% ;">
        </div>
        
        <div class="mySlides fade">
          <img src="{{asset('img/S4.png')}}" style="width:100%;">
        </div>
        
        </div>
        <br>
        
        <div style="text-align:center">
          <span class="dot"></span> 
          <span class="dot"></span> 
          <span class="dot"></span> 
        </div>
    </div>
  
 <br>
 <div>
    <p style="width:auto;float:right">
       <img src="{{asset('img/S1.png')}}" alt="">
        <h2  class="fst-italic"style="color:black;margin-top:3%;border-radius: 4%;margin-left:6%;margin-top:4%;">
        participer avec nous <br> 
         dans ce sondage  
         pour que <br> votre opinion est <br>
          parvenue il suffit de
    <button class="btn btn-dark" type="button"><a style="text-decoration: none;"  href="{{ url('/register') }}">{{__('s\'inscrire')}}</a></button>
    </h2>
</div>
  </main>

    <br>
    <br>
     <div class="container"  style="margin-top:10%;">
      <footer  class="d-flex flex-wrap justify-content-between align-items-center py-3 my-4 border-top">
        <p class="col-md-4 mb-0 text-muted">© 2022 Stage
        <img src="https://kstatic.googleusercontent.com/files/9f04faac24aed8bf8fb381029de951128d1d36373f89675265a6654d0c47b74b2d83a26b68b834ce2eea3bfe8001966f76895888138f135a81d099fc207c73bb" alt="Icône Forms">
          </p>
         <br>
         <br>
         <br>
      </footer>
    </div>

      <!-- scripts of javascript -->
      
    <script src="{{asset('js/slideshow.js')}}"></script>
     
      <!-- scripts of javascript -->

</body>
</html>