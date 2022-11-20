<?php
function show_order()
{
    $sql = "SELECT * FROM tbl_order INNER JOIN tbl_customer ON tbl_order.customer_id = tbl_customer.customer_id ORDER BY date_create DESC";
    $data = db_fetch_array($sql);
    return $data;
}


function show_detail_order($id)
{
    $sql = "SELECT * FROM tbl_order INNER JOIN tbl_detail_order ON tbl_order.order_id = tbl_detail_order.order_id INNER JOIN tbl_customer ON tbl_order.customer_id = tbl_customer.customer_id INNER JOIN tbl_products ON tbl_detail_order.product_id = tbl_products.product_id INNER JOIN city ON city.city_id = tbl_customer.city_id INNER JOIN district ON district.district_id = tbl_customer.district_id
    INNER JOIN wards ON wards.wards_id = tbl_customer.wards_id WHERE tbl_order.order_id = $id;";
    $data = db_fetch_array($sql);
    return $data;
}


function count_order($custom_id)
{
    $sql = "SELECT count(order_id) as 'total_order' FROM tbl_order WHERE customer_id = $custom_id";
    $data = db_fetch_row($sql);
    return $data;
}
