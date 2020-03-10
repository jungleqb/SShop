<?php require_once"view/header.php"; 
require_once"model/proModel.php";
$pmodel = new proModel;
if(empty($_SESSION['iduser'])){
	header("location:dang-nhap");
}
$acc = $model->getAccount($_SESSION['iduser']);

?>


<section class="tong">
	<div class="container">
		<div class="row tong1" >
<?php require_once"profile/view/sidebar.php" ?>
			<div class="col-md-9 right" >
			<div class="titilecon">
<?php 
if(isset($_GET['com'])){
	$com = $_GET['com'];
}
else{
	$com = 'home';
}
switch ($com) {
	case 'home':
		
		require_once"profile/controller/home.php";
		break;

	case 'bill':
		
		require_once"profile/controller/bill.php";
		break;
	case 'coin':

		require_once"profile/controller/coin.php";
		break;
	
	default:
		require_once"profile/controller/home.php";
		break;
}


?>




			</div>
		</div>
	</div>
</section>

<?php require_once"view/footer.php" ?>