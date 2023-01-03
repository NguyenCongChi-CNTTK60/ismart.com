<?php get_header(); ?>
<div id="page-body" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="wp-content">
        <div id="content" class="container-fluid">

            <div class="card">
                <div class="card-header font-weight-bold">
                    Chi tiết đơn hàng #1212<?php echo $list_detail_order[0]['order_id']; ?>
                    <span style="font-size: 13px; font-weight: 400;"><?php echo date("d/m/Y H:i", $list_detail_order[0]['date_create']); ?> </span>
                </div>
                <div class="group-section-payment d-flex">
                    <section class="ui-cart" id="order-cart">
                        <header class="ui-cart_header">
                            <div class="ui-stack-wp">
                                <div class="ui-stack-fill">
                                    <h6>Chi tiết đơn hàng</h6>
                                </div>
                                <div class="ui-stack-item">
                                    <p>Nguồn Website</p>
                                </div>
                        </header>
                        <div class="next-card">
                            <h3 class="ui-subheading"><?php echo $list_detail_order[0]['status']; ?></h3>
                        </div>
                        <div class="next-card__section">
                            <table class="table--no-side-padding">
                                <tbody>
                                    <?php foreach ($list_detail_order as $item) { ?>
                                        <tr class="orders-line-item">
                                            <td class="orders-line-item__image">
                                                <div class="aspect-ratio">
                                                    <img title="Hộp quà tặng Flower 01" class="aspect-ratio__content" src="<?php echo $item['product_thumb']; ?>" style="width: 50px;  height: 50px; border: 1px solid rgba(195,207,216,.3);">
                                                </div>
                                            </td>
                                            <td class="orders-line-item__description">
                                                <a style="color: #0097ff ; font-size: 14px;" href=""><?php echo $item['product_title']; ?></a>
                                                <p class="type--subdued">SKU : <?php echo $item['product_code']; ?></p>
                                            </td>
                                            <td class="orders-line-item__price">
                                                <?php echo format_number($item['price']); ?>
                                            </td>
                                            <td class="orders-line-item__times-sign">
                                                ×
                                            </td>
                                            <td class="orders-line-item__quantity">
                                                <?php echo $item['number']; ?>
                                            </td>
                                            <td class="orders-line-item__total">
                                                <?php $into_money = $item['price'] * $item['number'];
                                                echo format_number($into_money);
                                                ?> </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                            <div id="transaction_summary">
                                <table class="table--info-payment">
                                    <tbody>
                                        <tr>
                                            <td class="type--subdued">Giá</td>
                                            <td class="type--cost"><?php echo format_number($item['total']); ?></td>
                                        </tr>
                                        <tr>
                                            <td class="type--subdued">
                                                <div>Vận chuyển</div>
                                                <div>Giao hàng tận nơi</div>
                                                <div>0.00 kg</div>
                                            </td>
                                            <td class="type--cost">
                                                <div>
                                                    0₫
                                                </div>
                                            </td>
                                        </tr>

                                        <tr class="type--subdued">
                                            <td><strong>Tổng cộng</strong></td>
                                            <td><strong><?php echo format_number($item['total']); ?></strong></td>
                                        </tr>

                                    </tbody>
                                </table>
                                <hr class="next-card__section__separator--half">
                                <table class="table--nested table--no-border type--right">
                                    <tbody>
                                        <tr>
                                            <td class="type--subdued">Khách hàng thanh toán</td>
                                            <td class="type--cost"><?php echo format_number($item['total']); ?></td>
                                        </tr>
                                    </tbody>
                                </table>

                            </div>

                        </div>
                        <hr class="next-card__section__separator--half">
                        <div class="payment">
                            <i class="fa fa-credit-card payment--icon"></i>
                            <span class="payment-discrip">THANH TOÁN KHI GIAO HÀNG (COD)</span>
                        </div>
                        <hr class="next-card__section__separator--half">
                        <div class="payment">
                            <i class="fa fa-truck" style="padding-top: 12px; color:#637391;"></i>
                            <span class="payment-discrip" style="padding-top: 10px;">GIAO HÀNG</span>
                            <div class="submit--payment">
                                <a class="btn btn-primary" href="?mod=order&action=orderCreate&order_id=<?php global $order_id;
                                                                                                        echo $order_id; ?>">Giao hàng</a>
                            </div>
                        </div>
                    </section>
                    <!-- Thông tin vận chuyển -->
                    <section class="ui-info" id="info-custom">
                        <header class="ui-cart_header">
                            <div class="ui-custom-info d-flex">
                                <div class="ui-stack-fill">
                                    <h6>Thông tin khách hàng</h6>
                                </div>
                                <div class="ui-stack-item">
                                    <p>Nguồn Website</p>
                                </div>
                        </header>
                        <div class="next-card">
                            <h3 class="ui-subheading">Thông tin hệ thống ghi nhận</h3>
                        </div>
                        <div class="next-card d-flex">
                            <h2 class="ui-header">Khách hàng</h2>
                            <div class="group-info-name" style="margin-left: 160px ;">
                                <span><a class="title-info color-a" href=""><?php echo $item['fullname']; ?></a></span>
                                <span><a class="title-info color-a d-block" href=""><?php global $total_order;
                                                                                    echo $total_order['total_order']; ?> đơn hàng</a></span>
                            </div>
                        </div>
                        <div class="next-card d-flex">
                            <h2 class="ui-header">Liên hệ</h2>
                            <div class="group-info-name" style="margin-left: 160px ;">
                                <span><?php echo $item['email']; ?></span>
                            </div>
                        </div>
                        <div class="next-card d-flex">
                            <h2 class="ui-header">Địa chỉ giao hàng</h2>
                            <div class="group-info-name" style="margin-left: 160px ; font-size: 15px; color: #637381;">
                                <p><?php echo $item['fullname']; ?></p>
                                <p>+84<?php echo $item['phone']; ?></p>
                                <p><?php echo $item['address']; ?></p>
                                <p><?php echo $item['name_wards']; ?></p>
                                <p><?php echo $item['name_district']; ?></p>
                                <p><?php echo $item['name_city']; ?></p>
                                <p>Việt Nam</p>
                            </div>
                        </div>
                        <div class="ui-type" style="padding: 20px ;">
                            <p class="type--subdued" style="font-size: 15px ;">Phương thức vận chuyển: <span class="bold" style="font-weight: 600px; margin-left: 15px;">Giao hàng tận nơi</span></p>
                            <p class="type--subdued" style="font-size: 15px ; text-align:left;  margin-left: 2px; ">Khối lượng: <span class="bold">0.00 kg</span></p>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>
</div>