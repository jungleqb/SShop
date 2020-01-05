<?php 
require_once"view/header.php";

$ids = array_keys($_SESSION['cart']); //trả khoá của mảng trong session cart

?>
<div class="session">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<form method="POST" action="gio-hang">
				<div class="order-summary clearfix">
					<div class="section-title">
						<h3 class="title">Giỏ hàng</h3>
					</div>
					<table class="shopping-cart-table table">
						<thead>
							<tr>
								<th>Sản phẩm</th>
								<th></th>
								<th class="text-center">Giá</th>
								<th class="text-center">Số lượng</th>
								<th class="text-center">Thành tiền</th>
								<th class="text-right"></th>
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
								<td class="thumb"><img src="upload/product/<?=$pro->img?>" width="100px"></td>
								<td class="details">
									<a href="#"><?=$pro->title?></a>
								</td>
								<td class="price text-center">
									<?php 
										if($pro->promotionPrice == 0){
											echo "<strong>".number_format($pro->price)."đ </strong>";
										}
										else{
											echo "<strong>".number_format($pro->promotionPrice)."đ </strong> <br>";
											echo "<del class='font-weak'>".number_format($pro->price)."đ </del>";
										}	

									 ?>
									 
									 </td>
								<td class="qty text-center"><input class="input" type="number" name="cart[qty][<?=$pro->id;?>]" value="<?=$_SESSION['cart'][$pro->id]?>"></td>
								<td class="total text-center">
									<?php 
										if($pro->promotionPrice == 0){
											echo "<strong>".number_format($pro->price * $_SESSION['cart'][$pro->id])."đ </strong>";
										}
										else{
											echo "<strong>".number_format($pro->promotionPrice * $_SESSION['cart'][$pro->id])."đ </strong> <br>";
											echo "<del class='font-weak'>".number_format($pro->price * $_SESSION['cart'][$pro->id])."đ </del>";
										}	

									 ?>
								</td>
								<td class="text-right"><a href="gio-hang?delCart=<?=$pro->id?>"><i class="fa fa-close"></i></a></td>
							</tr>
							<?php endforeach ?>
						</tbody>
						<tfoot>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>TẠM TÍNH</th>
								<th colspan="2" class="sub-total"><?=number_format($cart->total())?>đ</th>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>Phí vận chuyển</th>
								<td colspan="2">Free Shipping</td>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>TỔNG TIỀN </th>
								<th colspan="2" class="total"><?=number_format($cart->total())?>đ</th>
							</tr>
						</tfoot>
					</table>
					<div class="pull-left">
						<button class="primary-btn" onclick="window.history.go(-1); return false;">Tiếp tục mua hàng</button>
					</div>
					<div class="pull-right">
						<button class="primary-btn" type="submit">Cập nhật</button>
						<button class="primary-btn">Thanh toán</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</div>
</div>

<?php 
require_once"view/footer.php";
?>