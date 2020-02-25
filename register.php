<?php require_once "view/header.php";

$error = array();

if(isset($_POST['sm'])){
	if(empty($_POST['name'])) $error[] = 'name'; else $name = $_POST['name'];
	if(empty($_POST['mail'])) $error[] = 'mail'; else $mail = $_POST['mail'];
	if(empty($_POST['pass'])) $error[] = 'pass'; else $pass = $_POST['pass'];
	if(empty($_POST['rpass'])) $error[] = 'rpass'; else $rpass = $_POST['rpass'];

	if(empty($error)){
		if($pass == $rpass){
			$codeToken = createToken(6);
			$body = 'Mã xác nhận mail <br><h3>'.$codeToken.'</h3>';
			$tmail = sendMail($mail,$body);
			if($tmail){
				$output = '
					<i>*Mã đã gửi về mail của bạn. Xin vui lòng xác nhận</i>
					<div class="form-group">
				    <label for="exampleInputEmail1">Mã xác nhận </label>
				    <input type="text" name="token" placeholder="Mã xác nhận mail của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					</div>
					<button type="submit" name="xm" class="primary-btn" style="width: 100%">Xác nhận</button>
				';

				
				
			}
			

		}
		else{
			$mess = "* Mật không nhập lại không trùng khớp";
		}
	}
	else{
		$mess = "* Xin vui lòng điền đủ thông tin";
	}

if($output){
					if(isset($_POST['xm'])){
						$token = $_POST['token'];
						if($token == $codeToken){
							$a = $model->register($name,$mail,$pass);
							if($a){
								$mess = "Success!";
							}
						}
					}					
				}
}
				
	

?>

<section style="background: #f5f5f5">
	<div class="container">
		<div class="row" style="padding:50px 0px">
			<div class="col-md-8"><span style="font-size: 28px">Tạo tài khoản Kshop<span></div>
			<div class="col-md-4">Bạn đã là thành viên ? <a href="dang-nhap">Đăng nhập</a> tại đây</div>
		</div>
		<div class="row" style="background: white; padding: 50px 220px;">
			<p style="color:red"><?php if(isset($mess)) echo $mess ?></p>
		<form method="POST">
			<div class="col-md-7">
				<div class="form-group">
				    <label for="exampleInputEmail1">Email*</label>
				    <input type="email" name="mail" value="<?php if(isset($mail)) echo $mail?>" placeholder="Vui lòng nhập email của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Mật khẩu*</label>
				    <input type="password" name="pass" value="<?php if(isset($pass)) echo $pass?>" placeholder="Vui lòng nhập mật khẩu của bạn" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Nhập lại mật khẩu*</label>
				    <input type="password" name="rpass" value="<?php if(isset($rpass)) echo $rpass?>" placeholder="Vui lòng nhập mật khẩu của bạn" class="form-control" id="exampleInputPassword1">
				</div>
					<?php 
					if(isset($output)){
						echo $output;
					}
				?>
				
			</div>

			<div class="col-md-5">
				<div class="form-group">
				    <label for="exampleInputEmail1">Họ tên*</label>
				    <input type="text" name="name" value="<?php if(isset($name)) echo $name?>" placeholder="Vui lòng nhập họ tên của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>

				<button type="submit" name="sm" class="primary-btn" style="width: 100%">Đăng ký</button>
				<p style="font-size: 12px; padding-top: 5px">Hoặc đăng ký bằng</p>
				
          		    <img src="upload/loginfb.png" width="100%">

			</div>
		</form>
		</div>
	</div>
</section>


<?php require"view/footer.php" ?>	
	

	
	
