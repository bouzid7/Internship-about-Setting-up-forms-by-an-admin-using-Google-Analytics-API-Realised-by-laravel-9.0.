
$(function(){
    $('#form-field').prepend("<input type='hidden' name='form_code' value='" + form_code + "'/>")
    
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

