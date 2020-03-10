<?php 
session_start();
require"../model/shopModel.php";
require"../helper/PHPMailer/sendmail.php";
$model = new shopModel;
if(isset($_POST['code'])){
	if($_POST['code'] == $_SESSION['acc']['token']){
		$kq = $model->register($_SESSION['acc']['name'], $_SESSION['acc']['mail'], $_SESSION['acc']['pass']);
		$ac = $model->loginAccount($_SESSION['acc']['mail'], $_SESSION['acc']['pass']);
		$_SESSION['iduser'] = $ac->id;
		$_SESSION['nameu'] = $ac->name;
		unset($_SESSION['acc']);
		echo 'ok';
	}
	else{
		echo 'not';
	}
	
}
if(isset($_POST['rpmail'])){
	$a = $model->checkMail($_POST['rpmail']));
	if($a){
		$b = sendMail($_POST['rpmail'],$a->pass);
		if($b){
			echo 'yes';
		}
		
	}
	else{
		echo 'no';
	}
}

?>