<?php 

require"view/_header.php";
$json = array('error' => true); // gắn biến jsson thành mảng có phần tử error = true

if(isset($_GET['id'])){
	$product = $DB->query('SELECT id FROM product WHERE id=:id', array('id' => $_GET['id']));
	if(empty($product)){                                     // Nếu sản phẩm có 
		$json['message'] = 'Sản phẩm không tồn tại'; // thì phần từ message được gắn trong mảng jsson 
	}
	$cart->add($product[0]->id);
	$json['error'] =false;    //Nếu sản phẩm id tồn tại thì gắn  error = false
	$json['total'] = number_format($cart->total())."đ";
	$json['count'] = $cart->countProduct();
	$json['message'] = 'Sản phẩm được thêm thành công '; // và gắn phần từ message 
}
else{
	$json['message'] = 'Sản phẩm không tồn tại';
}
echo json_encode($json);

?>