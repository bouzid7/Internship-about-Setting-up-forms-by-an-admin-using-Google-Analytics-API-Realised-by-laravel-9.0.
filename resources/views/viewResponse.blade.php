
@extends('layout')
<title>@yield('title','responses')</title>
@section('content')
 <br>
 {{ require  Storage::path($form_code.'.html') }}


 <script>

    
$(function(){
    $('#form-field').prepend("<input type='hidden' name='form_code' value='" + {{$form_code}} + "'/>")
    
    $('#form-buidler-action').remove()
    $('.question-item .card-footer, .item-move,[name="choice"],.add_chk, .add_radio,.rem-on-display').remove()
    $('[contenteditable]').each(function() {
        $(this).removeAttr('contenteditable')
    })
    $('.form-check label').click(function() {
        if ($(this).siblings('input').is(":checked") == true) {
            $(this).siblings('input').prop("checked", false).trigger('change')
        } else {
            $(this).siblings('input').prop("checked", true).trigger('change')
        }
    })
    $('.choice-field input[type="checkbox"][required="required"]').each(function() {
        $(this).closest('.choice-field').attr("data-required", true)
    })
    $('.choice-field input[type="checkbox"]').change(function() {
        var _req = $(this).closest('.choice-field').attr("data-required")
        if (_req == "true") {
            if ($(this).closest('.choice-field').find('input[type="checkbox"]:checked').length > 0) {
                $(this).closest('.choice-field').find('input[type="checkbox"]').attr('required', false)
            } else {
                $(this).closest('.choice-field').find('input[type="checkbox"]').attr('required', true)
            }
        }
    })
////////////////////////////////////////////////////////////////////
})
 </script>

<script>

    $('.question-item .choice-field').html('')
    var data = $.parseJSON("{{$data}}");
    $(function(){


        $('.question-item').each(function(){
            var item = $(this).attr('data-item')
            if(is_file(data['meta_value']))
            {
                var el = $("<a download>")
                el.attr({
                    href:data['meta_value'];
                })
                el.text(data['meta_value'])
                $(this).find('.choice-field').append(el)
            }
            else
            {
                $(this).find('.choice-field').append(data['meta_value'])
            }

        })



    })
</script>

@endsection

<!-- le programme origine de form-builder ...........................................................................................-->
