<?php
if (!function_exists("is_login")) {
    function is_login()
    {
        if (isset($_SESSION['is_login'])) {
            return true;
        }
        return false;
    }
}



if (!function_exists("user_login")) {
    function user_login()
    {
        if (!empty($_SESSION['user_name'])) {
            return $_SESSION['user_name'];
        }
        return false;
    }
}
