<?php
function insert_cart($data)
{
    return db_insert('tbl_cart', $data);
}

function count_cart(){
    $sql = "SELECT count(*) as 'num_cart' FROM tbl_cart";
    $data = db_fetch_row($sql);
    return $data;
}

function show_cart(){
    $sql = "SELECT *,number_cart,(number_cart*price) AS 'thanhtien' FROM tbl_products INNER JOIN tbl_cart ON tbl_products.product_id = tbl_cart.product_id";
    $data = db_fetch_array($sql);
    return $data;
}

function get_product_by_product_id($id)
{
    $sql = "SELECT * FROM tbl_products WHERE product_id=$id";
    $data = db_fetch_row($sql);
    return $data;
}
