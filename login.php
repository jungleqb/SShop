<?php require_once "view/header.php";
if(isset($_SESSION['iduser'])){
	header("location:ca-nhan");
}
if(isset($_POST['sm'])){
    $mail = $_POST['mail'];
    $pass = $_POST['pass'];
    $data = $model->loginAccount($mail,$pass);
    if($data){
        $_SESSION['nameu']=$data->name;
        $_SESSION['iduser']=$data->id;
        header("location:ca-nhan");
        return;
    }
    else{
        $err = 'Tài khoản không đúng';
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
			<span style="color:red"><?php if(isset($err)) echo $err?></span>
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
				<a style="cursor: pointer;" data-toggle="modal" data-target="#loginModal" >Quên mật khẩu?</a>
			</div>
			<div class="col-md-4" style="padding-top: 25px">
				<button type="submit" name="sm" class="primary-btn add-to-cart" style="width: 100%">Đăng nhập</button>
				<p style="font-size: 12px; padding-top: 5px">Hoặc đăng nhập bằng</p>
				
          		    <img src="upload/loginfb.png" width="100%">
			</div>
		</form>
		</div>
	</div>
</section>
<!-- The Modal -->
					<div id="loginModal" class="modal fade" role="dialog">  
				      <div class="modal-dialog">  
				   <!-- Modal content-->  
				           <div class="modal-content">  
				                <div class="modal-header">  
				                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
				                     <h4 class="modal-title">Mail đã đăng ký</h4>  
				                </div>  
				                <div class="modal-body"> 

				                     <label>Mail</label>  
				                     <input type="email" name="rpmail" id="rpmail" class="form-control" />  
				                     <br />   
				                     <button type="button" name="login_button" id="login_button" class="primary-btn add-to-cart">Gửi</button>  
				                </div>  
				           </div>  
				      </div>  
				 </div> 
<script>
// Get the modal
$(document).ready(function(){
	$('#login_button').click(function(){  
           var rpmail = $('#rpmail').val();   
           if(rpmail != '')  
           {  
                $.ajax({  
                     url:"view/checkcode.php",  
                     method:"POST",  
                     data: {rpmail:rpmail},  
                     success:function(data)  
                     {  
                          //alert(data);  
                          if(data = 'no')  
                          {  
                               alert("Email chưa được đăng ký");  
                          }  
                          else  
                          {  
                               $('#loginModal').hide();
                               alert("Mật khẩu đã gửi ở email"); 
                               window.location = 'ca-nhan';  
                                 
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

<?php require"view/footer.php" ?>	
	

	
	
