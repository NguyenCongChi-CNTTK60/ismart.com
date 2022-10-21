<?php

function add_users($data)
{
    return db_insert('tbl_users', $data);
}

function update_users($data, $where)
{
    return db_update('tbl_users', $data, $where);
}

function user_exits($username, $password)
{
    $sql = "SELECT username,passwords FROM tbl_users WHERE username='{$username}' and passwords ='{$password}'";
    $check_user = db_num_rows($sql);
    if ($check_user > 0) {
        return false;
    }
    return true;
}

function user_update($username)
{
    $sql = "SELECT * FROM tbl_users WHERE username = '{$username}'";
    $temp =  db_fetch_array($sql);
    return $temp;
}
