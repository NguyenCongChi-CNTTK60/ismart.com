<?php
function construct()
{
   load_model('index');
   load('lib', 'validation');
}

function indexAction()
{
   $list_cart = show_cart();
   $data['list_cart'] = $list_cart;
   load_view('index', $data);
}

function addCartAction()
{
   $id = (int)($_GET['product_id']);
   $product = get_product_by_product_id($id);
   if (isset($_POST['btn-add-cart'])) {
      $num_order = ($_POST['num-order']);
   }
   $data = array(
      'product_id' => $id,
      'number_cart' =>  $num_order,
      'price_cart' => $product['price'],
   );
   insert_cart($data);
   global $count;
   $count = count_cart();
   redirect("?mod=product&action=detail&product_id=$id");
}
