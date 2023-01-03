<?php

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;


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

   global $error, $sussess;

   if (isset($_POST['btn-submit-order'])) {

      if (empty($_POST['fullname'])) {
         $error['fullname'] = 'Vui lòng điền tên của bạn';
      } else {
         global $fullname;
         $fullname = $_POST['fullname'];
      }

      if (empty($_POST['email'])) {
         $error['email'] = 'Vui lòng điền email của bạn';
      } else {
         global $email2;
         $email2 = $_POST['email'];
      }

      if (empty($_POST['phone'])) {
         $error['phone'] = 'Vui lòng điền số điện thoại nhận hàng';
      } else if (is_phone($_POST['phone']) == false) {
         $error['phone'] = 'Số điện thoại không đúng định dạng';
      } else {
         global $phone;
         $phone = $_POST['phone'];
      }
      if (empty($error)) {
         $t = time();
         $num_custom = check_custom_exit($_POST['phone']);
         if ($num_custom <= 0) {
            $data = array(
               'fullname' => $_POST['fullname'],
               'email' =>  $_POST['email'],
               'address' => $_POST['address'],
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
            'method_pay' => 'Thanh toán khi nhận hàng(COD)',
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
            send_mail($_POST['email'], $_POST['phone']);
            redirect("?mod=checkout&action=thankyou");
         }
      }
   }

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

function thankyouAction()
{
   $order_id_phone = get_order_id();
   $data3['list_thank'] = show_detail_order($order_id_phone[0]['order_id']);
   load_view('thankyou', $data3);
}



function send_mail($receiver, $phone)
{
   $order_id_phone = get_order_id($phone);
   $data3 = show_detail_order($order_id_phone[0]['order_id']);
   $order_id = $data3[0]['order_id'];
   $order_customer = $data3[0]['fullname'];
   $order_phone = $data3[0]['phone'];

   $content = "<!DOCTYPE html>
   <html lang='en'>
   
   <head>
       <meta charset='UTF-8'>
       <meta http-equiv='X-UA-Compatible' content='IE=edge'>
       <meta name='viewport' content='width=device-width, initial-scale=1.0'>
       <title>Document</title>
   </head>
   
   <body>
       <table width='100%' border='0' cellspacing='0' cellpadding='0' style='border-collapse:collapse'>
           <tbody>
               <tr>
                   <td colspan='4' style='font-family:Arial,Helvetica,sans-serif;text-align:center;font-weight:bold;font-size:25px'>THÔNG TIN ĐƠN HÀNG</td>
               </tr>
               <tr>
                   <td align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;color:#25396c;padding:0 0 10px 10px' colspan='4'>Thông tin khách hàng
                   </td>
               </tr>
               <tr>
                   <td width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Mã đơn hàng</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px' colspan='2'>#1212$order_id</td>
               </tr>
               <tr>
                   <td width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Tên</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px' colspan='2'>$order_customer</td>
               </tr>
               <tr>
                   <td width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Số điện thoại</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px' colspan='2'>$order_phone</td>
               </tr>
               <tr>
                   <td width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Thanh toán</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px' colspan='2'>pay_home</td>
               </tr>
               <tr>
                   <td align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:18px;font-weight:bold;color:#25396c;padding:0 0 10px 10px' colspan='4'>Chi tiết đơn hàng
                   </td>
               </tr>
               <tr>
                   <td width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Sản phẩm</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Số lượng</td>
   
                   <td width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 10px 10px 10px'>Giá tiền (VNĐ)
                   </td>
   
                   <td width='20%' align='right' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:0 0 10px 0'>Tổng cộng (VNĐ)
                   </td>
               </tr>";


   foreach ($data3 as $item) {
      $product_title = $item['product_title'];
      $num = $item['number'];
      $price = format_number($item['price']);
      $total =  format_number($num * $price);
      
      $content .= "<tr>                                                                                                         
         <td bgcolor='#f6f6f6' width='40%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:10px 10px 10px 10px'><a>$product_title</a>
         </td>
         <td bgcolor='#f6f6f6' width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:10px 10px 10px 10px'>$num
         </td>
         <td bgcolor='#f6f6f6' width='20%' align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:10px 10px 10px 10px'>$price
         </td>
         <td bgcolor='#f6f6f6' width='20%' align='right' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:10px 10px 10px 10px'>$total
         </td>
     </tr>";
   }

   $content .=   "<tr>
   <td align='left' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;font-weight:bold;color:#666666;padding:10px 10px 10px 10px;border-bottom:1px solid #e3e3e3;border-top:dashed 1px #666666' colspan='2'>Tổng đơn hàng
   </td>
   <td align='right' style='font-family:Arial,Helvetica,sans-serif;font-size:12px;color:#666666;padding:10px 10px 10px 10px;border-bottom:1px solid #e3e3e3;border-top:dashed 1px #666666' colspan='2'>
   </td>
</tr>
<tr>
</tr>
</tbody>
</table>
</body>

</html>";


   //Load Composer's autoloader
   require 'PHPMailer/src/Exception.php';
   require 'PHPMailer/src/PHPMailer.php';
   require 'PHPMailer/src/SMTP.php';

   //Create an instance; passing `true` enables exceptions
   $mail = new PHPMailer(true);
   try {
      //Server settings
      $mail->SMTPDebug = 0; //SMTP::DEBUG_SERVER; //Enable verbose debug output
      $mail->isSMTP(); //Send using SMTP
      $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
      $mail->SMTPAuth = true; //Enable SMTP authentication
      $mail->Username = "phpsendmailer2022@gmail.com"; //SMTP username
      $mail->Password = "elwkwmpekqbibjvx"; //SMTP password
      $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
      $mail->Port = 465;
      $mail->CharSet = 'UTF-8'; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
      //Recipients
      $mail->setFrom("phpsendmailer2022@gmail.com", 'I8mart.vn');
      $mail->addAddress("$receiver", 'People'); //Add a recipient
      // $mail->addAddress('ellen@example.com'); //Name is optional
      $mail->addReplyTo("phpsendmailer2022@gmail.com", 'Unitop.vn');
      // $mail->addCC('cc@example.com');
      // $mail->addBCC('bcc@example.com');
      //Attachments
      // $mail->addAttachment('/var/tmp/file.tar.gz'); //Add attachments
      // $mail->addAttachment('/tmp/image.jpg', 'new.jpg'); //Optional name
      //Content

      $mail->isHTML(true); //Set email format to HTML
      $mail->Subject = "Thông báo đặt hàng thành công";
      $mail->Body = "$content";
      $mail->AltBody = 'This is the body in plain text for non-HTML mail clients';
      $mail->send();
      echo 'Đã gửi thành công';
   } catch (Exception $e) {
      echo "Không thể gửi mail. Mailer Error: {$mail->ErrorInfo}";
   }
}
