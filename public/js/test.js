
$(function() {
    $('#formTest').submit(function(e) {
        e.preventDefault()
        start_loader();
        $.ajax({
            url: "/test1",
            method: 'GET',
            data: new FormData($(this)[0]),
            cache: false,
            contentType: false,
            processData: false,
            method: 'GET',
            type: 'GET',
            dataType: 'json'
            /*error: err => {
                console.log(err)
                alert("an error occured")
            },
            success: function(resp) {
                if (typeof resp == 'object' && resp.status == 'success') {
                    alert("Form successfully Submitted")
                    location.reload()
                } else {
                    console.log(resp)
                    alert("an error occured")
                }
                end_loader()
            }*/
        })
    })
    
    $('#sendData').click(function() {
        $('#formTest').submit()
    })
    

})
