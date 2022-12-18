<?php
function show_cat()
{
    $sql = "SELECT * FROM tbl_category";
    $data = db_fetch_array($sql);
    return $data;
}

function show_product()
{
    $sql = "SELECT product_thumb,price,product_title,date_create,cat_title,supplier_name,number_stock FROM tbl_products INNER JOIN tbl_supplier ON tbl_products.supplier_id = tbl_supplier.supplier_id INNER JOIN tbl_category ON tbl_products.cat_id = tbl_category.cat_id;";
    $data = db_fetch_array($sql);
    return $data;
}

function show_supplier()
{
    $sql = "SELECT * FROM tbl_supplier";
    $data = db_fetch_array($sql);
    return $data;
}


function insert_product($data)
{
    return db_insert('tbl_products', $data);
}

function check_code_product($product_code)
{
    $sql = "SELECT product_code FROM tbl_products WHERE product_code = '$product_code'";
    $data = db_num_rows($sql);
    return $data;
}
