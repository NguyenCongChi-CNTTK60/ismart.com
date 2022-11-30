$(document).ready(function() {
    $('.nav-link.active .sub-menu').slideDown();
    // $("p").slideUp();

    $('#sidebar-menu .arrow').click(function() {
        $(this).parents('li').children('.sub-menu').slideToggle();
        $(this).toggleClass('fa-angle-right fa-angle-down');
    });

    $("input[name='checkall']").click(function() {
        var checked = $(this).is(':checked');
        $('.table-checkall tbody tr td input:checkbox').prop('checked', checked);
    });
});

$(document).ready(function() {
    var input = document.getElementById('show-detail-order');
    input.onclick = function() {
        alert('Xem chi tiết');
    };
});

$(document).ready(function() {
    var input = document.getElementById('hide-detail-order');
    input.onclick = function() {
        alert('Ẩn chi tiết');
    };
});


$(document).ready(function() {
    $(".price").change(function() {
        var number = $(this).val();
        var data = { price: number };
        $.ajax({
            url: 'http://localhost/unitop/back-end/project-1/ismart.com/admin/?mod=product&action=formatPrice', //trang xử lý
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $("#product-price").val(data.price_change);
            },
            // error: function(xhr, ajaxOptions, throwError) {
            //     alert(xhr.status);
            //     alert(throwError);
            // }
        });
    });
});

$(document).ready(function() {
    $(".price-compare").change(function() {
        var number = $(this).val();
        var data = { price: number };
        $.ajax({
            url: 'http://localhost/unitop/back-end/project-1/ismart.com/admin/?mod=product&action=formatComparePrice', //trang xử lý
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $("#product-price-compare").val(data.price_change);
            },
            // error: function(xhr, ajaxOptions, throwError) {
            //     alert(xhr.status);
            //     alert(throwError);
            // }
        });
    });
});