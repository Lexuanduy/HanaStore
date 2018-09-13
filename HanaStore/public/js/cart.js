$(document).ready(function () {
    $(".selection-1").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect1')
    });

    $(".selection-2").select2({
        minimumResultsForSearch: 20,
        dropdownParent: $('#dropDownSelect2')
    });


    // Mess delete product success.
    $('#messageDeleteCart').addClass('show-mess');
    setTimeout(function () {
        $('#messageDeleteCart').removeClass('show-mess');
    }, 4000);

    // Mess delete product success.
    $('#messageOrderCart').addClass('show-mess');
    setTimeout(function () {
        $('#messageOrderCart').removeClass('show-mess');
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
                cancelButtonColor: '#dd5f30',
            }).then((result) => {
                if (result.value) {
                    var rowId = $(this).attr('id')
                    $('form[name = "form-delete"]').attr('action', '/user/delete-cart/' + rowId);
                    $('form[name = "form-delete"]').submit();
                }
            })
        })
    });

    $('.btn-num').click(function () {
        var qty = $(this).parent().find('.qty').val();
        var rowId = $(this).parent().parent().parent().find('.btn-delete').attr('id');
        var isThis = $(this);
        $.ajax({
            type: 'GET',
            url: '/user/update-product-cart/'+ rowId +'/' + qty,
            cache: false,
            data:{
                '_token': $('meta[name="csrf-token"]').attr('content'),
                'rowId' : rowId,
                'qty': qty
            },
            success:function (data) {
                isThis.parent().parent().parent().find('.price').html(data.totalPrice);
                $(document).find('.totalPriceOrder').html(data.totalCart + ' vnđ');
            },
            error:function() {

            }
        });
    });

    $('.btn-order').click(function (e) {
        e.preventDefault();
        $('#modalSocia').modal();
    });
});