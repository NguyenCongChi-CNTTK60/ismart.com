<?php
function construct()
{
    load_model('index');
    load('lib', 'validation');
}


function indexAction()
{
    // get title category
    global $cat_title;
    $id = (int)($_GET['cat_id']);
    $cat_title = get_info_cat($id);

    // get info product
    $list_product = get_list_product_by_cat_id($id);
    $data['list_product_cat_id'] = $list_product;
    //show_array($list_product);
    load_view('index', $data);
}

function detailAction()
{  
    global $product;
    global $product_id;
    $product_id = (int)($_GET['product_id']);
    $product = get_product_by_product_id($product_id);
    
    $list_image = get_list_image($product_id); 
    $data['list_image'] = $list_image; 
   // show_array($data);
    load_view('detail',$data);
}
