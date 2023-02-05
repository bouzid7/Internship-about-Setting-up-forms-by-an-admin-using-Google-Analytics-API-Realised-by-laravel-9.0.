<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('css/custom.css')}}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/jquery-ui.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
    <script src="{{asset('js/script.js')}}"></script>
    <script src="{{asset('js/form-build-display.js')}}"></script>
    <script src="{{asset('js/form-builder.js')}}"></script>
    <script src="{{asset("js/deleteForm.js")}}"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">   
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title> @yield('title','Home')</title>
</head>

 <!-- nvbar  -->

<nav id="navbar-example2" class="navbar navbar-light bg-light px-3">
  <div class="container-fluid">
    <a  style="font-size:large;font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif"  class="navbar-brand" href="#"><img src="https://kstatic.googleusercontent.com/files/9f04faac24aed8bf8fb381029de951128d1d36373f89675265a6654d0c47b74b2d83a26b68b834ce2eea3bfe8001966f76895888138f135a81d099fc207c73bb" alt="Icône Forms">
      <strong> {{__('Forms')}}</strong></a>

 <ul class="nav nav-pills">
     @if (Route::has('login'))
     @auth 
     @if(Auth::user()->role=='admin')
     <li class="nav-item">
      <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('myhome')}}"><i class="fa fa-home"></i>&nbsp;{{__('Home')}}</a>
    </li>
     <li class="nav-item">
      <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('admin')}}"><i class="fa fa-list"></i>&nbsp;{{__('Forms')}}</a>
    </li>
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('admin.manage-forms')}}"><i class="fa fa-plus"></i>&nbsp;{{__('Create New')}}</a>
      </li>

            <li class="nav-item dropdown">
              <a  class="nav-link dropdown-toggle" href="{{ route('logout') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              
                <button type="button" class="btn btn-success">  {{ Auth::user()->name }}</button>
              </a>
              <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                <li><a class="dropdown-item" style="background-color:red;" href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
              </ul>
            </li>
       @endif
       
     @if(Auth::user()->role=='user')
     <li class="nav-item">
      <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('myhome')}}"><i class="fa fa-home"></i>&nbsp;{{__('Home')}}</a>
    </li>
    
    <li class="nav-item dropdown">
      <a  class="nav-link dropdown-toggle" href="{{ route('logout') }}" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <button type="button" class="btn btn-success">  {{ Auth::user()->name }}</button>
      </a>
      <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
        <li><a class="dropdown-item"  style="color:red" href="{{ route('logout') }}">{{ __('Logout') }}</a></li>
      </ul>
    </li>
    @endif
    @else
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('login')}}"> {{__('Login')}}</a>
      </li>
     @if (Route::has('register'))
      <li class="nav-item">
        <a class="nav-link" style="font-family: 'Nunito', sans-serif;" href="{{Route('register')}}">{{__('Register')}}</a>
      </li>
     @endif
   @endauth
   @endif
  </ul>
  </div>
  </nav>
  
  @yield('content')

 <!-- footer -->
  
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

