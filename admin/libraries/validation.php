
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
    if (!empty($error[$label_files])) return "<p class='error' >{$error[$label_files]}</p>";
}

function form_sussess($label_files)
{
    global $sussess;
    if (!empty($sussess[$label_files])) return "<p class='sussess' >{$sussess[$label_files]}</p>";
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


function _toInt($str)
{
    return (int)preg_replace("/([^0-9\\.])/i", "", $str);
}


function get_padding($total_page, $page, $base_url = "")
{
    $str_pagging = "<ul class='pagination'>";
    $next_page = $page + 1;
    if ($page > 1) {
        $pre_page = $page - 1;
    } else {
        $pre_page = 1;
    }
    $str_pagging .= "<li class='page-item'>
                                     <a class='page-link' href='{$base_url}&page={$pre_page}' aria-label='Previous'>
                                         <span aria-hidden='true'>Trước</span>
                                      </a>";


    for ($i = 1; $i <= $total_page; $i++) {
        $active = "";
        if ($page == $i) {
            $active = "active";
        }
        $str_pagging .= "<li class='page-item {$active}'><a class='page-link' href = '{$base_url}&page={$i}'>{$i}</a></li>";
    }
    $str_pagging .= "<li class='page-item'><a class='page-link' href='{$base_url}&page={$next_page}'>»</a></li>";
    $str_pagging .= "</ul>";
    return $str_pagging;
}

// <ul class="pagination">
//                             <li class="page-item">
//                                 <a class="page-link" href="#" aria-label="Previous">
//                                     <span aria-hidden="true">Trước</span>
//                                     <span class="sr-only">Sau</span>
//                                 </a>
//                             </li>
//                             <li class="page-item"><a class="page-link" href="?mod=product&action=index&page=1">1</a></li>
//                             <li class="page-item"><a class="page-link" href="?mod=product&action=index&page=2">2</a></li>
//                             <li class="page-item"><a class="page-link" href="?mod=product&action=index&page=3">3</a></li>
//                             <li class="page-item">
//                                 <a class="page-link" href="#" aria-label="Next">
//                                     <span aria-hidden="true">&raquo;</span>
//                                     <span class="sr-only">Next</span>
//                                 </a>
//                             </li>
//                         </ul>