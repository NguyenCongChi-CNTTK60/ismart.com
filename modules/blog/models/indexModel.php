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