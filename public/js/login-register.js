$(document).ready(function () {
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                var img = e.target.result
                $('#review-image').attr('src', e.target.result);
                console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('input[type="file"]').change(function () {
        var fileExtension = ['jpeg', 'jpg', 'png', 'gif', 'bmp'];
        if ($.inArray($(this).val().split('.').pop().toLowerCase(), fileExtension) == -1) {
            alert("Chỉ chấp nhận định dạng: " + fileExtension.join(', '));
        } else {
            var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
            $(".filename").html(fileName);
            $(".btn-file").removeClass('btn-default');
            $(".btn-file").addClass('btn-primary');
            $('.imgAvatar').removeClass('hidden');
            readURL(this);
        }

    });

    $('#btn-reset').click(function () {
        $(".filename").html('Nothing selected...');
        $('#review-image').attr('src', '');
        $('.imgAvatar').addClass('hidden');
    });


    // Validate Form
    // Validate username
    $('#username').focusout(function () {
        var value = $(this).val();
        if (value.length < 5 || value.length == null) {
            $('.success-name').addClass('fa-remove');
            $('.success-name').removeClass('hidden');
            $('.success-name').addClass('text-danger');
            $('.success-name').removeClass('text-success');
            $('.success-name').removeClass('fa-check');
            $('#input-username').removeClass('has-success');
            $('#input-username').addClass('has-warning');
            $('#messageNameError').addClass('show');
            $('#messageNameError').removeClass('hidden');
            $('#messageNameError').html('Username không được để null hoặc phải lớn hơn 5 ký tự.');
            $('.success-name').attr('style', '');
            $('.success-name').attr('style', 'line-height: 150%; right: 13px');
        } else {
            $('.success-name').addClass('fa-check');
            $('.success-name').addClass('text-success');
            $('.success-name').removeClass('text-danger');
            $('.success-name').removeClass('fa-remove');
            $('#input-username').removeClass('has-warning');
            $('#input-username').addClass('has-success');
            $('#messageNameError').addClass('hidden');
            $('#messageNameError').removeClass('show');
            $('#messageNameError').html('');
            $('.success-name').removeClass('hidden');
            $('.success-name').attr('style', '');
            $('.success-name').attr('style', 'line-height: 250%; right: 13px');
        }

    });

    // Validate Email
    function validateEmail($email) {
        var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
        return emailReg.test($email);
    }

    $('#email').focusout(function () {
        var value = $(this).val();
        // if (validateEmail(value).length == 0) {
        //     $('.success-email').addClass('fa-remove');
        //     $('.success-email').removeClass('hidden');
        //     $('.success-email').addClass('text-danger');
        //     $('.success-email').removeClass('text-success');
        //     $('.success-email').removeClass('fa-check');
        //     $('#input-email').removeClass('has-success');
        //     $('#input-email').addClass('has-warning');
        //     $('#messageEmailError').html('Email not be null.')
        //     $('#messageEmailError').addClass('show');
        //     $('#messageEmailError').removeClass('hidden');
        //     alert(1);
        // }
        if (validateEmail(value)) {
            $('.success-email').addClass('fa-check');
            $('.success-email').removeClass('hidden');
            $('.success-email').addClass('text-success');
            $('.success-email').removeClass('text-danger');
            $('.success-email').removeClass('fa-remove');
            $('#input-email').removeClass('has-warning');
            $('#input-email').addClass('has-success');
            $('#messageEmailError').html('');
            $('#messageEmailError').addClass('hidden');
            $('#messageEmailError').removeClass('show');
            $('.success-email').attr('style', '');
            $('.success-email').attr('style', 'line-height: 250%; right: 13px');
        }
        else {
            $('.success-email').addClass('fa-remove');
            $('.success-email').removeClass('hidden');
            $('.success-email').addClass('text-danger');
            $('.success-email').removeClass('text-success');
            $('.success-email').removeClass('fa-check');
            $('#input-email').removeClass('has-success');
            $('#input-email').addClass('has-warning');
            $('#messageEmailError').addClass('show');
            $('#messageEmailError').removeClass('hidden');
            $('#messageEmailError').html('Email sai định dạng.')
            $('.success-email').attr('style', '');
            $('.success-email').attr('style', 'line-height: 150%; right: 13px');
        }

        if (value.length < 5 || value.length == null) {
            $('.success-email').addClass('fa-remove');
            $('.success-email').removeClass('hidden');
            $('.success-email').addClass('text-danger');
            $('.success-email').removeClass('text-success');
            $('.success-email').removeClass('fa-check');
            $('#input-email').removeClass('has-success');
            $('#input-email').addClass('has-warning');
            $('#messageEmailError').addClass('show');
            $('#messageEmailError').removeClass('hidden');
            $('#messageEmailError').html('Email không được để null hoặc phải lớn hơn 5 ký tự.')
            $('.success-email').attr('style', '');
            $('.success-email').attr('style', 'line-height: 150%; right: 13px');
        } else {

        }

    });

    // Validate password
    $('#password').focusout(function () {
        var value = $(this).val();
        if (value.length < 5 || value.length == null) {
            $('.success-password').addClass('fa-remove');
            $('.success-password').removeClass('hidden');
            $('.success-password').addClass('text-danger');
            $('.success-password').removeClass('text-success');
            $('.success-password').removeClass('fa-check');
            $('#input-password').removeClass('has-success');
            $('#input-password').addClass('has-warning');
            $('#messagePasswordError').addClass('show');
            $('#messagePasswordError').removeClass('hidden');
            $('#messagePasswordError').html('Password không được để null hoặc phải lớn hơn 5 ký tự.');
            $('.success-password').attr('style', '');
            $('.success-password').attr('style', 'line-height: 150%; right: 13px');
        } else {
            $('.success-password').addClass('fa-check');
            $('.success-password').removeClass('hidden');
            $('.success-password').addClass('text-success');
            $('.success-password').removeClass('text-danger');
            $('.success-password').removeClass('fa-remove');
            $('#input-password').removeClass('has-warning');
            $('#input-password').addClass('has-success');
            $('#messagePasswordError').addClass('hidden');
            $('#messagePasswordError').removeClass('show');
            $('#messagePasswordError').html('');
            $('.success-password').attr('style', '');
            $('.success-password').attr('style', 'line-height: 250%; right: 13px');
        }
    });

    // Validate re-password
    $('#password_confirmation').focusout(function () {
        var value = $(this).val();
        if ($('#password').val() != null) {
            if (value != $('#password').val() || value == 0) {
                $('.success-confirm-password').addClass('fa-remove');
                $('.success-confirm-password').removeClass('hidden');
                $('.success-confirm-password').addClass('text-danger');
                $('.success-confirm-password').removeClass('text-success');
                $('.success-confirm-password').removeClass('fa-check');
                $('#input-re-password').removeClass('has-success');
                $('#input-re-password').addClass('has-warning');
                $('#messageConfirmPasswordError').addClass('show');
                $('#messageConfirmPasswordError').removeClass('hidden');
                $('#messageConfirmPasswordError').html('Password không khớp.');
                $('.success-confirm-password').attr('style', '');
                $('.success-confirm-password').attr('style', 'line-height: 150%; right: 13px');
            } else {
                $('.success-confirm-password').addClass('fa-check');
                $('.success-confirm-password').removeClass('hidden');
                $('.success-confirm-password').addClass('text-success');
                $('.success-confirm-password').removeClass('text-danger');
                $('.success-confirm-password').removeClass('fa-remove');
                $('#input-re-password').removeClass('has-warning');
                $('#input-re-password').addClass('has-success');
                $('#messageConfirmPasswordError').addClass('hidden');
                $('#messageConfirmPasswordError').removeClass('show');
                $('#messageConfirmPasswordError').html('');
                $('.success-confirm-password').attr('style', '');
                $('.success-confirm-password').attr('style', 'line-height: 250%; right: 13px');
            }
        }
    });
});

