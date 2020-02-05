<?php require_once "view/header.php";
require_once "model/shopModel.php";
$model = new shopModel;
if(isset($_POST['sm'])){
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $data = $model->loginAccount($mail,$pass);
    if($data){
        $_SESSION['tokenid'] = $data->token;
        $_SESSION['nameu']=$data->ten;
        $_SESSION['iduser']=$data->id;
        header("location:ca-nhan");
        return;
    }
    else{
        $message = 'Tài khoản không đúng';
    }
}



?>

<section style="background: #f5f5f5">
	<div class="container">
		<div class="row" style="padding:50px 0px">
			<div class="col-md-8"><span style="font-size: 28px">Chào mừng đến với Kshop. Đăng nhập ngay!<span></div>
			<div class="col-md-4">Thành viên mới? <a href="dang-ky">Đăng kí</a> tại đây</div>
		</div>
		<div class="row" style="background: white; padding: 50px 220px;">
		<form method="POST">
			<div class="col-md-8">
				<div class="form-group">
				    <label for="exampleInputEmail1">Email*</label>
				    <input type="email" name="mail" placeholder="Vui lòng nhập email của bạn" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
				</div>
				<div class="form-group">
				    <label for="exampleInputPassword1">Mật khẩu*</label>
				    <input type="password" name="pass" placeholder="Vui lòng nhập mật khẩu của bạn" class="form-control" id="exampleInputPassword1">
				</div>
				<a href="">Quên mật khẩu?</a>
			</div>
			<div class="col-md-4" style="padding-top: 25px">
				<button type="submit" class="primary-btn add-to-cart" style="width: 100%">Đăng nhập</button>
				<p style="font-size: 12px; padding-top: 5px">Hoặc đăng nhập bằng</p>
				
          		    <img src="upload/loginfb.png" width="100%">
			</div>
		</form>
		</div>
	</div>
</section>


<?php require"view/footer.php" ?>	
	

	
	
