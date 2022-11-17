<?php
function show_cart()
{
    $sql = "SELECT *,number_cart,(number_cart*price) AS 'thanhtien' FROM tbl_products INNER JOIN tbl_cart ON tbl_products.product_id = tbl_cart.product_id";
    $data = db_fetch_array($sql);
    return $data;
}

function show_total_cart()
{
    $sql = "SELECT sum(number_cart*price_cart) as 'tongtien' FROM tbl_cart";
    $data = db_fetch_row($sql);
    return $data;
}

function select_all_city()
{
    $sql = "SELECT * FROM city";
    $data = db_fetch_array($sql);
    return $data;
}

function select_all_district($id)
{
    $sql = "SELECT * FROM district WHERE city_id = $id";
    $data = db_fetch_array($sql);
    return $data;
}

function select_all_wards($id)
{
    $sql = "SELECT * FROM wards WHERE district_id = $id";
    $data = db_fetch_array($sql);
    return $data;
}

function show_custom_id($phone)
{
    $sql = "SELECT customer_id  FROM tbl_customer WHERE phone = $phone";
    $data = db_fetch_row($sql);
    return $data;
}

function show_order_id($t)
{
    $sql = "SELECT order_id  FROM tbl_order WHERE date_create = $t";
    $data = db_fetch_row($sql);
    return $data;
}

function check_custom_exit($phone)
{
    $sql = "SELECT customer_id  FROM tbl_customer WHERE phone = $phone";
    $data = db_num_rows($sql);
    return $data;
}

function delete_all_cart()
{
    $sql = "DELETE FROM tbl_cart";
    db_query($sql);
    return true;
}

function insert_customer($data)
{
    return db_insert('tbl_customer', $data);
}

function insert_order($data)
{
    return db_insert('tbl_order', $data);
}

function insert_detail_order($data)
{
    return db_insert('tbl_detail_order', $data);
}
