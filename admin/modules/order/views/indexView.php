<?php get_header(); ?>
<div id="page-body" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="wp-content">
        <div id="content" class="container-fluid">
            <div class="card">
                <div class="card-header font-weight-bold d-flex justify-content-between align-items-center">
                    <h5 class="m-0 ">Danh sách đơn hàng</h5>
                    <div class="form-search form-inline">
                        <form action="#">
                            <input type="" class="form-control form-search" placeholder="Tìm kiếm">
                            <!-- <input type="submit" name="btn-search" value="Tìm kiếm" class="btn btn-primary"> -->
                        </form>
                    </div>
                </div>
                <div class="card-body">
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
                                <th>
                                    <input type="checkbox" name="checkall">
                                </th>
                                <th scope="col">#</th>
                                <th scope="col">Đơn hàng</th>
                                <th scope="col">Khách hàng</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col">Thanh toán</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Tác vụ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $temp = 0;
                            foreach ($list_order as $item) {
                                $temp++; ?>
                                <tr>
                                    <td>
                                        <input type="checkbox">
                                    </td>
                                    <td><?php echo $temp; ?></td>
                                    <td><a href="?mod=order&action=detailOrder&order_id=<?php echo $item['order_id'];?>" style=" color: #007bff;">#1212<?php echo $item['order_id']; ?></a></td>
                                    <td>
                                        <?php echo $item['fullname']; ?><br>
                                    </td>
                                    <td><span class="badge badge-warning" style="font-weight: 400; padding: 3px 10px; background-color: #ffea8a;"><?php echo $item['status']; ?></span></td>
                                    <td><span class="badge badge-warning" style="font-weight: 400; padding: 3px 10px; background-color: #ffc58b"><?php echo $item['status_pay']; ?></span></td>
                                    <td><?php echo date("d/m/Y H:i", $item['date_create']); ?></td>
                                    <td>
                                        <a href="#" class="btn btn-success btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Edit"><i class="fa fa-edit"></i></a>
                                        <a href="#" class="btn btn-danger btn-sm rounded-0 text-white" type="button" data-toggle="tooltip" data-placement="top" title="Delete"><i class="fa fa-trash"></i></a>
                                    </td>
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