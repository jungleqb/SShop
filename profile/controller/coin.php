<style type="text/css">
	.c li{
		padding: 0px 50px;
		font-size: 18px  ;
	}
</style>
<div class="row" style="height:80px">
	<div class="col-md-6">
		<img src="upload/coin.png" width="60px">
		<span style="font-size: 28px; color: #f6a700; margin-left: 10px; "><?=$acc->coinTotal?></span>
		<span style="color: #f6a700">Xu đang có</span>
	</div>
	<div class="col-md-6" align="right">
		<a href="">Nhận thêm xu >></a>
	</div>
</div>
<hr>
<?php 
if(isset($_GET['act'])){
	$act = $_GET['act']; 
}
else{
	$act = "all";
}
switch ($act) {
	case 'all':
		require_once 'profile/view/coin/all.php';
		break;

	case 'in':
		$show = $pmodel->getProductWaitCheck($_SESSION['iduser'],3);
		require_once'profile/view/coin/in.php';
		break;
	case 'out':
		
		require_once'profile/view/coin/out.php';
		break;
	
	default:
		# code...
		break;
}
?>
