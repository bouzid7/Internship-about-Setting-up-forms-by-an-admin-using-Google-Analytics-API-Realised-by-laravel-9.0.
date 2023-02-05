$(function(){
    $('.rem_form').click(function(){
        start_loader();
        var _conf = confirm("Are you sure to delete this form?")
        var id=$(this).attr('data-id-delete')
        var form_code=$(this).attr('data-form_code-delete')
        if(_conf == true){
            $.ajax({
                url:"deleteForm",
                method:'GET',
                data:{id: id,form_code:form_code},
                dataType:'json',
                error:err=>{
                    console.log(err)
                    alert("an error occured111")
                },
                success:function(resp){
                    if(resp.status == 'success'){
                        alert("Form successfully deleted");
                        location.reload()
                    }else{
                        console.log(resp)
                    alert("an error occured222")
                    }
                }
            })
        }
        end_loader()
    })
})