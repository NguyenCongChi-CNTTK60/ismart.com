<?php 
  
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;1,100;1,300;1,400;1,700&amp;family=Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="public/css/all.css">
    <link rel="stylesheet" href="public/css/login.css">
    <title>Login</title>
</head>

<body>
    <div id="wrapper">
        <form action="" method="POST">
            <h2>ĐĂNG NHẬP HỆ THỐNG</h2>
            <div class="text_style txt_username">
                <input type=" text " name="username" placeholder="Tên đăng nhập" value="<?php echo set_value('username'); ?>">
                <?php echo form_error('username'); ?>
            </div>
            <div class="text_style txt_passwords">
                <input type="password" name="password" placeholder="Mật khẩu" value="<?php echo set_value('password'); ?>">
                <?php echo form_error('password'); ?>
                <?php echo form_error('no_login'); ?>
            </div>
            <div class="button_style">
                <input type="submit" name="btn_login" value="Đăng nhập">
            </div>
            <div class="remeber_pass">
                <input type="checkbox" id="remeber_pass" name="remember_me" value=" ">
                <label for="remeber_pass"> Ghi nhớ tài khoản </label>
            </div>
            <div class="lable_forgot_pass">
                <label for=""><a href="">Bạn quên mật khẩu?</a></label>
            </div>
            <div class="lable_forgot_pass">
                <label for="">Bạn chưa có tài khoản:<a href="?mod=users&action=reg"> Đăng ký</a></label>
            </div>
        </form>
    </div>
</body>

</html>