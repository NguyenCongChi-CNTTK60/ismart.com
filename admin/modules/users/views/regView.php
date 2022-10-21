<?php
// thiết kế giao diện và chuẩn hóa form
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/login.css">
    <link rel="stylesheet" href="public/css/all.css">
    <title>Register</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="POST">
            <h2>ĐĂNG KÝ HỆ THỐNG</h2>
            <div class="text_style txt_fullname">
                <input type=" text " name="fullname" placeholder="Tên người dùng" value="<?php echo set_value('fullname'); ?>">
                <?php echo form_error('fullname'); ?>
            </div>
            <div class="text_style txt_phone">
                <input type=" text " name="phonenumber" placeholder="Số điện thoại" value="<?php echo set_value('phonenumber'); ?>">
                <?php echo form_error('phonenumber'); ?>
            </div>
            <div class="text_style txt_username">
                <input type=" text " name="username" placeholder="Email người dùng" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('username'); ?>
            </div>
            <div class="text_style txt_passwords">
                <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo set_value('password'); ?>">
                <?php echo form_error('password'); ?>
                <?php echo form_error('exit_user'); ?>
            </div>
            <div class="button_style">
                <input type="submit" name="btn_reg" value="Đăng ký">
            </div>
            <div class="lable_forgot_pass">
                <label for=""><a href="?mod=users&action=login">Đăng nhập</a></label>
            </div>
        </form>
    </div>
</body>

</html>