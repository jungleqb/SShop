<?php 
if(isset($_POST['sub'])){
	$xxx = 0;
	$error = array();
	if(empty($_POST['name'])) $error[] = 'name'; else $name = $_POST['name'];
	if(empty($_POST['mail'])) $error[] = 'mail'; else $mail = $_POST['mail'];
	if(empty($_POST['address'])) $error[] = 'address'; else $address = $_POST['address'];
	if(empty($_POST['tel'])) $error[] = 'tel'; else $tel = $_POST['tel'];
	$gender = $_POST['gender'];
	$pass = $_POST['pass'];
	$note = $_POST['note'];
	if(empty($_SESSION['cart'])){
		$err = "Vui lòng mua hàng trước khi thanh toán!";
	}
	elseif(empty($error)){
		$idCustomer = $model->setCustomer($name, $gender, $mail, $tel, $address, $pass);
		if($idCustomer){
			date_default_timezone_set("Asia/Ho_Chi_Minh");
			$dateOrder = date('Y-m-d', time());
			$total = $cart->total();
			$idBill = $model->setBill($idCustomer, $total, $dateOrder, $note);

			$ids = array_keys($_SESSION['cart']);
			if(isset($ids)){
				$product = $DB->query('SELECT * FROM product WHERE id IN('.implode(',',$ids).')');
				foreach($product as $cartDetail){
					$idProduct = $cartDetail->id;
					$quantity =$_SESSION['cart'][$cartDetail->id];
					$price = $cartDetail->price;
					$discountPrice = $cartDetail->promotionPrice;
					$billDetail = $model->setBillDetail($idProduct,$idBill,$quantity,$price,$discountPrice);
					

				}
				$body = '
					<h3>Hoá đơn chi tiết của '.$name.'</h3>
					<h2>Tổng tiền: '.number_format($cart->total()).'đ </h2>
				';	
				$mail = sendMail('kkokjun98@gmail.com',$body);
				if($mail){
					$mess = "Đặt Hàng thành công! Xin cảm ơn quý khách.";
					unset($_SESSION['cart']);
				}		
			}

			
		}		
	}
	else{
		$err = "Xin vui lòng điền thông tin đầy đủ!";
	}


}
?>