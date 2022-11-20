<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Cảm ơn</title>
</head>

<body>
    <style>
        body {
            background-color: #e6e8ea;
            width: 1024px;
            margin: 0px auto;
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
        }

        a {
            color: #2a9dcc;
            text-decoration: none;
            cursor: pointer;
        }

        .d-flex {
            display: flex;
        }

        .section__title {
            margin-top: 0px;
            margin-bottom: -5px;
            font-size: 18px;
        }

        .unprintable {
            width: 90px;
        }

        .jus-content {
            justify-content: space-between;
        }

        .section__content {
            width: 620px;
            padding: 10px 20px;
            border: 1px solid #dadada;
            border-radius: 5px;
        }

        .col.col--secondary.info-order {
            background: white;
            padding: 10px;
            border-radius: 5px;
            width: 100%;
            height: 100%;
            margin-left: 18px;
        }

        .order-summary__title {
            padding: 0px 0px 12px 3px;
            font-weight: 700;
            font-size: 15px;
        }

        .col.col--md-two h2 {
            font-weight: 400;
            font-size: 22px;
        }

        .col.col--md-two p {
            font-size: 14px;
        }

        .order-summary__section {
            padding: 10px 0px;
        }

        .total-line__name {
            width: 50%;
            text-align: left;
            font-weight: 400;
        }

        .total-line__price {
            width: 300px;
            text-align: end;
            font-weight: 400;
        }

        .product-thumbnail__wrapper img {
            width: 50px;
            height: 50px;
            border: 1px solid #dadada;
            border-radius: 5px;
        }
    </style>
    <div class="logo logo--left ">
        <h1 class="shop__name">
            <a href="/" style="font-weight: 400;">
                i8mart_shop
            </a>
        </h1>
    </div>
    <div class="main__content">
        <article class="row">
            <div class="col col--primary">
                <section class="section d-flex" style="margin-bottom: 15px ;">
                    <div class="section__icon unprintable">
                        <svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                            <g fill="none" stroke="#8EC343" stroke-width="2">
                                <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                                <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                            </g>
                        </svg>
                    </div>
                    <div class="thankyou-message-container">
                        <h2 class="section__title">Cảm ơn bạn đã đặt hàng</h2>

                        <p class="section__text" style="font-size: 14px; ">
                            Một email xác nhận đã được gửi tới <?php echo $list_thank[0]['email']; ?><br> Xin vui lòng kiểm tra email của bạn
                        </p>
                    </div>
                </section>
            </div>
            <div class="wp-info d-flex jus-content">
                <div class="col col--primary">
                    <section class="section">
                        <div class="section__content">
                            <div class="row d-flex">
                                <div class="col col--md-two" style="width: 345px; ">
                                    <h2>Thông tin mua hàng</h2>
                                    <p><?php echo $list_thank[0]['fullname']; ?></p>
                                    <p><?php echo $list_thank[0]['email']; ?></p>
                                    <p><?php echo $list_thank[0]['phone']; ?></p>
                                </div>

                                <div class="col col--md-two" style="margin-left: 120px ;">
                                    <h2>Địa chỉ nhận hàng</h2>
                                    <p><?php echo $list_thank[0]['fullname']; ?></p>
                                    <p></p>
                                    <p><?php echo $list_thank[0]['address'];
                                        echo ", ";
                                        echo $list_thank[0]['name_wards'];
                                        echo ", ";
                                        echo $list_thank[0]['name_district'];
                                        echo ", ";
                                        echo $list_thank[0]['name_city']; ?></p>
                                    <p><?php echo $list_thank[0]['phone']; ?></p>
                                </div>
                            </div>
                            <div class="row d-flex">
                                <div class="col col--md-two">
                                    <h2>Phương thức thanh toán</h2>
                                    <p>Thanh toán khi giao hàng (COD)</p>
                                </div>
                                <div class="col col--md-two" style="margin-left: 78px ;">
                                    <h2>Phương thức vận chuyển</h2>
                                    <p>Giao hàng tận nơi</p>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="section unprintable" style="margin-top: 50px; margin-left: 252px;">
                        <div class="field__input-btn-wrapper" style="width: 300px;">
                            <a href="?mod=home" class="btn btn--large" style="padding: 15px; background: #357ebd; color: white; border-radius: 5px;">Tiếp tục mua hàng</a>
                        </div>
                    </section>
                </div>
                <div class="col col--secondary info-order">
                    <aside class="order-summary order-summary--bordered order-summary--is-collapsed" id="order-summary">
                        <div class="order-summary__header">
                            <div class="order-summary__title" style="border-bottom: 1px solid #dadada; "> Đơn hàng #1212<?php echo $list_thank[0]['order_id']; ?>
                                <span class="unprintable">(*)</span>
                            </div>
                        </div>
                        <div class="order-summary__sections">
                            <div class="order-summary__section" style="border-bottom: 1px solid #dadada; padding: 5px 0px;">
                                <table class="product-table">
                                    <tbody>
                                        <?php foreach ($list_thank as $item1) { ?>
                                            <tr class="product">
                                                <td class="product__image">
                                                    <div class="product-thumbnail">
                                                        <div class="product-thumbnail__wrapper">
                                                            <img src="<?php echo $item1['product_thumb']; ?>" alt="Balo PRADA cá tính Default Title" class="product-thumbnail__image">
                                                        </div>
                                                    </div>
                                                </td>
                                                <th class="product__description">
                                                    <span class="product__description__name" style="font-weight: 400 ; font-size: 14px;"><?php echo $item1['product_title']; ?></span>
                                                </th>
                                                <td class="product__quantity printable-only" style=" text-align: end; width: 30px; font-weight: 700; ">
                                                    x <?php echo $item1['number']; ?>
                                                </td>
                                                <td class="product__price" style="text-align: end; width: 90px;">
                                                    <?php $into_money = $item1['price'] * $item1['number'];
                                                    echo format_number($into_money); ?>
                                                </td>
                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary__section" style="border-bottom: 1px solid #dadada; ">
                                <table class="total-line-table">
                                    <tbody class="total-line-table__tbody">
                                        <tr class="total-line total-line--subtotal">
                                            <th class="total-line__name">Tạm tính</th>
                                            <td class="total-line__price"><?php echo format_number($item1['total']); ?></td>
                                        </tr>

                                        <tr class="total-line total-line--shipping-fee">
                                            <th class="total-line__name">Phí vận chuyển</th>
                                            <td class="total-line__price">
                                                0₫
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="order-summary__section">
                                <table class="total-line-table">
                                    <tbody class="total-line-table__tbody">
                                        <tr class="total-line payment-due">
                                            <th class="total-line__name">
                                                <span class="payment-due__label-total">Tổng cộng</span>
                                            </th>
                                            <td class="total-line__price">
                                                <span class="payment-due__price" style="font-weight: 700; color: #2a9dcc;"><?php echo format_number($item1['total']); ?></span>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </aside>
                </div>
            </div>
        </article>
    </div>
</body>

</html>