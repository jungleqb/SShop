<?php 
require"view/_header.php";
ob_start(); 
$typeP = $model->getMenuParent();
?>
<!DOCTYPE html>
<html lang="en">

<head>
	  <base href="http://localhost/shop/shop/">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

	<title>E-SHOP HTML Template</title>

	<!-- Google font -->
	<link href="https://fonts.googleapis.com/css?family=Hind:400,700" rel="stylesheet">

	<!-- Bootstrap -->
	<link type="text/css" rel="stylesheet" href="public/template/css/bootstrap.min.css" />

	<!-- Slick -->
	<link type="text/css" rel="stylesheet" href="public/template/css/slick.css" />
	<link type="text/css" rel="stylesheet" href="public/template/css/slick-theme.css" />

	<!-- nouislider -->
	<link type="text/css" rel="stylesheet" href="public/template/css/nouislider.min.css" />

	<!-- Font Awesome Icon -->
	<link rel="stylesheet" href="public/template/css/font-awesome.min.css">

	<!-- Custom stlylesheet -->
	<link type="text/css" rel="stylesheet" href="public/template/css/style.css" />

	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<link rel="stylesheet" type="text/css" href="public/carousel/dist/assets/owl.carousel.min.css">
	<link rel="stylesheet" type="text/css" href="public/carousel/dist/assets/owl.theme.default.min.css">
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>

</head>

<body>
	<!-- HEADER -->
	<header>
		<!-- top Header -->
		<div id="top-header">
			<div class="container">
				<div class="pull-left">
					<span>Welcome to E-shop!</span>
				</div>
				<div class="pull-right">
					<ul class="header-top-links">
						<li><a href="#">Store</a></li>
						<li><a href="#">Newsletter</a></li>
						<li><a href="#">FAQ</a></li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">ENG <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">English (ENG)</a></li>
								<li><a href="#">Russian (Ru)</a></li>
								<li><a href="#">French (FR)</a></li>
								<li><a href="#">Spanish (Es)</a></li>
							</ul>
						</li>
						<li class="dropdown default-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">USD <i class="fa fa-caret-down"></i></a>
							<ul class="custom-menu">
								<li><a href="#">USD ($)</a></li>
								<li><a href="#">EUR (€)</a></li>
							</ul>
						</li>
					</ul>
				</div>
			</div>
		</div>
		<!-- /top Header -->

		<!-- header -->
		<div id="header">
			<div class="container">
				<div class="pull-left">
					<!-- Logo -->
					<div class="header-logo">
						<a class="logo" href="trang-chu">
							<img src="public/template/img/logo.png" alt="">
						</a>
					</div>
					<!-- /Logo -->

					<!-- Search -->
					<div class="header-search">
						<form>
							<input class="input search-input" type="text" placeholder="Enter your keyword">
							<select class="input search-categories">
								<option value="0">All Categories</option>
								<option value="1">Category 01</option>
								<option value="1">Category 02</option>
							</select>
							<button class="search-btn"><i class="fa fa-search"></i></button>
						</form>
					</div>
					<!-- /Search -->
				</div>
				<div class="pull-right">
					<ul class="header-btns">
						<!-- Account -->
						<li class="header-account dropdown default-dropdown">
							<div class="dropdown-toggle" role="button" data-toggle="dropdown" aria-expanded="true">
								<div class="header-btns-icon">
									<i class="fa fa-user-o"></i>
								</div>
								<strong class="text-uppercase"> 
									<?php 
										if(isset($_SESSION['user_id'])){
											echo $_SESSION['user_name'];
										}
										else{
											echo 'Tài khoản';
										}
									?>
									<i class="fa fa-caret-down"></i></strong>
							</div>

							<ul class="custom-menu">
								<li><a href="ca-nhan"><i class="fa fa-user-o"></i> Tài khoản của tôi</a></li>
								<li><a href="logout.php"><i class="fa fa-heart-o"></i> Sản phẩm yêu thích</a></li>
								<li><a href="thanh-toan"><i class="fa fa-check"></i> Thanh toán</a></li>
								<li><a href="dang-nhap"><i class="fa fa-unlock-alt"></i> Đăng nhập</a></li>
								<li><a href="dang-ky"><i class="fa fa-user-plus"></i> Tạo tài khoán mới</a></li>
								<!-- <li><a href="view/logout.php"><i class="fa fa-user-slash"></i> Đăng xuất</a></li> -->
							</ul>
						</li>
						<!-- /Account -->

						<!-- Cart -->
						<li class="header-cart dropdown default-dropdown">
							<a href="gio-hang" id="cart-popover" class="dropdown-toggle" >
								<div class="header-btns-icon">
									<i class="fa fa-shopping-cart"></i>
									<span class="qty" id="count"> 
									<?=$cart->countProduct();?>                                                  	
                          			</span>
								</div>
								<strong class="text-uppercase">My Cart:</strong>
								<br>
								<span class="total_price" id="total"> <?=number_format($cart->total());?>đ</span>
							</a>
						</li>
						<!-- /Cart -->

						<!-- Mobile nav toggle-->
						<li class="nav-toggle">
							<button class="nav-toggle-btn main-btn icon-btn"><i class="fa fa-bars"></i></button>
						</li>
						<!-- / Mobile nav toggle -->
					</ul>
				</div>
			</div>
			<!-- header -->
		</div>
		<!-- container -->
	</header>
	<!-- /HEADER -->
		<!-- NAVIGATION -->
	<div id="navigation">
		<!-- container -->
		<div class="container">
			<div id="responsive-nav">
				<!-- category nav -->
				<div class="category-nav show-on-click">
					<span class="category-header">Danh mục <i class="fa fa-list"></i></span>
					<ul class="category-list">
					<?php foreach($typeP as $tp):?>
					<?php $typeC = $model->getMenuChil($tp->id);?>

						<li class="dropdown side-dropdown">
							<a class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true"><?=$tp->name?> <i class="fa fa-angle-right"></i></a>
							<div class="custom-menu">
								<div class="row">
									<?php foreach($typeC as $tc): ?>
										<?php $typeCC = $model->getMenuChil($tc->id); ?>
									<div class="col-md-4">
										<ul class="list-links">
											<li>
												<h3 class="list-links-title"><?=$tc->name?></h3></li>
												<?php foreach($typeCC as $tcc): ?>
											<li><a href="<?=$tcc->nameKo?>"><?=$tcc->name?></a></li>
											<?php endforeach ?>

										</ul>
										<hr class="hidden-md hidden-lg">
									</div>

									<?php endforeach ?>
								</div>
							</div>
						</li>
					<?php endforeach ?>

						<li><a href="#">View All</a></li>
					</ul>
				</div>
				<!-- /category nav -->

				<!-- menu nav -->
				<div class="menu-nav">
					<span class="menu-header">Menu <i class="fa fa-bars"></i></span>
					<ul class="menu-list">
						<li><a href="trang-chu">Trang chủ</a></li>
						<li><a href="#">Bán hàng cùng K-Shop</a></li>
						<li><a href="#">Trung tâm hỗ trợ</a></li>
						<li><a href="#">Phản hồi Ý kiến</a></li>
					</ul>

				</div>
				<!-- menu nav -->
			</div>
		</div>
		<!-- /container -->
	</div>
	<!-- /NAVIGATION -->

	