<?php get_header(); ?>
<div id="main-content-wp" class="checkout-page">
    <div class="section" id="breadcrumb-wp">
        <div class="wp-inner">
            <div class="section-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="?page=home" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title="">Thanh toán</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <div id="wrapper" class="wp-inner clearfix">
        <div class="section" id="customer-info-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin khách hàng</h1>
            </div>
            <div class="section-detail">
                <form method="POST" action="" name="form-checkout">
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="fullname">Họ tên <span style="color:red;">(*)</span> </label>
                            <input type="text" name="fullname" id="fullname" placeholder="Họ và tên">
                        </div>
                        <div class="form-col fl-right">
                            <label for="email">Email <span style="color:red;">(*)</span> </label>
                            <input type="email" name="email" id="email" placeholder="Email">
                        </div>
                    </div>
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="address">Địa chỉ <span style="color:red;">(*)</span> </label>
                            <input type="text" name="address" id="address" placeholder="Địa chỉ nhận/tên nhà">
                        </div>
                        <div class="form-col fl-right">
                            <label for="phone">Số điện thoại <span style="color:red;">(*)</span></label>
                            <input type="tel" name="phone" id="phone" placeholder="Số điện thoại">
                        </div>
                    </div>
                    <!-- select city -->
                    <div class="form-row clearfix">
                        <div class="form-col fl-left">
                            <label for="phone">Tỉnh/Thành phố <span style="color:red;">(*)</span></label>
                            <select name="province" id="provice" style="width:250px;" class="sel city">
                                <option data-id="1" value=" Hà Nội"> Chọn tỉnh thành</option>
                                <?php if (!empty($list_city)) {
                                    foreach ($list_city as $item) {
                                ?>
                                        <option data-id="<?php echo $item['city_id']; ?>" value="<?php echo $item['city_id']; ?>"><?php echo $item['name_city']; ?> </option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <!-- select quận huyện -->
                        <div class="form-col fl-right">
                            <label for="phone">Quận/Huyện <span style="color:red;">(*)</span></label>
                            <select name="province" id="province" class="sel district" style="width:277px;">
                                <option data-id="1" value=" Hà Nội"> Chọn quận huyện</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row clearfix ">
                        <div class="form-col fl-left">
                            <label for="phone">Xã/Phường <span style="color:red;">(*)</span></label>
                            <select name="province" id="province" class="sel wards" style="width:555px">
                                <option data-id="1" value=" Hà Nội"> Chọn xã phường</option>
                            </select>
                        </div>
                    </div>


                    <!-- . -->

                    <div class="form-row">
                        <div class="form-col">
                            <label for="notes">Ghi chú</label>
                            <textarea class="note" name="note" placeholder="Ghi chú"></textarea>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="section" id="order-review-wp">
            <div class="section-head">
                <h1 class="section-title">Thông tin đơn hàng</h1>
            </div>
            <div class="section-detail">
                <table class="shop-table">
                    <thead>
                        <tr>
                            <td>Sản phẩm</td>
                            <td>Tổng</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($cart as $item) {
                        ?>
                            <tr class="cart-item">
                                <td class="product-name"><?php echo $item['product_title']; ?><strong class="product-quantity">x <?php echo $item['number_cart']; ?></strong></td>
                                <td class="product-total"><?php echo format_number($item['thanhtien']); ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr class="order-total">
                            <td>Tổng đơn hàng:</td>
                            <td><strong class="total-price"><?php global $total_cart; echo format_number($total_cart['tongtien']); ?></strong></td>
                        </tr>
                    </tfoot>
                </table>
                <div id="payment-checkout-wp">
                    <ul id="payment_methods">
                        <li>
                            <input type="radio" id="direct-payment" name="payment-method" value="direct-payment">
                            <label for="direct-payment">Thanh toán tại cửa hàng</label>
                        </li>
                        <li>
                            <input type="radio" id="payment-home" name="payment-method" value="payment-home">
                            <label for="payment-home">Thanh toán tại nhà</label>
                        </li>
                    </ul>
                </div>
                <div class="place-order-wp clearfix">
                    <input type="submit" id="order-now" value="Đặt hàng">
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>