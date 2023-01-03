<?php get_header(); ?>
<div id="page-body" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="wp-content">
        <div id="content" class="container-fluid content-60">
            <div class="ui-title-bar__heading-group">
                <h1 class="ui-title-bar__title">
                    Thêm mới sản phẩm
                </h1>
                <?php echo form_sussess('add_product_susess'); ?>
            </div>

            <div class="group--ui-type" style="display: flex ; justify-content: space-between; ">
                <div class="group--ui-type-right" style="width: 69%;">
                    <div class="ui-type-container">
                        <form method="POST" action="" enctype="multipart/form-data">
                            <div class="next-input-wrapper" id="guide_line_step_1">
                                <label class="next-label" for="product-name">
                                    Tên sản phẩm
                                </label>
                                <br>
                                <input autofocus="autofocus" id="product-name" value="<?php echo set_value('product_name'); ?>" placeholder="Nhập tên sản phẩm" class="next-input" size="30" type="text" name="product[name]">
                                <?php echo form_error('product_name'); ?>
                            </div>
                            <div class="next-input-wrapper" id="guide_line_step_2">
                                <label class="next-label">
                                    Nội dung
                                </label>
                                <br>
                                <textarea class="ckeditor" name="product[post_content]"><?php echo set_value('product_content'); ?></textarea>
                                <?php echo form_error('product_content_error'); ?>
                            </div>
                            <div class="next-input-wrapper" id="guide_line_step_2">
                                <label class="next-label">
                                    Mô tả ngắn
                                </label>
                                <br>
                                <textarea class="ckeditor" name="product[post_content_short]"><?php echo set_value('product_content_short'); ?></textarea>
                                <?php echo form_error('product_content_short'); ?>
                            </div>
                    </div>
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Ảnh sản phẩm
                            </label>
                            <input name="file" type="file"></input>
                            <?php echo form_error('empty_pic'); ?>
                            <?php echo form_error('type'); ?>
                            <?php echo form_error('file_exits'); ?>
                            <?php echo form_error('file_size'); ?>
                        </div>
                    </div>
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Giá sản phẩm
                            </label>
                            <br>
                            <div class="group--price">
                                <div class="" style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Giá
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-price" value="<?php echo set_value('product_price'); ?>" placeholder="0đ" class="next-input price" size="30" type="text" name="product[price]">
                                    <?php echo form_error('product_price_error'); ?>
                                </div>
                                <div style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Giá so sánh
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-price-compare" value="<?php echo set_value('product_price_compare'); ?>" placeholder="0đ" class="next-input price-compare" size="30" type="text" name="product[price-compare]">
                                    <?php echo form_error('product_price_compare_error'); ?>
                                </div>
                            </div>
                            <div class="" style="margin-top: 20px;">
                                <input type="checkbox" id="variant-taxable" value="1" data-bind="taxable" class="next-checkbox" style="width: 20px" ;>
                                <label class="next-label" for="variant-taxable">Giá đã bao gồm VAT</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Kho hàng
                            </label>
                            <br>
                            <div class="group--price">
                                <div class="" style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Mã sản phẩm/SKU
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="<?php echo set_value('product_code'); ?>" placeholder="" class="next-input" size="30" type="text" name="product[code]">
                                    <?php echo form_error('product_code_error'); ?>
                                    <?php echo form_error('code_exit'); ?>
                                </div>
                                <div style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Mã vạch/Barcode (ISBN, UPC, v.v...)
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="" placeholder="" class="next-input" size="30" type="text" name="product[barcode]">
                                </div>
                            </div>
                            <div class="group--price" style="margin-top: 15px ;">
                                <div class="" style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Quản lý kho
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="" placeholder="Quản lý kho hàng" class="next-input" size="30" type="text" name="" disabled>
                                </div>
                                <div style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Số lượng
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="1" placeholder="" class="next-input" size="30" type="text" name="product[num-stock]" style="width: 50%;">
                                </div>
                            </div>
                            <div class="" style="margin-top: 20px;">
                                <input type="checkbox" id="variant-stock" value="1" data-bind="taxable" class="next-checkbox" style="width: 20px">
                                <label class="next-label" for="variant-stock">Cho phép tiếp tục nhập hàng khi hết hàng</label>
                            </div>
                        </div>
                    </div>
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Vận chuyển
                            </label>
                            <div class="">
                                <input type="checkbox" id="variant-taxable" value="1" data-bind="taxable" class="next-checkbox" style="width: 20px" ; checked>
                                <label class="next-label" for="variant-taxable">Sản phẩm yêu cầu vận chuyển</label>
                            </div>
                            <hr class="next-card__section__separator--half">
                            <div class="">
                                <h6>Khối lượng</h6>
                                <label class="next-label" for="variant-taxable">Dùng để tính phí vận chuyển khi thanh toán</label>
                                <br>
                                <div style="margin-top: 12px;">
                                    <input autofocus="autofocus" id="product-name" value="0" placeholder="" class="next-input" size="30" type="text" name="product[mass]" style="width: 20%; border-right: 0px; ">
                                    <input autofocus="autofocus" id="product-name" value="g" placeholder="" class="next-input" size="30" type="text" name="" style="width: 10%; margin-left: -10px; border-left: 0px;" disabled>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="group--ui-type-left" style="width: 29% ;">
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Trạng thái
                            </label>
                            <br>
                            <input type="radio" id="show" name="product[status]" value="show" style="width: 25px;" checked>
                            <label for="show">Hiển thị</label><br>
                            <input type="radio" id="html" name="product[status]" value="hide" style="width: 25px;">
                            <label for="html">Ẩn</label> <br>
                            <a href="" style="color: #007bff; margin-left: 10px;">Đặt lịch hiển thị</a>
                        </div>
                    </div>
                    <div class="ui-type-container" style="background-color: #f9fafb ; border: 1px solid #dfe4e8;">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Phân loại
                            </label>
                            <br>
                            <div>
                                <label class="next-label" for="product-name">
                                    Loại
                                </label>
                                <br>
                                <select name="product[cat]" id="cat" class="sel cat">
                                    <option data-id="1" value="">Chọn loại sản phẩm</option>
                                    <?php foreach ($list_cat as $item) { ?>
                                        <option data-id="1" value="<?php echo $item['cat_id']; ?>"><?php echo $item['cat_title']; ?></option> <?php } ?>
                                </select>
                                <?php echo form_error('product_cat_error'); ?>
                            </div>
                            <div style="margin-top: 20px ;">
                                <label class="next-label" for="product-name">
                                    Nhà cung cấp
                                </label>
                                <br>
                                <select name="product[sup]" id="sup" class="sel cat">
                                    <option data-id="1" value="">Chọn nhà cung cấp</option>
                                    <?php foreach ($list_sup as $item1) { ?>
                                        <option data-id="1" value="<?php echo $item1['supplier_id']; ?>"><?php echo $item1['supplier_name']; ?></option>
                                    <?php } ?>
                                </select>
                                <?php echo form_error('product_sup_error'); ?>
                                <hr class="next-card__section__separator--half">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <hr class="next-card__section__separator--half">
            <div style="display: flex; justify-content: end; margin-bottom: 10px;">
                <div class="btn-cancle" style="margin-right: 10px;">
                    <button name="btn-cancle" value="">Hủy</button>
                </div>
                <div class="btn-save">
                    <button name="btn-save" value="save">Lưu</button>
                </div>
                </form>
            </div>

        </div>
    </div>
</div>