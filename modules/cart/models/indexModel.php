<?php
function insert_cart($data)
{
    return db_insert('tbl_cart', $data);
}

function update_exit_cart($data, $where)
{
    return db_update('tbl_cart', $data, $where);
}

function update_number_cart($data, $where)
{
    return db_update('tbl_cart', $data, $where);
}


function count_cart()
{
    $sql = "SELECT count(*) as 'num_cart' FROM tbl_cart";
    $data = db_fetch_row($sql);
    return $data;
}

function show_cart()
{
    $sql = "SELECT *,number_cart,(number_cart*price) AS 'thanhtien' FROM tbl_products INNER JOIN tbl_cart ON tbl_products.product_id = tbl_cart.product_id";
    $data = db_fetch_array($sql);
    return $data;
}

function show_cart_row($id)
{
    $sql = "SELECT *,number_cart,(number_cart*price) AS 'thanhtien' FROM tbl_products INNER JOIN tbl_cart ON tbl_products.product_id = tbl_cart.product_id WHERE tbl_cart.product_id = $id";
    $data = db_fetch_row($sql);
    return $data;
}

function get_product_by_product_id($id)
{
    $sql = "SELECT * FROM tbl_products WHERE product_id=$id";
    $data = db_fetch_row($sql);
    return $data;
}


function show_total_cart()
{
    $sql = "SELECT sum(number_cart*price_cart) as 'tongtien' FROM tbl_cart";
    $data = db_fetch_row($sql);
    return $data;
}

function check_exit_cart($id)
{
    $sql = "SELECT * FROM tbl_cart WHERE product_id=$id";
    $data = db_fetch_row($sql);
    return $data;
}

function show_num_cart()
{
    $sql = "SELECT SUM(number_cart) as 'num_cart' FROM tbl_cart";
    $data = db_fetch_row($sql);
    return $data;
}


function delete_cart($id){
    $sql = "DELETE FROM tbl_cart WHERE product_id = $id";
    db_query($sql);
    return true;
}