<?php get_header(); ?>
<div id="page-body" class="d-flex">
    <?php get_sidebar(); ?>
    <div id="wp-content">
        <div id="content" class="container-fluid content-60" style="padding-top: 0px;">
            <div class="ui-title-bar__heading-group">
                <div class="ui-title-order__id">
                    <i class="fa-solid fa-angle-left"></i>
                    <span style="font-size: 14px; padding-left: 4px; ;">#10095</span>
                </div>
                <h1 class="ui-title-bar__title">
                    Tạo phiếu giao hàng
                </h1>
            </div>
            <div style="display: flex ; justify-content: space-between;">
                <!-- column left -->
                <div class="gui-group--ui-type-left" style="width: 65%;">
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Thông tin sản phẩm
                            </label>
                            <table class="table table-striped table-checkall">
                                <thead>
                                    <tr>
                                        <th scope="col" style="font-weight: 500;"> Sản phẩm </th>
                                        <th scope="col" style="width: 40%;"></th>
                                        <th scope="col" style="font-weight: 500;">Khối lượng(g)</th>
                                        <th scope="col" style="font-weight: 500;">Số lượng giao</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr style="background: white;">
                                        <td style="padding: .5rem;"><img src="" alt="" style="width: 45px; height: 45px;"></td>
                                        <td style="padding: .5rem;"><a href="#" style="color: #007bff ;"> Laptop Lenovo Ideapad Gaming 3 15IAH7 i5 12500H </a></td>
                                        <td style="text-align: center; padding: .5rem;">0</td>
                                        <td style="text-align: center; padding: .5rem;">4</td>
                                    </tr>
                                    <tr style="background: white;">
                                        <td><img src="" alt="" style="width: 45px; height: 45px;"></td>
                                        <td><a href="#" style="color: #007bff ;"> balo xinh </a></td>
                                        <td style="text-align: center;">0</td>
                                        <td style="text-align: center;">4</td>
                                    </tr>
                                </tbody>
                            </table>
                            <div style="border-bottom: 1px solid #dee2e6 ; margin-bottom: 15px;">
                                <label class="next-label-1">
                                    Thông tin giao hàng
                                </label>
                            </div>
                            <div>
                                <label class="next-label-1" style="font-weight: 400; margin-bottom: 0px;">
                                    Địa chỉ lấy hàng
                                </label>
                                <div>
                                    <select name="product[cat]" id="cat" class="sel cat" style="background: #fcfdfd; font-size: 14px; padding: 7px 10px;">
                                        <option data-id="1" value="">Cửa hàng chính</option>
                                    </select>
                                </div>
                            </div>
                            <br>
                            <div class="group--price">
                                <div class="" style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Tiền thu hộ (COD)
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="" placeholder="" class="next-input" size="30" type="text" name="product[code]">
                                </div>
                                <div style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Khối lượng gói hàng(g)
                                    </label>
                                    <br>
                                    <input autofocus="autofocus" id="product-name" value="" placeholder="" class="next-input" size="30" type="text" name="product[barcode]">
                                </div>
                            </div>
                            <div class="group--price" style="margin-top: 15px ;">
                                <div class="" style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Ghi chú
                                    </label>
                                    <br>
                                    <textarea rows="4" cols="38">

                                </textarea>
                                </div>
                                <div style="width: 48%">
                                    <label class="next-label" for="product-name">
                                        Yêu cầu
                                    </label>
                                    <br>
                                    <div>
                                        <select name="product[cat]" id="cat" class="sel cat" style="background: #fcfdfd; font-size: 14px; padding: 7px 10px;">
                                            <option data-id="1" value="">Không cho xem hàng</option>
                                            <option data-id="1" value="">Cho xem hàng và không thử</option>
                                            <option data-id="1" value="">Cho xem hàng và thử</option>
                                        </select>
                                        <div class="" style="margin-top: 20px;">
                                            <input type="checkbox" id="variant-stock" value="1" data-bind="taxable" class="next-checkbox" style="width: 20px" checked>
                                            <label class="next-label" for="variant-stock">Gửi email tới khách hàng</label>
                                        </div>
                                    </div>
                                </div>

                            </div>
                            <hr class="next-card__section__separator--half">
                            <div class="">
                                <label class="next-label" for="product-name">
                                    Mã vận đơn
                                </label>
                                <br>
                                <input autofocus="autofocus" id="product-name" value="" placeholder="" class="next-input" size="30" type="text" name="product[code]">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- column right -->
                <div class="group--ui-type-right" style="width: 33% ;">
                    <div class="ui-type-container">
                        <div class="next-input-wrapper" id="guide_line_step_1">
                            <label class="next-label-1">
                                Địa chỉ giao hàng
                            </label>
                            <a href="" style="color: #007bff; margin-left: 120px;">Sửa</a>
                            <br>
                            <div class="group-info-name-create-order" style="font-size: 15px; color: #637381;">
                                <p>Nguyễn Văn B</p>
                                <p>+84328644258</p>
                                <p>d</p>
                                <p>Phường 13</p>
                                <p>Quận 4</p>
                                <p>TP.Hồ Chí Minh</p>
                                <p>Việt Nam</p>
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
                    <button name="btn-save" value="save">Giao hàng</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>