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
