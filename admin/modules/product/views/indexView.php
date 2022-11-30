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
                            <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                            <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary" style=" margin-left: 220px; margin-top: -65px;">
                        </form>
                    </div>
                </div>
                <div class=" card-body">
                    <div class="analytic">
                        <a href="" class="text-primary">Trạng thái 1<span class="text-muted">(10)</span></a>
                        <a href="" class="text-primary">Trạng thái 2<span class="text-muted">(5)</span></a>
                        <a href="" class="text-primary">Trạng thái 3<span class="text-muted">(20)</span></a>
                    </div>
                    <div class="form-action form-inline py-3">
                        <select class="form-control mr-1" id="">
                            <option>Chọn</option>
                            <option>Tác vụ 1</option>
                            <option>Tác vụ 2</option>
                        </select>
                        <input type="submit" name="btn-search" value="Áp dụng" class="btn btn-primary">
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
                            <?php foreach ($list_product as $item) { ?>
                                <tr class="row--product" style=" border-bottom:1px solid #dee2e6; ">
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td>1</td>
                                    <td><img src="<?php echo $item['product_thumb']; ?>" alt="" style="width: 60px; height: 60px;"></td>
                                    <td><a href="#" style="color: #007bff ;"><?php echo $item['product_title']; ?></a></td>
                                    <td><?php echo format_number($item['price']); ?></td>
                                    <td><?php echo $item['cat_title']; ?></td>
                                    <td><?php echo date("d/m/Y H:i", $item['date_create']); ?></td>
                                    <td><?php echo $item['number_stock']; ?></td>
                                    <td><?php echo $item['supplier_name']; ?></td>
                                </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Previous">
                                    <span aria-hidden="true">Trước</span>
                                    <span class="sr-only">Sau</span>
                                </a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#" aria-label="Next">
                                    <span aria-hidden="true">&raquo;</span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>