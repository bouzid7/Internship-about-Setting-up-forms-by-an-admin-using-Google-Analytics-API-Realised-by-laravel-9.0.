@extends('layout')
 <title>@yield('title','Form')</title>
@section('content')
<div class="alert alert-success">
    <span class="closebtn" onclick="this.parentElement.style.display='none';
     alert('Welcome {{Auth::user()->name}}!')
    ">&times;</span> 
    <center><em><strong>Welcome {{Auth::user()->name}}!</strong></em>.</center>
  </div>
  @if (session('message'))
  <div class="alert alert-success">
      {{ session('message') }} {{Auth::user()->name}}
  </div>
@endif
    <center  class="container">
    <div style="margin-top:2%;padding:5%">
        <br>
         <table class="table table-success table-striped"  style="">
                <thead>
                  <tr >
                    <th >{{__("")}}</th>
                    <th >{{__("Title")}}</th>
                    <th >{{__("Description")}}</th>
                    <th >{{__("Link")}}</th>
                  </tr>
                </thead>
                <tbody>
                  @php
                  $count=1;
                  @endphp 
         @foreach ($data as $item)
        <tr>
            <td>{{__("form")}} {{$count}}</td>
            <td>{{$item->title}}</td>
            <td>{{$item->description}}</td>
            <td> <a href="/user/form/{{$item->form_code}}">{{__("form")}} {{$count++}}</a></td>
        </tr>
        @endforeach
                
                </tbody>
        </table>
        <p> <strong><h4 style="color: red">{{__("comment:")}}</strong> </h4>&nbsp;&nbsp;<strong>{{Auth::user()->name}} &nbsp;{{__("choose the form how you want and answer on it.")}}</strong>
          <hr>
        
    </div>
    
     </center>

@endsection