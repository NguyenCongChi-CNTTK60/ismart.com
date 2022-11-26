<?php
function construct()
{
    load_model('index');
}

function indexAction()
{
    load_view('index');
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

    if (isset($_FILES['file'])) {
        $error = array();
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
        show_array($_POST);
        $data = array(
            'product_code' => $_POST['product']['code'],
            'product_title' => $_POST['product']['name'],
            'price' => $_POST['product']['price'],
            'price_old' => $_POST['product']['price-compare'],
            'discription' => $_POST['product']['post_content_short'],
            'product_thumb' => "admin/$upload_file",
            'product_content' => $_POST['product']['post_content'],
            'cat_id' => $_POST['product']['cat'],
            'supplier_id' => $_POST['product']['sup'],
            'mass' => $_POST['product']['mass'],
            'status' => $_POST['product']['status'],
            'number' => $_POST['product']['num-stock'],
        );
        insert_product($data);
    }
}
