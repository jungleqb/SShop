<?php require_once"view/header.php" ;
if(empty($_SESSION['cart'])){
	header('location:trang-chu');
	return;
}
if(!empty($_SESSION['iduser'])){
	header('location:checkout2.php');
	return;
}


require_once"view/_checkout.php";

?>
	<!-- BREADCRUMB -->
	<div id="breadcrumb">
		<div class="container">
			<ul class="breadcrumb">
				<li><a href="trang-chu">Trang chủ</a></li>
				<li class="active">Thanh toán</li>
			</ul>
		</div>
	</div>
	<!-- /BREADCRUMB -->

	<!-- section -->
	<div class="section">
		<!-- container -->
		<div class="container">			
			  <?php if(isset($mess)): ?>
				<div class="alert alert-success" role="alert">
					<?=$mess?>
				</div>
			  <?php endif ?>

			  <?php if(isset($err)): ?>
				<div class="alert alert-danger" role="alert">
					<?=$err?>
				</div>
			  <?php endif ?>
			<!-- row -->
			<div class="row">
				<form id="checkout-form" class="clearfix" method="POST">
					<div class="col-md-6">
						<div class="billing-details">
							<p>Bạn đã có tài khoản ? <a href="dang-nhap">Đăng nhập</a></p>
							<div class="section-title">
								<h3 class="title">Thông tin chi tiết</h3>
							</div>
							<div class="form-group">
								<input class="input" type="text" value="<?php if(isset($name)) echo $name?>" name="name" placeholder="Họ và Tên">
							</div>
							<div  class="form-group">
                                <label class="control-label col-sm-2" style="display: block">Giới tính</label>
                                <div class="col-sm-10">
                                <label class="radio-inline"><input value="0" name="gender" type="radio" > Nam</label>
                                <label class="radio-inline"><input value="1" name="gender" type="radio" checked="checked"> Nữ</label>
                                </div>
                            </div>
							<div class="form-group">
								<input class="input" type="email" value="<?php if(isset($mail)) echo $mail?>" name="mail" placeholder="Email">
							</div>
							<div class="form-group">
								<input class="input" type="text" value="<?php if(isset($address)) echo $address?>" name="address" placeholder="Địa chỉ">
							</div>
							<div class="form-group">
								<input class="input" type="tel" value="<?php if(isset($tel)) echo $tel?>" name="tel" placeholder="Số điện thoại">
							</div>
							<div class="form-group">
								<textarea rows="8" class="form-control" placeholder="Note" name="note"></textarea>
							</div>
							<div class="form-group">
								<div class="input-checkbox">
									<input type="checkbox" id="register">
									<label class="font-weak" for="register">Tạo tài khoản?</label>
									<div class="caption">
										<p>Xin vui lòng nhập mật khẩu để tạo tài khoản mới !
											<p>
												<input class="input" type="password" name="pass" placeholder="Nhập mật khẩu">
									</div>
								</div>
							</div>
							<div class="pull-left">
								<button class="primary-btn" type="submit" name="sub">Đặt hàng</button>
							</div>
						</div>
					</div>

					<div class="col-md-6">

						<div class="payments-methods">
							<div class="section-title">
								<h4 class="title">Hình thức thanh toán</h4>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-1" checked>
								<label for="payments-1">Trả tiền mặt khi giao hàng</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-2">
								<label for="payments-2">Chuyển vào tài khoản ngân hàng</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
							<div class="input-checkbox">
								<input type="radio" name="payments" id="payments-3">
								<label for="payments-3">Thẻ ghi nợ</label>
								<div class="caption">
									<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.
										<p>
								</div>
							</div>
						</div>
					</div>
				</form>
			</div>
			<!-- /row -->
		</div>
		<!-- /container -->
	</div>
	<!-- /section -->
<?php require_once"view/footer.php" ?>