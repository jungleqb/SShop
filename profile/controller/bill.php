
<?php 
if(isset($_GET['act'])){
	$act = $_GET['act'];
}
else{
	$act = 'all';
}

switch ($act) {
	case 'all':
		$all = $pmodel->getProductByUser($_SESSION['iduser']);
		require_once"profile/view/bill/all.php";
		break;
	case 'waitcheck':
		$waitcheck = $pmodel->getProductWaitCheck($_SESSION['iduser'],0);
		require_once"profile/view/bill/waitcheck.php";
		break;
	case 'waitproduct':
		$waitproduct = $pmodel->getProductWaitCheck($_SESSION['iduser'],1);
		require_once"profile/view/bill/waitproduct.php";
		break;
	case 'danggiao':
		$danggiao = $pmodel->getProductWaitCheck($_SESSION['iduser'],2);
		require_once"profile/view/bill/danggiao.php";
		break;
	case 'dagiao':
		$dagiao = $pmodel->getProductWaitCheck($_SESSION['iduser'],3);
		require_once"profile/view/bill/dagiao.php";
		break;
	case 'dahuy':
		$dahuy = $pmodel->getProductWaitCheck($_SESSION['iduser'],4);
		require_once"profile/view/bill/dahuy.php";
		break;

	default:
		# code...
		break;
}
?>