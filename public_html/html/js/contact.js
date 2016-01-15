$(function(){
    $('#inq_o').on('click', function(){
        if($(this).is(':checked')){
            $('#contact-inq_other_text').prop('disabled', false);
        }else {
            $('#contact-inq_other_text').prop('disabled', true);
        }
    });
});

$().ready(function() {
    var form_valid = $('#contact-form');

    form_valid.validate({
        rules: {
            'company': {
                required: true
            },
            'ur_name': {
                required: true
            },
            'email': {
                required: true,
                email: true
            },
            'tel': {
                required: true
            },
            'itemSelect': {
                required: true
            },
            'content': {
                required: true
            }
        },
        messages: {
            'company': '入力してください',
            'ur_name': '入力してください',
            'email': '入力してください',
            'tel': '入力してください',
            'itemSelect': '入力してください',
            'content': '入力してください'
        },
        submitHandler: function(form) {
            form.submit();
            return false;
        }
    });
});