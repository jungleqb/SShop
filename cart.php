<?php 
require_once"view/header.php";

$ids = array_keys($_SESSION['cart']); //trả khoá của mảng trong session cart

?>

<div class="container">
<h3>Giỏ hàng</h3>
<form method="POST" action="gio-hang">
<table class="table table-hover">
	<thead>
		<tr>
			<th>Sản phẩm</th>
			<th>Tên</th>
			<th>Giá</th>
			<th>Số lượng</th>
			<th>Tổng tiền</th>
			<th>Xoá</th>
		</tr>
	</thead>
	<tbody>
		<?php 
		if(empty($ids)){
			$products = array();
		}
		else{
			$products=$DB->query('SELECT * FROM product WHERE id IN('.implode(',',$ids).')'); // nối các key thành chuỗi cách nhau dấu ,
		}
		foreach($products as $pro): ?>
		<tr>
			<td><img src="upload/product/<?=$pro->img?>" width="100px"></td>
			<td><?=$pro->title?></td>
			<td>
				<?php if($pro->promotionPrice == 0){
						echo number_format($pro->price)."đ";
					}
					else{
						echo number_format($pro->promotionPrice)."đ";
					}	

				 ?>

			</td>
			<td><input type="number" name="cart[qty][<?=$pro->id;?>]" value="<?=$_SESSION['cart'][$pro->id]?>"></td>
			<td>
				<?php if($pro->promotionPrice == 0){
						echo number_format($pro->price * $_SESSION['cart'][$pro->id])."đ";
					}
					else{
						echo number_format($pro->promotionPrice * $_SESSION['cart'][$pro->id])."đ";
					}	

				 ?>
			</td>
			<td><a href="gio-hang?delCart=<?=$pro->id?>">Xoá</a></td>
		</tr>
	<?php endforeach ?>
		<tr align="right">
			<td>Tổng tiền: <?=number_format($cart->total())?>đ</td>
			<td><input type="submit" value="Cập nhật"></td>

		</tr>
	</tbody>
</table>
</form>
</div>


<?php 
require_once"view/footer.php";
?>