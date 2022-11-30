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
    $list_cat = show_cat();
    $data['list_cat'] = $list_cat;
    $list_sup = show_supplier();
    $data['list_sup'] = $list_sup;
    load_view('addProduct', $data);
}

function saveProductAction()
{
    global $error, $sussess;
    $error = array();
    $sussess = array();

    $t = time();
    if (isset($_FILES['file'])) {
        show_array($_FILES);
        $upload_dir = 'public/uploads/';
        $upload_file = $upload_dir . $_FILES['file']['name'];
        $type_allow = array('png', 'jpg', 'gift', 'jpeg');
        $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
        if (!in_array(strtolower($type), $type_allow)) {
            $error['type'] = 'Chỉ cho phép upload file có đuôi png, jpg, gift, jpeg';
        }
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
            echo "<img src='$upload_file'/>";
            echo "<a href='$upload_file'>Download: {$_FILES['file']['name']}  </a>";
        } else {
            echo 'Upload file không thành công';
        }
    } else {
        show_array($error);
    }



    if (isset($_POST['btn-save'])) {
        if (empty($_POST['product']['name'])) {
            $error['product_name'] = 'Tên sản phẩm không được trống';
        }

        if (empty($error)) {
            $data = array(
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

            show_array($data);

            if (insert_product($data)) {
                redirect("?mod=product&action=addProduct");
                $sussess['product_susess'] = 'Thêm sản phẩm thành công';
            } else {
                $error['product_fails'] = 'Sản phẩm chưa được thêm';
            }
        }
    }
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
