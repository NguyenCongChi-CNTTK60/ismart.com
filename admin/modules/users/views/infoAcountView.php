<?php get_header(); ?>
<div id="main-content-wp" class="info-account-page">
    <div class="section" id="title-page">
        <div class="clearfix">
            <a href="?page=add_cat" title="" id="add-new" class="fl-left">Thêm mới</a>
            <h3 id="index" class="fl-left">Cập nhật tài khoản</h3>
        </div>
    </div>
    <div class="wrap clearfix">
        <div id="sidebar" class="fl-left">
            <ul id="list-cat">
                <li>
                    <a href="?mod=users&action=changePass" title="">Đổi mật khẩu</a>
                </li>
                <li>
                    <a href="?mod=users&controller=team" title="">Nhóm quản trị</a>
                </li>
                <li>
                    <a href="?mod=users&action=info" title="">Cập nhật thông tin</a>
                </li>
                <li>
                    <a href="?page=list_post" title="">Thoát</a>
                </li>
            </ul>
        </div>
        <div id="content" class="fl-right">
            <div class="section" id="detail-page">
                <div class="section-detail">
                    <?php if (!empty($list_user)) {
                        foreach ($list_user as $user) {
                    ?>
                            <form action="" method="POST">
                                <p class="error">
                                    <?php global $info;
                                    if (!empty($info)) echo $info['update']; ?>
                                </p>
                                <label for="display-name">Tên hiển thị</label>
                                <input type="text" name="fullname" id="display-name" value="<?php echo $user['fullname']; ?>">
                                <label for="username">Tên đăng nhập</label>
                                <input type="text" name="username" id="username" placeholder="admin" readonly="readonly" value="<?php echo $user['username']; ?>">
                                <label for="email">Email</label>
                                <input type="email" name="email" id="email" value="<?php echo $user['email']; ?>">
                                <label for=" tel">Số điện thoại</label>
                                <input type="tel" name="phonenumber" id="tel" value="<?php echo $user['phonenumber']; ?>">
                                <label for=" address">Địa chỉ</label>
                                <textarea name="address" id="address"><?php echo $user['address']; ?></textarea>
                                <button type="submit" name="btn-update-user" id="btn-submit">Cập nhật</button>
                            </form>
                    <?php }
                    } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>