
@extends('layout')
 <title>@yield('title','Forms list')</title>
@section('content')
<div class="d-grid gap-2">
    <button class="btn btn-primary"  style="text-align:left;padding:1%" type="button"><h3>{{__("Forms list")}}</h3></button>
  </div>
  <br>
  @if (session('message'))
    <div class="alert alert-success">
        {{ session('message') }}
    </div>
@endif
<div class="container">
<button  style="float:right"  onclick="p()" form="form-admin" type="submit" class="btn btn-success">{{__("save avaibilityOnUserInterface")}}</button>
 <br> <br> <br>
<div class="col-md-12">
 <form  id="form-admin" method="get" action="{{route('admin.changeAV')}}">
    <table id="forms-tbl" class="table table-stripped">
        <thead>
            <tr>
                <th>{{__("#num")}}</th>
                <th>{{__("dateCreated")}}</th>
                <th>{{__("Code")}}</th>
                <th>{{__("Title")}}</th>
                <th>{{__("URL")}}</th>
                <th>{{__("avaibilityOnUserInterface")}}</th>
                <th>{{__("Action")}}</th>
            </tr>
        </thead>
        <tbody>
             @php
               $i=1;
             @endphp
            @foreach ($data as $item)
                <tr>
                    <td  class="text-center">{{$i}}</td>
                    <td>  {{$item->date_created}}  </td>
                    <td> {{$item->form_code}} </td> 
                    <td>  {{$item->title}} </td>
                    <td> <a href="admin/form/{{$item->form_code}}">form?code={{$item->form_code}}</a> </td>
                   <td>
    <a   href="javascript:void(0)" style="background-color:rgb(100, 237, 212);" class="btn btn-default border"><strong>
<input data-id="{{$item->id}}" data-afu="{{$item->afu}}" id="afu{{$i}}" name="afu[]" value="{{$item->afu}}"  style="transform: scale(2);"  type="checkbox"  >
<input type="hidden" name="afu[]"  value="{{$item->id}}">
    </a></strong>
    </td>   
                    <td class='text-center'>
                        <a href="admin/edit/{{$item->id}}/{{$item->form_code}}" style="background-color:greenyellow;" class="btn btn-default border"><strong>{{__("edit")}} <i class="fa fa-edit"></i></a></strong>
                        <a href="/admin/view_response/{{$item->form_code}}" style="background-color:cornflowerblue;" class="btn btn-default border"><strong>{{__("responses")}}  <i class="bi bi-body-text"></i></a></strong>
                        <a href="javascript:void(0)" class="btn btn-default border rem_form" data-form_code-delete="{{$item->form_code}}" data-id-delete="{{$item->id}}"><span class="fa fa-trash text-danger"></span></a>
                    </td>
                </tr>
                @php
                $i++;
              @endphp
                @endforeach
        </tbody>
    </table>
</form>

</div>
</div>
<script type="text/javascript">
  
var d={{$i}};

for(i=1;i<d;i++)
{
  var afu=$("#afu"+i+"").val();
   if(afu=='on')
   {
   $("#afu"+i+"").attr('checked',true);
   }
   else
   {
    $("#afu"+i+"").attr('checked',false);
   }

    
   function p()
    {
       
        //start_loader();
        var _conf = confirm("Are you sure to change statut of the avaibility")
        //var id=$("#afu1").attr('data-id')
       // var afu=$("#afu1").attr('data-afu')  
          if(_conf == true)
          {


            alert("avaibility successfully changed");
           /* $.ajax({
                url:"changeAV", 
                method:'GET',
                data:{id: id,afu:afu},
                dataType:'json',
                error:err=>{
                    console.log(err)
                    alert("an error occured111")
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        alert("avaibility successfully changed");
                        location.reload()
                    }else{
                        console.log(resp)
                    alert("an error occured222")
                    }
                }
            })*/
        }

       //end_loader()
    }
    

}
 
</script>

@endsection
