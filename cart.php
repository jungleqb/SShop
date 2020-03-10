<?php 
require_once"view/header.php";
if(empty($_SESSION['cart'])){
	header('location:trang-chu');
	return;
}

$ids = array_keys($_SESSION['cart']); //trả khoá của mảng trong session cart

?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="trang-chu">Trang chủ</a></li>
				<li class="active">Giỏ hàng</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->
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
							<?php if(isset($_SESSION['iduser'])): ?>
															<tr>
								<th class="empty" colspan="3"></th>
								<td colspan="3"> <input type="checkbox" name="coin"> Kshop xu | Dùng xu <span style="font-size: 18px; color: orangered"><?=$model->getAccount($_SESSION['iduser'])->coinTotal?> xu</span></td>
							</tr>
							<tr>
								<th class="empty" colspan="3"></th>
								<th>TỔNG TIỀN</th>
								<th colspan="2" class="total"><?=number_format($cart->total() - $model->getAccount($_SESSION['iduser'])->coinTotal)?>đ</th>
							</tr>
							<?php else: ?>

							<?php endif ?>
	
						</tfoot>
					</table>
					<div class="pull-left">
						<button class="primary-btn" onclick="window.history.go(-1); return false;">Tiếp tục mua hàng</button>
					</div>
					<div class="pull-right">
						<button class="primary-btn" type="submit">Cập nhật</button>
						
						<?php if(isset($_SESSION['iduser'])): ?>
							<button type="button" onclick="location.href='checkout2.php'" class="primary-btn">Thanh toán</button>
						<?php else: ?>
							<button type="button" name="login" id="login" data-toggle="modal" data-target="#loginModal" class="primary-btn">Thanh toán</button>
						<?php endif ?>

					</div>

				</div>
				</form>
				<!-- The Modal -->
					<div id="loginModal" class="modal fade" role="dialog">  
				      <div class="modal-dialog">  
				   <!-- Modal content-->  
				           <div class="modal-content">  
				                <div class="modal-header">  
				                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
				                     <h4 class="modal-title">Đăng nhập </h4>  
				                </div>  
				                <div class="modal-body">  
				                     <label>Mail</label>  
				                     <input type="text" name="username" id="username" class="form-control" />  
				                     <br />  
				                     <label>Mật khẩu</label>  
				                     <input type="password" name="password" id="password" class="form-control" />  
				                     <br />  
				                     <button type="button" name="login_button" id="login_button" class="primary-btn add-to-cart">Đăng nhập</button>  
				                </div>  
				           </div>  
				      </div>  
				 </div>  
			</div>
		</div>
	</div>
</div>


<script>
// Get the modal
$(document).ready(function(){
	$('#login_button').click(function(){  
           var username = $('#username').val();  
           var password = $('#password').val();  
           if(username != '' && password != '')  
           {  
                $.ajax({  
                     url:"view/action.php",  
                     method:"POST",  
                     data: {username:username, password:password},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data == 'no')  
                          {  
                               alert("Tài khoản không tồn tại");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();  
                               location.reload();  
                          }  
                     }  
                });  
           }  
           else  
           {  
                alert("Vui lòng điền đủ thông tin");  
           }  
      }); 
});
</script>

<?php 
require_once"view/footer.php";
?>