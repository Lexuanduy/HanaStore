$(document).ready(function () {
    $('#checkbox-all').click(function () {
        $('.check-item').prop('checked', $(this).is(':checked'));
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
                $('form[name="form-edit"] input[name="name"]').val(resp.item.name);
                $('form[name="form-edit"] input[name="price"]').val(resp.item.price);
                $('form[name="form-edit"] input[name="images"]').val(resp.item.images);
                $('form[name="form-edit"] input[name="id-product-edit"]').val(resp.item.id);
            },
            error: function () {
                alert('error');
            }
        });
        $('#modal-edit').modal();
    });

    $('#btn-update-product').click(function () {
        var name = $('form[name="form-edit"] input[name="name"]').val();
        var price = $('form[name="form-edit"] input[name="price"]').val();
        var images = $('form[name="form-edit"] input[name="images"]').val();
        var id = $('form[name="form-edit"] input[name="id-product-edit"]').val();
        var status = $('form[name="form-edit"] select[name="status"] option:checked').attr('id');
        $.ajax({
            url: '/admin/product/update-json/' + id,
            method: 'PUT',
            data: 'name=' + name + '&price=' + price + '&images=' + images + '&status=' + status + '&_token=' + $('meta[name="csrf-token"]').attr('content'),
            success: function (resp) {
                $('#messageSuccess').addClass('show-mess');
                $('#messageSuccess').text('Sửa thành công!');
                setTimeout(function () {
                    $('#messageSuccess').removeClass('show-mess');
                }, 3000);

            },
            error: function () {
                alert('Error');
            }
        })
    });


    function processDelete() {
        var arrayId = [];
        $('.check-item:checked').each(function (index, item) {
            arrayId.push(item.closest('.row').id.replace('row-item-', ''));
        })
        if (arrayId.length == 0) {
            $('#messageError').addClass('show-mess');
            $('#messageError').text('Vui lòng chọn sản phẩm!');
            setTimeout(function () {
                $('#messageError').removeClass('show-mess');
            }, 3000);
            return;
        }
        if (confirm('Bạn có muốn xóa sản phẩm đã chọn?')) {
            $.ajax({
                method: 'DELETE',
                url: '/admin/product/destroy-many',
                data: {
                    '_token': $('meta[name="csrf-token"]').attr('content'),
                    'ids': arrayId
                },
                success: function (resp) {
                    $('#messageSuccess').addClass('show-mess');
                    $('#messageSuccess').text('Xóa thành công!');
                    setTimeout(function () {
                        $('#messageSuccess').removeClass('show-mess');
                    }, 3000);
                    for (var i = 0; i < arrayId.length; i++) {
                        $('#row-item-' + arrayId[i]).remove();
                    }
                    if ($('.check-item').length == 0) {
                        setTimeout(function () {
                            window.location.reload(1);
                        }, 3 * 1000);
                    }
                },
                error: function () {
                    $('#messageError').addClass('show-mess');
                    $('#messageError').text('Xóa không thành công!');
                    setTimeout(function () {
                        $('#messageError').removeClass('show-mess');
                    }, 3000);
                }
            });
        }
    };

    function processAnother() {
        $('#messageSuccess').addClass('show-popup');
        $('#messageSuccess').text('Notthing! Ngạc nhiên chưa ^.^');
        $('#messageSuccess').attr('style', 'color:#761c19')
        setTimeout(function () {
            $('#snackbar').removeClass('show-popup');
        }, 3000);
    };

    $('.btn-delete').click(function () {
        var id = $(this).attr('id');
        $.ajax({
            method: 'POST',
            url: '/admin/product/destroy/' + id,
            data: {
                '_token': $('meta[name="csrf-token"]').attr('content'),
            },
            success: function () {
                $('#messageSuccess').addClass('show-mess');
                $('#messageSuccess').text('Xóa thành công!');
                setTimeout(function () {
                    $('#messageSuccess').removeClass('show-mess');
                }, 3000);
            },
            error: function () {
                $('#messageError').addClass('show-mess');
                $('#messageError').text('Xóa không thành công!');
                setTimeout(function () {
                    $('#messageError').removeClass('show-mess');
                }, 3000);
            }
        })
    });

    // js input file.
    function readURL(input) {

        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                var img = e.target.result
                $('#review-image').attr('src', e.target.result);
                console.log(e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }


    $('input[type="file"]').change(function(){
        var fileName = $(this).val().replace(/C:\\fakepath\\/i, '');
        $(".filename").html(fileName);
        $(".btn-file").removeClass('btn-default');
        $(".btn-file").addClass('btn-primary');
        $('.imgAvatar').removeClass('hidden');
        readURL(this);
    });

    $('#btn-reset').click(function () {
        $(".filename").html('Nothing selected...');
        $(".btn-file").removeClass(' btn-primary');
        $(".btn-file").addClass('btn-default');
        $('#review-image').attr('src', '');
        $('.imgAvatar').addClass('hidden');
    });

    // hello sir
    var d = new Date();
    var n = d.getHours();
    // alert(n);
    $('#messageHello').addClass('show-mess');
    if (n<=9){
        $('#messageHello').text('Chúc sếp một buổi sáng tốt lành!');
    }else if(9<n<=14){
        $('#messageHello').text('Trưa rồi sếp đừng để đầu căng thẳng nhé!');
    }else if (14<n<=17){
        $('#messageHello').text('Chiều mát sếp không đi chơi ở đâu ạ?');
    }else if (17<n<=22){
        $('#messageHello').text('Một ngày làm việc thật vật vả, sếp hãy chú ý sức khỏe!');
    }else if (4>=n>22){
        $('#messageHello').text('Muộn rồi sếp hay đi nghỉ ngơi giữ gìn sức khỏe!');
    }else if (4<n<=9){
        $('#messageHello').text('Sáng sớm không khí trong lành!');
    }
    setTimeout(function () {
        $('#messageHello').removeClass('show-mess');
    }, 4000);
    // end hello sir

});
