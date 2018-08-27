$(document).ready(function () {
    $('.add-to-cart').click(function () {
        var parent = $(this).parent().parent().parent();
        var src = parent.find('img').attr('src');
        var parTop = parent.offset().top;
        var parLeft = parent.offset().left;
        var cart = $(document).find('#cart-icon-header');
        $('<img/>',{
            class: 'img-fly',
            src: src
        }).appendTo('body').css({
            'top'  :  parTop + 5,
            'left' :  parLeft + parent.width() - 60
        });
        $('html').addClass('disable-scoll');
        setTimeout(function () {
            $(document).find('.img-fly').css({
                'top'  : cart.offset().top,
                'left' : cart.offset().left
            });
            setTimeout(function () {
                $(document).find('.img-fly').remove();
                $('html').removeClass('disable-scoll');
            },1000)
        }, 500);
        var id = $(this).attr('id').replace('add-cart-', '');
        $.ajax({
            url: '/user/add-cart/'+ id,
            method: 'post',
            data:{
                _token: $('meta[name="csrf-token"]').attr('content')
            },
            success:function (data) {
                var new_count = data.count;
                var new_total_money = String(data.total);
                var new_cart = data.cart;
                var content = '';
                for (var i in new_cart) {
                    content+='<li class="header-cart-item bo10">'+
                        '<div class="header-cart-item-img">'+
                        '<img src="http://localhost:8000/img/product/' + new_cart[i].options.img + '" alt="IMG-PRODUCT-CART">'+
                        '</div>'+
                        '<div class="header-cart-item-txt">'+
                        '<a href="#" class="header-cart-item-name">'+
                        new_cart[i].name +
                        '</a>'+
                        '<span class="header-cart-item-info">'+
                        new_cart[i].qty + 'x' + new_cart[i].price +
                        '</span>'+
                        '</div>'+
                        '</li>'
                }
                $('#header-cart-wrapitem').html(content);
                $('#header-icons-noti').text(new_count);
                $('#header-cart-total').text('Tổng tiền: ' +new_total_money+' vnđ');
            },
            error:function (msg) {

            }
        })
    });
});