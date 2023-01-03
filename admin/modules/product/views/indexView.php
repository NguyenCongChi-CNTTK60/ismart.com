<?php get_header(); ?>
<div id="page-body" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="wp-content">
        <div id="content" class="container-fluid">
            <div class="card">
                <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                    <h5 class="m-0 ">Danh sách sản phẩm</h5>
                    <div class="form-search form-inline">
                        <form action="#">
                            <input type="" class="form-control form-search" placeholder="Tìm kiếm theo tên, danh mục sản phẩm" style="width: 78%;">
                            <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary" style=" margin-left: 360px; margin-top: -65px;">
                        </form>
                    </div>
                </div>
                <div class="card-body" style="font-size: 15px;">
                    <div class="analytic">
                        <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                        <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                        <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
                    </div>
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="">
                            <option>Lọc sản phẩm</option>
                            <option>Sản phẩm còn hàng</option>
                            <option>Số lượng dưới 10</option>
                            <option>Sắp xếp theo nhà cung cấp</option>
                            <option>Sắp xếp giá tăng dần</option>
                            <option>Sắp xếp giá giảm dần</option>
                        </select>
                        <input type="submit" name="btn-search" value="Lưu bộ lọc" class="btn btn-primary">
                    </div>
                    <table class="table table-striped table-checkall">
                        <thead>
                            <tr>
                                <th scope="col">
                                    <input name="checkall" type="checkbox">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Giá</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Số lượng kho</th>
                                <th scope="col">Nhà cung cấp</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            global $start;
                            $count = $start;
                            foreach ($list_product as $item) {
                                $count++; ?>
                                <tr class="row--product" style=" border-bottom:1px solid #dee2e6; ">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td><?php echo $count; ?></td>
                                    <td><img src="<?php echo $item['product_thumb']; ?>" alt="" style="width: 45px; height: 45px;"></td>
                                    <td><a href="#" style="color: #4691e0;"><?php echo $item['product_title']; ?></a></td>
                                    <td><?php echo format_number($item['price']); ?></td>
                                    <td><?php echo $item['cat_title']; ?></td>
                                    <td><?php echo date("d/m/Y H:i", $item['date_create']); ?></td>
                                    <td><?php echo $item['number_stock']; ?></td>
                                    <td><?php echo $item['supplier_name']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <div style="display: flex; justify-content: space-between;">
                        <span class="" style="padding: 8px; color: #585454; font-size: 15px;">Có <?php global $num_product;
                                                                                                    echo $num_product; ?> sản phẩm trong hệ thống</span>
                        <nav aria-label="Page navigation example">
                            <?php global $total_page, $page;
                            echo get_padding($total_page, $page, "?mod=product&action=index"); ?>
                        </nav>

                    </div>
                </div>
            </div>
        </div>
    </div>