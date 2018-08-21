$(document).ready(function () {
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });
    $('[data-toggle="tooltip"]').tooltip();

    // Mess delete product success.
    $('#messageDeleteCart').addClass('show-mess');
    setTimeout(function () {
        $('#messageDeleteCart').removeClass('show-mess');
    }, 4000);


    $('.btn-delete').each(function () {
        var nameProduct = $(this).parent().parent().find('.name-product').html();
        $(this).click(function () {
            swal({
                title: 'Bạn có chắc muốn xóa?',
                text: nameProduct,
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Đồng ý',
                cancelButtonText: 'Quay lại',
                cancelButtonColor: '#d33',
            }).then((result) => {
                if (result.value) {
                    var rowId = $(this).attr('id')
                    $('form[name = "form-delete"]').attr('action', '/user/delete-cart/' + rowId);
                    $('form[name = "form-delete"]').submit();
                }
            })
        })
    });


});