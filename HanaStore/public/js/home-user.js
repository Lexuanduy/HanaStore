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
            url: '/hanastore/add-cart/'+ id,
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
                        '<img src="' + new_cart[i].options.img + '" alt="IMG-PRODUCT-CART">'+
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
                $('#header-cart-total').text('Tổng tiền: '+ new_total_money + ' vnđ');
            },
            error:function (msg) {

            }
        })
    });

    $('select[name="filter-price"]').change(function () {
        switch ($(this).val()) {
            case '0':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/0/100000000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0) {
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price - (product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('');
                            $('#pagination').removeClass('cus-hidden');
                        } else {
                            $('#product-list-filter').html('Không có sản phẩm nào!');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!')
                    }
                });
                break;
            case '1':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/0/50000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0){
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price - (product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('Giá: 0 ~ 50.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        } else{
                            $('#product-list-filter').html('Không có sản phẩm nào với Giá từ 0 ~ 50.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!');
                    }
                });
                break;
            case '2':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/50000/100000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0) {
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price -(product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('Giá: 50.000 ~ 100.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        } else {
                            $('#product-list-filter').html('Không có sản phẩm nào với Giá từ 50.000 ~ 100.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!')
                    }
                });
                break;
            case '3':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/100000/150000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0) {
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price - (product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('Giá: 100.000 ~ 150.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        } else {
                            $('#product-list-filter').html('Không có sản phẩm nào với Giá từ 100.000 ~ 150.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!')
                    }
                });
                break;
            case '4':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/150000/200000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0) {
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price - (product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('Giá: 150.000 ~ 200.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        } else {
                            $('#product-list-filter').html('Không có sản phẩm nào với Giá từ 150.000 ~ 200.000 vnđ');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!')
                    }
                });
                break;
            case '5':
                $.ajax({
                    method: 'GET',
                    url: '/hanastore/api/product-filter/200000/100000000',
                    data: {
                        '_token': $('meta[name="csrf-token"]').attr('content'),
                    },
                    success: function (resp) {
                        var content = '';
                        var product = resp.listProduct;
                        if (resp.count !== 0) {
                            for (var i in product) {
                                content += '<div class="col-sm-12 col-md-6 col-lg-4 p-b-50">' +
                                    '<div class="block2">' +
                                    '<div class="block2-img wrap-pic-w img-product-home of-hidden pos-relative">' +
                                    '<img src="' + product[i].images + '" alt="IMG-PRODUCT" style = "height:350px;object-fit: cover;">' +
                                    '<div class="block2-overlay trans-0-4">' +
                                    '<a href="#" class="block2-btn-addwishlist hov-pointer trans-0-4">' +
                                    '<i class="icon-wishlist icon_heart_alt" aria-hidden="true"></i>' +
                                    '<i class="icon-wishlist icon_heart dis-none" aria-hidden="true"></i>' +
                                    '</a>' +
                                    '<div class="block2-btn-addcart w-size1 trans-0-4 add-to-cart" id="add-cart-' + product[i].id + '">' +
                                    '<button class="flex-c-m size1 bg4 bo-rad-23 hov1 s-text1 trans-0-4">' +
                                    'Thêm vào giỏ' +
                                    '</button>' +
                                    '</div>' +
                                    '</div>' +
                                    '</div>' +
                                    '<div class="block2-txt p-t-20">' +
                                    '<a href="/hanastore/product/' + product[i].id + '" class="block2-name dis-block s-text3 p-b-5">' +
                                    product[i].name +
                                    '</a>';
                                if (parseInt(product[i].sale) === 0) {
                                    content += '<span class="block2-price m-text6 p-r-5">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>';
                                }
                                else {
                                    content += '<span class="block2-price m-text6 p-r-5 text-decoration">' +
                                        product[i].price + ' (vnđ)' +
                                        '</span>' +
                                        '<span class="block2-sale m-text6 p-r-5" style="color: #F8A300">' +
                                        (product[i].price - (product[i].price * product[i].sale / 100)) + ' (vnđ)' +
                                        '</span>'
                                }
                                content += '</div>' +
                                    '</div>' +
                                    '</div>';
                                if (parseInt(product[i].sale) !== 0 && parseInt(product[i].new) !== 1) {
                                    $('.img-product-home').addClass('block2-labelsale');
                                } else if (product[i].sale === 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').addClass('block2-labelnew');
                                } else if (product[i].sale !== 0 && product[i].new === 1) {
                                    $('.img-product-home').removeClass('block2-labelsale');
                                    $('.img-product-home').removeClass('block2-labelnew');
                                    $('.img-product-home').addClass('block2-labelsaleandnew');
                                }
                            }
                            $('#product-list-filter').html(content);
                            $('#show-name-filter').html('Giá: 200.000 vnđ trở lên!');
                            $('#pagination').addClass('cus-hidden');
                        } else {
                            $('#product-list-filter').html('Không có sản phẩm nào với Giá từ 200.000 vnđ trở lên!');
                            $('#pagination').addClass('cus-hidden');
                        }
                    },
                    error: function () {
                        alert('a á à à a ~~~~ Lỗi rồi!')
                    }
                });
                break;
        }
    });
});
