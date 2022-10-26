<?php
function get_info_cat($id)
{
    $sql = "SELECT cat_title FROM tbl_category WHERE cat_id = $id";
    $data = db_fetch_row($sql);
    return $data;
}

function get_list_product_by_cat_id($id)
{
    $sql = "SELECT * FROM tbl_products INNER JOIN tbl_category ON tbl_products.cat_id = tbl_category.cat_id WHERE tbl_products.cat_id=$id";
    $data = db_fetch_array($sql);
    return $data;
}

function get_product_by_product_id($id)
{
    $sql = "SELECT * FROM tbl_products WHERE product_id=$id";
    $data = db_fetch_row($sql);
    return $data;
}


function get_list_image($id){
    $sql = "SELECT image_normal,image_zoom,image_no_zoom FROM tbl_image_products INNER JOIN tbl_products ON tbl_image_products.product_id = tbl_products.product_id WHERE tbl_image_products.product_id = $id";
    $data = db_fetch_array($sql);
    return $data;
}