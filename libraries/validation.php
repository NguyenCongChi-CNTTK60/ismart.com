
<?php
function is_username($username)
{
    $partten = "/^[A-Za-z0-9_\.@]{6,32}$/";
    if (!preg_match($partten, $username, $maths))
        return false;
    return true;
}

function is_email($email)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return false;
    }
    return true;
}

function is_password($password)
{
    $partten = "/^([A-Z]){1}([\w_\.!@#$%^&*()]+){5,31}$/";
    if (!preg_match($partten, $password, $maths))
        return false;
    return true;
}

function form_error($label_files)
{
    global $error;
    if (!empty($error[$label_files])) return "<p class='error'>{$error[$label_files]}</p>";
}

function set_value($value)
{   // hai $ chuỗi nhận diện biến
    global $$value;
    if (!empty($$value)) return $$value;
}

function redirect($url)
{
    if (!empty($url)) {
        header("Location: {$url}");
    }
}

function format_number($number)
{
    return number_format($number) . "đ";
}

