$(document).ready(function () {
    $('input[type="file"]').change(function () {
        var fileName = $(this).val();
        $(".filename").html(fileName);
        $(".btn-file").removeClass('btn-default');
        $(".btn-file").addClass('btn-primary');
    });

    $('#form-register').validate({
        relues: {
            username: {
                required: true,
                minLength: 5
            },
            password: {
                required: true,
                minLength: 6
            },
            password_confirmation:{
                equalTo:'#password',
            },
            email:{
                required:true,
                email: true
            },
        },
        message: {
            username:{
                required:'Vui lòng nhập Username.',
                minLength:"Độ dài ít nhất phải 5 ký tự"
            },
            password:{
                required:'Vui lòng nhập Password.',
                minLength:'Độ dài ít nhất phải 6 ký tự'
            },
            password_confirmation:{
                equalTo:'Mật khẩu không khớp.',
            },
            email:{
                required:'Vui lòng nhập Email.',
                email: 'Email sai định dạng.'
            },
        }
    });
});

