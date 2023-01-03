<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
}


function indexAction()
{
    // get title category
    global $cat_title, $cat_id;
    $cat_id = (int)($_GET['cat_id']);
    $cat_title = get_info_cat($cat_id);

    // get info product
    $list_product = get_list_product_by_cat_id($cat_id);
    $data['list_product_cat_id'] = $list_product;

    $data['list_cat'] = show_cat();
    //show_array($list_product);
    load_view('index', $data);
}

function detailAction()
{
    global $product, $product_id;
    $product_id = (int)($_GET['product_id']);
    $product = get_product_by_product_id($product_id);
    $list_image = get_list_image($product_id);
    $data['list_image'] = $list_image;
    $data['list_cat'] = show_cat();
    // show_array($data);
    load_view('detail', $data);
}


// lọc giá
function price_descAction()
{
    // get title category
    global $cat_title, $cat_id;
    $cat_id = (int)($_GET['cat_id']);
    $cat_title = get_info_cat($cat_id);

    // get info product
    $list_product = get_list_product_price_desc($cat_id);
    $data['list_product_cat_id'] = $list_product;

    $data['list_cat'] = show_cat();
    //show_array($list_product);
    load_view('index', $data);
}


function priceAction()
{
    // get title category
    global $cat_title, $cat_id;
    $cat_id = (int)($_GET['cat_id']);
    $cat_title = get_info_cat($cat_id);

    // get info product
    $list_product = get_list_product_price($cat_id);
    $data['list_product_cat_id'] = $list_product;

    $data['list_cat'] = show_cat();
    //show_array($list_product);
    load_view('index', $data);
}