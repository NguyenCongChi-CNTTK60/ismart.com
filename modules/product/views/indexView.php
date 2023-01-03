<?php get_header(); ?>
<div id="main-content-wp" class="clearfix category-product-page">
    <div class="wp-inner">
        <div class="secion" id="breadcrumb-wp">
            <div class="secion-detail">
                <ul class="list-item clearfix">
                    <li>
                        <a href="" title="">Trang chủ</a>
                    </li>
                    <li>
                        <a href="" title=""><?php global $cat_title;
                                            if (!empty($cat_title)) echo $cat_title['cat_title']; ?></a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-content fl-right">
            <div class="section" id="list-product-wp">
                <div class="section-head clearfix">
                    <h3 class="section-title fl-left"><?php global $cat_title;
                                                        if (!empty($cat_title)) echo $cat_title['cat_title']; ?></h3>
                    <div class="filter-wp fl-right">
                        <!-- <p class="desc">Hiển thị 45 trên 50 sản phẩm</p> -->
                        <!-- <div class="form-filter">
                            <form method="POST" action="">
                                <select name="select">
                                    <option value="0">Sắp xếp</option>
                                    <option value="1">Từ A-Z</option>
                                    <option value="2">Từ Z-A</option>
                                    <option value="3">Giá cao xuống thấp</option>
                                    <option value="3">Giá thấp lên cao</option>
                                </select>
                                <button type="submit">Lọc</button>
                            </form>
                        </div> -->
                    </div>
                </div>
                <!-- Lọc giá -->
                <div class="sort-box-holder d-flex">
                    <div class="btn-group pull-left sort-box d-flex">
                        <span>Ưu tiên xem: </span>
                        <?php global $cat_id; ?>
                        <ul class="sort-list d-flex">
                            <li><a href="">Mới nhất</a></li>
                            <li><a href="">Phổ biến nhất</a></li>
                            <li><a href="">Đánh giá cao nhất</a></li>
                            <li><a href="./?mod=product&action=price&cat_id=<?php echo $cat_id; ?>">Giá tăng</a></li>
                            <li><a href="./?mod=product&action=price_desc&cat_id=<?php echo $cat_id; ?>">Giá giảm dần</a></li>
                        </ul>
                    </div>
                </div>
                <div style="padding: 15px"></div>
                <div class="section-detail">
                    <ul class="list-item clearfix list-item-find-price">
                        <?php
                        if (!empty($list_product_cat_id)) {
                            // show_array($list_product);
                            foreach ($list_product_cat_id as $item) {
                        ?>
                                <li>
                                    <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id'] ?>" title="" class="thumb">
                                        <img src="<?php echo "admin/" . $item['product_thumb']; ?>" alt="">
                                    </a>
                                    <a href="?mod=product&action=detail&product_id=<?php echo $item['product_id'] ?>" title="" class="product-name"><?php echo $item['product_title'] ?></a>
                                    <div class="price">
                                        <span class="new"><?php echo format_number($item['price']); ?></span>
                                        <span class="old"><?php echo format_number($item['price_old']); ?></span>
                                    </div>
                                    <div class="action clearfix">
                                        <a href="?page=cart" title="Thêm giỏ hàng" class="add-cart fl-left">Thêm giỏ hàng</a>
                                        <a href="?page=checkout" title="Mua ngay" class="buy-now fl-right">Mua ngay</a>
                                    </div>
                                </li>
                        <?php }
                        }
                        ?>
                    </ul>
                </div>
            </div>
            <div class="section" id="paging-wp">
                <div class="section-detail">
                    <ul class="list-item clearfix">
                        <li>
                            <a href="" title="">1</a>
                        </li>
                        <li>
                            <a href="" title="">2</a>
                        </li>
                        <li>
                            <a href="" title="">3</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="sidebar fl-left">
            <div class="section" id="category-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Danh mục sản phẩm</h3>
                </div>
                <div class="secion-detail">
                    <?php foreach ($list_cat as $item) { ?>
                        <ul class="list-item">
                            <li>
                                <a href="?mod=product&action=index&cat_id=<?php echo $item['cat_id']; ?>" title=""><?php echo $item['cat_title']; ?></a>
                            </li>
                        <?php } ?>
                        </ul>
                </div>
            </div>
            <div class="section" id="filter-product-wp">
                <div class="section-head">
                    <h3 class="section-title">Bộ lọc</h3>
                </div>
                <div class="section-detail">
                    <form method="POST" action="">
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Giá</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="500000" id="r-pice-d-5"> </td>
                                    <td> <label for="r-pice-d-5"> Dưới 500.000đ </label></td>
                                </tr>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="2000000" id="r-pice-d-5-2"> </td>
                                    <td> <label for="r-pice-d-5-2"> 500.000đ - 2.000.000đ </label></td>
                                </tr>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="10000000" id="r-pice-d-2-10"> </td>
                                    <td> <label for="r-pice-d-2-10"> 2.000.000đ - 10.000.000đ </label></td>
                                </tr>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="25000000" id="r-pice-d-10-25"> </td>
                                    <td> <label for="r-pice-d-10-25"> 10.000.000đ - 25.000.000đ </label></td>
                                </tr>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="50000000" id="r-pice-d-25-50"> </td>
                                    <td> <label for="r-pice-d-25-50"> 25.000.000đ - 50.000.000đ </label></td>
                                </tr>
                                <tr>
                                    <td> <input type="radio" name="r-price" value="51000000" id="r-pice-t-50"> </td>
                                    <td> <label for="r-pice-t-50"> Trên 50.000.000đ </label></td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Hãng</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Acer</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Apple</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Hp</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Lenovo</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Samsung</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-brand"></td>
                                    <td>Toshiba</td>
                                </tr>
                            </tbody>
                        </table>
                        <table>
                            <thead>
                                <tr>
                                    <td colspan="2">Loại</td>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Điện thoại</td>
                                </tr>
                                <tr>
                                    <td><input type="radio" name="r-price"></td>
                                    <td>Laptop</td>
                                </tr>
                            </tbody>
                        </table>
                    </form>
                </div>
            </div>
            <div class="section" id="banner-wp">
                <div class="section-detail">
                    <a href="?page=detail_product" title="" class="thumb">
                        <img src="public/images/banner.png" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?>