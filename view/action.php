<?php 
session_start();
require"../model/shopModel.php";
$model = new shopModel;
if(isset($_POST['username'])){
	$kq = $model-> loginAccount($_POST['username'],$_POST['password']);
	if($kq){
		$_SESSION['iduser'] = $kq->id;
		$_SESSION['nameu'] = $kq->name;
		echo "yes";
	}
	else{
		echo "no";
	}
}

?>