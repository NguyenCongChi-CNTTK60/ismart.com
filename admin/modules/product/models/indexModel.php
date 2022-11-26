<?php
function show_cat()
{
    $sql = "SELECT * FROM tbl_category";
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