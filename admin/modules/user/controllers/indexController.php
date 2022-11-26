<?php
function construct()
{
    load('lib', 'validation');
    load_model('index');
}


function indexAction()
{
    load_view('login');
}


// tương tác với login
function loginAction()
{
    global $error, $username, $password;
    if (isset($_POST['btn_login'])) {
        $error = array();
        if (empty($_POST['username'])) {
            $error['username'] = 'Tên đăng nhập không được trống.' . " ";
        } else if (!is_username($_POST['username'])) {
            $error['username'] = 'Tên đăng nhập không đúng định dạng.' . " ";
        } else {
            $username = $_POST['username'];
        }

        if (empty($_POST['password'])) {
            $error['password'] = 'Mật khẩu không được trống';
        } else if (!is_password($_POST['password'])) {
            $error['password'] = 'Mật khẩu không đúng định dạng.' . "<p class='error'> Chú ý: 
            <br> * Mật khẩu bắt đầu bằng chữ cái viết hoa <br>
                                                                            * Gồm các ký tự đặt biệt (!@#$%^&*) và chữ số </p>";
        } else {
            $password = $_POST['password'];
        }
    }

    if (empty($error)) {
        if (user_exits($username, md5($password)) == false) {
            $_SESSION['is_login'] = true;
            $_SESSION['user_name'] = $username;
            redirect('?mod=dashboard');
            global $error;
            $error['no_login'] = 'null';
        } else {
            $error['no_login'] = 'Sai tên đăng nhập hoặc mật khẩu';
        }
    }
    load_view('login');
}

// tương tác với reg
function regAction()
{
    global $error, $username, $password, $fullname, $phonenumber;
    if (isset($_POST['btn_reg'])) {
        $error = array();
        // check username/mail
        if (empty($_POST['username'])) {
            $error['username'] = 'Email người dùng không được trống.' . " ";
        } else if (!is_email($_POST['username'])) {
            $error['username'] = 'Email người dùng không đúng định dạng.' . " ";
        } else {
            $username = $_POST['username'];
        }

        // check password
        if (empty($_POST['password'])) {
            $error['password'] = 'Mật khẩu không được trống';
        } else if (!is_password($_POST['password'])) {
            $error['password'] = 'Mật khẩu không đúng định dạng.' . "<p class='error'> Chú ý: 
            <br> * Mật khẩu bắt đầu bằng chữ cái viết hoa <br>
                                                                            * Gồm các ký tự đặt biệt (!@#$%^&*) và chữ số </p>";
        } else {
            $password = $_POST['password'];
        }

        if (empty($_POST['fullname'])) {
            $error['fullname'] = 'Tên người dùng không được trống.' . " ";
        } else {
            $fullname = $_POST['fullname'];
        }

        // check password
        if (empty($_POST['phonenumber'])) {
            $error['phonenumber'] = 'Số điện thoại không được trống';
        } else {
            $phonenumber = $_POST['phonenumber'];
        }

        if (empty($error)) {
            if (user_exits($username, md5($password)) == true) {
                $data = array(
                    'fullname' => $fullname,
                    'phone' => $phonenumber,
                    'email' => $username,
                    'passwords' => md5($password),

                );
                add_users($data);
                redirect('?mod=users&action=login');
            } else {
                $error['exit_user'] = 'Tài khoản hoặc mật khẩu đã tồn tại trong hệ thống';
            }
        }
    }
    load_view('reg');
    // view được load sau, nếu load trước sẽ không xử lý
}


// tương tác với infoAccount


// tương tác với changePass
function changePassAction()
{
    load_view('changePass');
}


function logoutAction()
{
    unset($_SESSION['is_login']);
    unset($_SESSION['user_name']);
    redirect('?mod=users&action=login');
}


function updateAction()
{
    if (isset($_POST['btn-update-user'])) {
        $fullname = $_POST['fullname'];
        $phonenumber = $_POST['phonenumber'];
        $username = $_POST['username'];
        $address = $_POST['address'];
        $email = $_POST['email'];
        $data = array(
            'fullname' => $fullname,
            'phonenumber' => $phonenumber,
            'email' => $email,
            'address' => $address,
        );
        $where = "username='{$username}'";
        update_users($data, $where);
        global $info;
        $info['update'] = 'Bạn vừa cập nhật thành công!';
    }
    $list_user = user_update($_SESSION['user_name']);
    $data['list_user'] = $list_user;
    load_view('infoAcount', $data);
}
