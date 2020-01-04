<?php require_once"view/header.php" ?>
<style type="text/css">
	.tong{
		min-height: 600px;
		background: #f5f5f5;

	}
	.tong1{
		margin-top:20px 
	}
	.tong1 .left{
		padding: 30px;
	}
	.tong1 .right{
		background: white;
		padding: 30px;
		border: 0.5px solid #cccccccc;
	}
	.avatar {
	  vertical-align: middle;
	  width: 50px;
	  height: 50px;
	  border-radius: 50%;
	  float: left;
	  margin-right: 20px; 
	}
	.name{
		padding-top: 10px;
		font-weight:bold;
		padding-bottom: 10px;
		border-bottom: 1px solid white; 
	}
	.editname{
		font-weight: normal;
		color: #999;
	}
	.menubar{
		padding: 30px 10px ;
	}
	.menubar>ul>li{
		padding: 5px;
	}
	.menubar>ul>li>a{
		padding-left: 20px; 
		font-size: 16px;
	}
	.titilecon{
		padding-bottom: 10px; 
		border-bottom: 1px solid #f5f5f5;
	}
	.contentcon{
		padding-top: 60px;
	}
	.btncc{
		border: none;
		padding: 5px 15px;
		background: #F8694A;
		color: white;
	}
	.btncc:hover{
		opacity: 0.8;
	}
</style>
<section class="tong">
	<div class="container">
		<div class="row tong1" >
			<div class="col-md-3 left" >
				<img src="upload/avatar.jpg" alt="Avatar" class="avatar">
				<div class="name">
						Văn Hải
					<p class="editname">
						<a href=""><i class="fa fa-edit"></i> Sửa Hồ Sơ</a>
					</p>
				</div>

				<div class="menubar">
					<ul>
						<li><h4><i style="color:#F8694A " class="fa fa-user"></i> Tài khoản của tôi</h4></li>
						<li><a href="#">Hồ sơ</a></li>
						<li><a href="#">Địa chỉ</a></li>
						<li><a href="#">Thêm mật khẩu</a></li>
						<li><h4><a href=""><i style="color:#F8694A " class="fa fa-clipboard"></i> Đơn Mua</a></h4></li>
						<li><h4><a href=""><i style="color:#F8694A " class="fa fa-bitcoin"></i> Tiền Xu</a></h4></li>
					</ul>
				</div>
			</div>
			<div class="col-md-9 right" >
				<div class="titilecon">
				<p><span style="font-size: 24px;">Hồ Sơ Của Tôi</span>  đã tham gia : 22-12-2000</p>
				Quản lý thông tin hồ sơ để bảo mật tài khoản.
				</div>
				<div class="contentcon">
					<div class="row">
						<div class="col-md-9">
							<form class="form-horizontal" method="POST">
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Tên </label>
							    <div class="col-sm-9">
							      <input type="text" name="ten" value="" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Email </label>
							    <div class="col-sm-9">
							      <input type="text" name="mail" value="" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>
							  <div class="form-group">
							    <label class="control-label col-sm-3" for="text">Số điện thoại </label>
							    <div class="col-sm-9">
							      <input type="text" name="sdt" value="" class="form-control" id="text" placeholder="Enter text">
							    </div>
							  </div>

							  <div class="form-group">
							    <div class="col-sm-offset-3 col-sm-9">
							      <button type="submit" name="sm" class="btncc">Lưu</button>
							    </div>
							  </div>
							</form>
						</div>
						<div class="col-md-3">

						</div>
					</div>
					<!--  -->
				</div>
			</div>
		</div>
	</div>
</section>

<?php require_once"view/footer.php" ?>