<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
}

function indexAction()
{
    $list_product = show_product();
    $data['list_product'] = $list_product;
    load_view('index', $data);
}

function addProductAction()
{
    global $error, $sussess;
    // Thêm sản phẩm
    $error = array();
    $sussess = array();
    $t = time();

    // khi submit lưu sản phẩm
    if (isset($_POST['btn-save'])) {

        //
        // validation
        //
        if (empty($_POST['product']['name'])) {
            $error['product_name'] = 'Tên sản phẩm không được trống';
        } else {
            global $product_name;
            $product_name = $_POST['product']['name'];
        }

        if (empty($_POST['product']['post_content_short'])) {
            $error['product_content_short'] = 'Mô tả ngắn sản phẩm không được trống';
        } else {
            global $product_content_short;
            $product_content_short = $_POST['product']['post_content_short'];
        }

        if (empty($_POST['product']['post_content'])) {
            $error['product_content_error'] = 'Mô tả sản phẩm không được trống';
        } else {
            global $product_content;
            $product_content = $_POST['product']['post_content'];
        }

        if (empty($_POST['product']['price'])) {
            $error['product_price_error'] = 'Giá sản phẩm không được trống';
        } else {
            global $product_price;
            $product_price = $_POST['product']['price'];
        }

        if (empty($_POST['product']['price-compare'])) {
            $error['product_price_compare_error'] = 'Giá so sánh sản phẩm không được trống';
        } else {
            global $product_price_compare;
            $product_price_compare = $_POST['product']['price-compare'];
        }

        if (empty($_POST['product']['code'])) {
            $error['product_code_error'] = 'Mã sản phẩm không được trống';
        } else {
            global $product_code;
            $product_code = $_POST['product']['code'];
        }

        if (empty($_POST['product']['cat'])) {
            $error['product_cat_error'] = 'Chọn danh mục sản phẩm';
        } else {
            global $product_cat;
            $product_cat = $_POST['product']['cat'];
        }

        if (empty($_POST['product']['sup'])) {
            $error['product_sup_error'] = 'Chọn nhà cung cấp sản phẩm';
        } else {
            global $product_sup;
            $product_sup = $_POST['product']['sup'];
        }

        // xử lý ảnh
        if (isset($_FILES['file'])) {
            $file_error = $_FILES['file']['error'];
            if ($file_error != 0) {
                $error['empty_pic'] = 'Chọn ảnh sản phẩm';
            } else {
                $upload_dir = 'public/uploads/';
                $upload_file = $upload_dir . $_FILES['file']['name'];
                $type_allow = array('png', 'jpg', 'gift', 'jpeg');
                $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                if (!in_array(strtolower($type), $type_allow)) {
                    $error['type'] = 'Chỉ cho phép upload file có đuôi png, jpg, gift, jpeg';
                }


                if (file_exists($upload_file)) {
                    $error['file_exits'] = 'File ảnh đã tồn tại trên hệ thống';
                }

                $file_size = $_FILES['file']['size'];
                if ($file_size > 29000000) {
                    $error['file_size'] = 'Chỉ cho phép upload file < 20MB';
                }

                if (empty($error)) {
                    if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                        // echo "<img src='$upload_file'/>";
                        // echo "<a href='$upload_file'>Download: {$_FILES['file']['name']}  </a>";
                    } else {
                        $error['upload_fails'] =  'Upload file không thành công';
                    }
                } else {
                    // show_array($error);
                }
            }
        }

        $num_row_code = check_code_product($_POST['product']['code']);

        if ($num_row_code <= 0) {
        } else {
            $error['code_exit'] =  'Mã sản phẩm đã tồn tại';
        }

        if (empty($error)) {
            $data1 = array(
                'product_code' => $_POST['product']['code'],
                'product_title' => $_POST['product']['name'],
                'price' =>  _toInt($_POST['product']['price']),
                'price_old' => _toInt($_POST['product']['price-compare']),
                'discription' => $_POST['product']['post_content_short'],
                'product_thumb' => "$upload_file",
                'product_content' => $_POST['product']['post_content'],
                'cat_id' => $_POST['product']['cat'],
                'supplier_id' => $_POST['product']['sup'],
                'mass' => $_POST['product']['mass'],
                'status' => $_POST['product']['status'],
                'number_stock' => $_POST['product']['num-stock'],
                'date_create' => $t,
            );

            if (insert_product($data1)) {
                //  redirect("?mod=product&action=addProduct");
                $sussess['add_product_susess'] = 'Sản phẩm đã được tạo thành công';
            } else {
                $error['product_fails'] = 'Sản phẩm chưa được thêm';
            }
        }
    }

    $list_cat = show_cat();
    $data['list_cat'] = $list_cat;
    $list_sup = show_supplier();
    $data['list_sup'] = $list_sup;

    load_view('addProduct', $data);
}




function formatPriceAction()
{
    $num = $_POST['price'];
    $data = array(
        'price_change' => format_number($num),
    );
    echo json_encode($data);
}


function formatComparePriceAction()
{
    $num = $_POST['price'];
    $data = array(
        'price_change' => format_number($num),
    );
    echo json_encode($data);
}
