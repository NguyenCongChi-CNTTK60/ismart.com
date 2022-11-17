$(document).ready(function() {
    $(".city").change(function() {
        var id = $(".city").val();
        var data = { id: id };
        //   console.log(data);
        $.ajax({
            url: 'http://localhost/unitop/back-end/project-1/ismart.com/?mod=checkout&action=process', //trang xử lý
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function(data) {
                $(".district").html(data);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        });

    });
});


$(document).ready(function() {
    $(".district").change(function() {
        var id = $(".district").val();
        var data = { id: id };
        $.ajax({
            url: 'http://localhost/unitop/back-end/project-1/ismart.com/?mod=checkout&action=processWards', //trang xử lý
            method: 'POST',
            data: data,
            dataType: 'text',
            success: function(data) {
                $(".wards").html(data);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        });
    });
});

$(document).ready(function() {
    $(".cart").change(function() {
        var id = $(this).attr('data-id');
        var number = $(this).val();
        var data = { product_id: id, num_change: number };
        $.ajax({
            url: 'http://localhost/unitop/back-end/project-1/ismart.com/?mod=cart&action=updateCart', //trang xử lý
            method: 'POST',
            data: data,
            dataType: 'json',
            success: function(data) {
                $("#sub-total-" + id).text(data.sub_total);
                $("#total-price span").text(data.total);
                $(".num-order").text(data.num_cart);
            },
            error: function(xhr, ajaxOptions, throwError) {
                alert(xhr.status);
                alert(throwError);
            }
        });
    });
});

$(document).ready(function() {
    $('.del-product').click(function(e) {
        e.preventDefault();
        var id = $(this).attr('data-id');
        var data = { product_id: id };
        const swalWithBootstrapButtons = Swal.mixin({
            customClass: {
                confirmButton: 'btn btn-success',
                cancelButton: 'btn btn-danger'
            },
            buttonsStyling: false
        })

        swalWithBootstrapButtons.fire({
            title: 'Xóa sản phẩm',
            text: "Bạn có chắc chắn muốn xóa sản phẩm đã chọn!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonText: 'Xác nhận',
            cancelButtonText: 'Hủy',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: 'http://localhost/unitop/back-end/project-1/ismart.com/?mod=cart&action=shownumOrder', //trang xử lý
                    method: 'POST',
                    data: data,
                    dataType: 'json',
                    success: function(data) {
                        $(".num-order").text(data.num_cart);
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status);
                        alert(throwError);
                    }
                });
                $.ajax({
                    url: 'http://localhost/unitop/back-end/project-1/ismart.com/?mod=cart&action=deleteCart', //trang xử lý
                    method: 'POST',
                    data: data,
                    dataType: 'text',
                    success: function(data) {
                        $(".delete_cart").html(data);
                    },
                    error: function(xhr, ajaxOptions, throwError) {
                        alert(xhr.status);
                        alert(throwError);
                    }
                });

            } else if (
                /* Read more about handling dismissals below */
                result.dismiss === Swal.DismissReason.cancel
            ) {

            }
        })
    });
});





/* 
1. đẩy dữ liệu từ form lên ajax
2. chuyển ajax lên server
3. từ server về ajax
4. từ ajax về form hiển thị người dùng
*/