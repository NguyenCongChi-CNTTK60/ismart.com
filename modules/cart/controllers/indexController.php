<?php
function construct()
{
   load_model('index');
   load('lib', 'validation');
}

function indexAction()
{
   global $total_cart;
   $list_cart = show_cart();
   $data['list_cart'] = $list_cart;
   $total_cart = show_total_cart();
   // show_array($list_cart);
   load_view('index', $data);
}

function addCartAction()
{
   $id = (int)($_GET['product_id']);
   $product = get_product_by_product_id($id);
   $product_exit = check_exit_cart($id);
   if (isset($_POST['btn-add-cart'])) {
      $num_order = ($_POST['num-order']);
   }
   $data = array(
      'product_id' => $id,
      'number_cart' =>  $num_order,
      'price_cart' => $product['price'],
   );
   if (empty($product_exit)) {
      insert_cart($data);
   } else {
      $data_update = array(
         'number_cart' => $product_exit['number_cart'] + $num_order,
      );
      $where = "cart_id='{$product_exit['cart_id']}'";
      update_exit_cart($data_update, $where);
   }
   redirect("?mod=product&action=detail&product_id=$id");
}


function updateCartAction()
{
   $id_product = $_POST['product_id'];
   $num = $_POST['num_change'];
   $data_update = array(
      'number_cart' => $num,
   );
   $where = "product_id='{$id_product}'";
   update_number_cart($data_update, $where);
   $item = show_cart_row($id_product);
   $total = show_total_cart();
   $num_cart = show_num_cart();
   $data = array(
      'sub_total' => format_number($item['thanhtien']),
      'total' => format_number($total['tongtien']),
      'num_cart' => $num_cart['num_cart'],
   );
   echo json_encode($data);
}

?>

<?php
function deleteCartAction()
{
   $id_product = $_POST['product_id'];
   delete_cart($id_product);
   $total_cart = show_total_cart();
   $list_cart = show_cart();
?>
   <?php global $count;
   $count = count_cart();
   if (!empty($count['num_cart'])) {
   ?>
      <div class="delete_cart">
         <div id="wrapper" class="wp-inner clearfix">
            <div class="section" id="info-cart-wp">
               <div class="section-detail table-responsive">
                  <table class="table">
                     <thead>
                        <tr>
                           <td>Mã sản phẩm</td>
                           <td>Ảnh sản phẩm</td>
                           <td>Tên sản phẩm</td>
                           <td>Giá sản phẩm</td>
                           <td>Số lượng</td>
                           <td colspan="2">Thành tiền</td>
                           <td><i class="fa fa-trash-o"></i></td>
                        </tr>
                     </thead>
                     <tbody>
                        <?php if (!empty($list_cart)) {
                           foreach ($list_cart as $item) {
                        ?>
                              <tr>
                                 <td><?php echo $item['product_code']; ?></td>
                                 <td>
                                    <a href="" title="" class="thumb">
                                       <img src="admin/<?php echo $item['product_thumb']; ?>" alt="" style="max-width: 75px; height: 65px; display: block;">
                                    </a>
                                 </td>
                                 <td>
                                    <a href="" title="" class="name-product"><?php echo $item['product_title']; ?></a>
                                 </td>
                                 <td><?php echo format_number($item['price']); ?></td>
                                 <td>
                                    <input type="number" data-id="<?php echo $item['product_id']; ?>" name="num-order" min="1" value="<?php echo $item['number_cart']; ?>" class="cart" title="SL">
                                 </td>
                                 <td id="sub-total-<?php echo $item['product_id'] ?>"><?php echo format_number($item['thanhtien']); ?></td>
                                 <td>

                                 </td>
                                 <td>
                                    <a href="" data-id="<?php echo $item['product_id']; ?>" class="del-product" title="Xóa"><i class="fa fa-trash-o"></i></a>
                                 </td>
                              </tr>
                        <?php }
                        } ?>
                     </tbody>
                     <tfoot>
                        <tr>
                           <td colspan="7">
                              <div class="clearfix">
                                 <p id="total-price" class="fl-right">Tổng giá:<span id="total"> <?php
                                                                                                   echo format_number($total_cart['tongtien']); ?></span></p>
                              </div>
                           </td>
                        </tr>
                        <tr>
                           <td colspan="7">
                              <div class="clearfix">
                                 <div class="fl-right">
                                    <a href="" title="" id="update-cart">Cập nhật giỏ hàng</a>
                                    <a href="?mod=checkout&action=index" title="" id="checkout-cart">Thanh toán</a>
                                 </div>
                              </div>
                           </td>
                        </tr>
                     </tfoot>
                  </table>
               </div>
            </div>
            <div class="section" id="action-cart-wp">
               <div class="section-detail">
                  <p class="title">Click vào <span>“Cập nhật giỏ hàng”</span> để cập nhật số lượng. Nhập vào số lượng <span>0</span> để xóa sản phẩm khỏi giỏ hàng. Nhấn vào thanh toán để hoàn tất mua hàng.</p>
                  <a href="?page=home" title="" id="buy-more">Mua tiếp</a><br />
                  <a href="" title="" id="delete-cart">Xóa giỏ hàng</a>
               </div>
            </div>
         </div>
      </div>
   <?php } else { ?>
      <div id="wrapper" class="wp-inner clearfix cart_empty">
         <div class="d7e-efad30 d7e-95b30a" style="width: 375px; height: fit-content;">
            <div class="d7e-9582e2"><img src="https://media3.scdn.vn/img4/2021/02_02/JikA6AqzCC55LcNmcHjZ.png" alt="Cart empty" class="d7e-1867e5 d7e-7271c9"></div>
         </div>
         <h2 class="title_cart_empty">Giỏ hàng cảm thấy trống trải</h2>
         <h3 class="title_buy_now">Ai đó ơi, mua sắm cùng i8mart ngay hôm nay!</h3>
         <div class="wp-buy-now">
            <a class="" href="?mod=home">
               <span class="buy-now-cart">Mua sắm ngay</span>
            </a>
         </div>
      </div>
      </div> <?php } ?>
<?php }
?>

<?php


function shownumOrderAction()
{
   $num_cart = show_num_cart();
   $data = array(
      'num_cart' => $num_cart['num_cart'],
   );
   echo json_encode($data);
}
