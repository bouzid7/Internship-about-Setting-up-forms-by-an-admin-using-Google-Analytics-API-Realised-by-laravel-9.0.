@extends('layout')
 <title>@yield('title','responses')</title>
@section('content')
<div class="d-grid gap-1">
    <button class="btn btn-primary"  style="text-align:left;padding:0.3%;color:black" type="button"> <center><strong>{{__("Responses of Form_code")}} {{$form_code}}</strong>
    </center></button>
  </div>
  <br>
 <div class="container">
<div class="col-md-12">
    <table id="forms-tbl" class="table table-stripped">
        <thead>
            <tr>
                <th>{{__("#")}}</th>
                <th>{{__("Date")}}</th>
                <th>{{__("userName")}}</th>
                <th>{{__("Action")}}</th>
            </tr>
        </thead>
        <tbody>
            @php
            $i = 1;  
            @endphp 
               @foreach ($re as $response)
                <tr>
                    <td class="text-center">{{$i++}}</td>
                    <td>{{$response->date_created}}</td>
                    <td>{{$response->userName}}</td>
                    <td class='text-center'>
                    <a href="/admin/viewResponse/{{$response->form_code}}/{{$response->id}}" style="background-color:cornflowerblue;" class="btn btn-default border"><strong>{{__("viewResponseUser")}}  <i class="bi bi-body-text"></i></a></strong>
                    </td>
                </tr>
                @endforeach
        </tbody>
    </table>
</div>
</div>
@endsection