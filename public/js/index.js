$(document).ready(function () {
    $('#checkbox-all').click(function () {
        $('.check-item').prop('checked', $(this).is(':checked'));
    });

    // // hello sir
    // var d = new Date();
    // var n = d.getHours();
    // // alert(n);
    // $('#messageHello').addClass('show-mess');
    // if (n == 5 || n == 6 || n == 7 || n == 8 || n == 9) {
    //     $('#messageHello').text('Chúc sếp một buổi sáng tốt lành!');
    // }
    // if (n == 10 || n == 11 || n == 12 || n == 13 || n == 14) {
    //     $('#messageHello').text('Trưa rồi sếp hãy nên thư giãn nhé!');
    // }
    // if (n == 15 || n == 16 || n == 17) {
    //     $('#messageHello').text('Chiều mát sếp không đi chơi ở đâu ạ?');
    // }
    // if (n == 18 || n == 19 || n == 20 || n == 21) {
    //     $('#messageHello').text('Một ngày làm việc thật vật vả, sếp hãy chú ý sức khỏe!');
    // }
    // if (n == 22 || n == 23 || n == 24) {
    //     $('#messageHello').text('Muộn rồi sếp hay đi nghỉ ngơi giữ gìn sức khỏe!');
    // }
    // if (n == 1 || n == 2 || n == 3 || n == 4) {
    //     $('#messageHello').text('Sáng sớm không khí trong lành!');
    // }
    // setTimeout(function () {
    //     $('#messageHello').removeClass('show-mess');
    // }, 4000);

    // end hello sir

    // Mess update success
    $('#messageUpdateSuccess').addClass('show-mess');
    setTimeout(function () {
        $('#messageUpdateSuccess').removeClass('show-mess');
    }, 4000);

    //Mess create products success.
    $('#messageProductSuccess').addClass('show-mess');
    setTimeout(function () {
        $('#messageProductSuccess').removeClass('show-mess');
    }, 4000);

    // Mess delete product success.
    $('#messageDeleteSuccess').addClass('show-mess');
    setTimeout(function () {
        $('#messageDeleteSuccess').removeClass('show-mess');
    }, 4000);

    // submit form edit
    $('#btn-update-product').click(function () {
        $("#form-edit").submit();
        // location.reload();
    });


    $('#btn-apply').click(function () {
        switch ($('#select-action').val()) {
            case '0':
                $('#messageError').addClass('show-mess');
                $('#messageError').text('Vui lòng chọn phương thức !');
                setTimeout(function () {
                    $('#messageError').removeClass('show-mess');
                }, 3000);
                break;
            case '1':
                processDelete();
                break;
            case '2':
                processAnother();
                break;
            default:
                break;
        }
    });

    $('.btn-edit').click(function () {
        var id = $(this).closest('.row').attr('id').replace('row-item-', '');
        $.ajax({
            method: 'GET',
            url: '/admin/product/get-json/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content')
            },
            success: function (resp) {
                $('form[name="form-edit"] input[name="name-edit"]').val(resp.item.name);
                $('form[name="form-edit"] input[name="price-edit"]').val(resp.item.price);
                $('.filename').html(resp.item.images);
                $('form[name="form-edit"] input[name="id-product-edit"]').val(resp.item.id);
                $('#review-image').attr('src', '../img/product/' + resp.item.images);
                $('form[name="form-edit"] input[name= "description-edit"]').val(resp.item.description);
                $('form[name="form-edit"] textarea[name="detail-edit"]').html(resp.item.detail);
                $('form[name="form-edit"] input[name="sale-edit"]').val(resp.item.sale);
                var categoryId = resp.item.categoryId;
                $("#categoryId option").each(function () {
                    if ($(this).val() == categoryId)
                        $(this).attr("selected", "selected");
                });
                var collectionId = resp.item.collectionId;
                $("#collectionId option").each(function () {
                    if ($(this).val() == collectionId) {
                        $(this).attr("selected", "selected");
                    }
                });
                var newId = resp.item.new;
                $("#product-new option").each(function () {
                    if ($(this).val() == newId) {
                        $(this).attr("selected", "selected");
                    }
                });
                $('#review-image').removeClass('hidden');
                $('#review-image').addClass('show');
                $('form[name="form-edit"]').attr('action', '/admin/product/' + resp.item.id)
            },
            error: function () {
                alert('error');
            }
        });
        $('#modal-edit').modal();
    });

    $('.close').click(function () {
        $("#categoryId option").removeAttr('selected');
        $("#collectionId option").removeAttr('selected');
    })


    // Form delete one product
    $('.btn-delete').click(function () {
        var id = $(this).attr('id');
        $('#form-delete').attr('action', '/admin/product/' + id);
        $('#modalDelete').modal();
        $('#accept').click(function () {
            $('#form-delete').submit();
        });
    });
    // End form delete one product


    function processDelete() {
        alert(1);
        var arrayId = [];
        $('.check-item:checked').each(function (index, item) {
            arrayId.push(item.closest('.row').id.replace('row-item-', ''));
        });
        // alert(arrayId);
        if (arrayId.length == 0) {
            $('#messageError').addClass('show-mess');
            $('#messageError').text('Vui lòng chọn sản phẩm!');
            setTimeout(function () {
                $('#messageError').removeClass('show-mess');
            }, 3000);
            return;
        }
        alert(arrayId);
        if (confirm('Bạn có muốn xóa sản phẩm đã chọn?')) {
            $.ajax({
                method: 'DELETE',
                url: '/admin/product/delete-all',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'ids': arrayId
                },
                success: function (resp) {
                    for (var i = 0; i < arrayId.length; i++) {
                        $('#row-item-' + arrayId[i]).remove();
                    }
                },
                error: function (data) {
                    alert(data.responseText);
                }
            });
        }
    };

    function processAnother() {
        alert('chức năng đang phát triển.');
    };


    // js input file.
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
        var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
        $(".filename").html(fileName);
        $(".btn-file").removeClass('btn-default');
        $(".btn-file").addClass('btn-primary');
        $('.imgAvatar').removeClass('hidden');
        readURL(this);
    });

    // End input file

    $('#btn-reset').click(function () {
        $(".filename").html('Nothing selected...');
        $(".btn-file").removeClass(' btn-primary');
        $(".btn-file").addClass('btn-default');
        $('#review-image').attr('src', '');
        $('.imgAvatar').addClass('hidden');
    });

    //show image
    $(".showImage").click(function () {
        var bg = $(this).css('background-image');
        bg = bg.replace('url(', '').replace(')', '').replace(/\"/gi, "");
        var modalImg = $('#img01');
        var modal = $('#myModalImage');
        modal.attr('style', 'display:block')
        modalImg.attr('src', bg);

    });
    $('.close-image').click(function () {
        $('#myModalImage').attr('style', 'display:none');
    });
    // end show image
});
