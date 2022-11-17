<?php
function construct()
{
   load('lib', 'validation');
   load_model('index');
}

function indexAction()
{
   $city = select_all_city();
   //show_array($city);
   $data['list_city'] = $city;

   $cart = show_cart();
   $data['cart'] = $cart;

   global $total_cart;
   $total_cart = show_total_cart();

   load_view('index', $data);
}


function processAction()
{
   $id = $_POST['id'];
   $data = select_all_district($id);
   foreach ($data as $item) {
?>
      <option data-id="1" value="<?php echo $item['district_id']; ?>"><?php echo $item['name_district']; ?></option>
<?php
   }
}
?>

<?php
function processWardsAction()
{
   $id = $_POST['id'];
   $data = select_all_wards($id);
   foreach ($data as $item) {
?>
      <option data-id="1" value="<?php echo $item['wards_id']; ?>"><?php echo $item['name_wards']; ?></option>
<?php
   }
}
?>

<?php
function orderAction()
{

   $t = time();
   echo $t;
   echo date("d/m/Y h:i", $t);
   show_array($_POST);

   $num_custom = check_custom_exit($_POST['phone']);

   echo $num_custom;

   if ($num_custom <= 0) {

      $data = array(
         'fullname' => $_POST['fullname'],
         'email' =>  $_POST['email'],
         'adress' => $_POST['address'],
         'phone' => $_POST['phone'],
         'city_id' =>  $_POST['province'],
         'district_id' => $_POST['district'],
         'wards_id' => $_POST['wards'],
      );

      insert_customer($data);
   }

   $total = show_total_cart();
   $custom_id = show_custom_id($_POST['phone']);
   $temp = $t;

   $data1 = array(
      'date_create' => $t,
      'total' =>  $total['tongtien'],
      'customer_id' => $custom_id['customer_id'],
      'method_pay' => 'Thanh toán tại nhà',
      'status' =>  'Chưa chuyển',
      'status_pay' => 'Chưa thanh toán',
      'note' => $_POST['note'],
   );

   if (insert_order($data1)) {
      $list_cart = show_cart();
      $order_id = show_order_id($temp);
      foreach ($list_cart as $item) {
         $data2 = array(
            'order_id' => $order_id['order_id'],
            'product_id' => $item['product_id'],
            'number' => $item['number_cart'],
            'price' => $item['price'],
         );
         insert_detail_order($data2);
         delete_all_cart();
      }
   }
}
