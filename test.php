<?php 
require_once"model/shopModel.php";
$model = new shopModel;
require_once"vendor/autoload.php";

if(!session_id()){
	session_start();
}

$facebook = new \Facebook\Facebook([
	'app_id' => '2389593001339406',
	'app_secret' => 'a032fec8ad7623cd67cdf8750f1b3e65',
	'default_graph_version' => 'v2.10'
]);
$facebook_output = '';

$facebook_helper = $facebook->getRedirectLoginHelper();

if(isset($_GET['code'])){
	if(isset($_GET['access_token'])){
		$access_token = $_SESSION['access_token'];
	}
	else{
		$access_token = $facebook_helper->getAccessToken();
		$_SESSION['access_token'] = $access_token;
		$facebook->setDefaultAccessToken($_SESSION['access_token']);
	}
	$graph_response = $facebook->get("/me?fields=id,names", $access_token);
	$facebook_user_info = $graph_response->getGraphUser();
	if(!empty($facebook_user_info['id'])){
		$_SESSION['user_image'] = 'http://graph.facebook.com/'.$facebook_user_info['id'].'/picture';
	}
	if(!empty($facebook_user_info['name'])){
		$_SESSION['user_name'] = $facebook_user_info['name'];
	}
	if(!empty($facebook_user_info['email'])){
		$_SESSION['user_email'] = $facebook_user_info['email'];
	}
	if(!empty($facebook_user_info['id'])){
		$_SESSION['user_id'] = $facebook_user_info['id']; 
	}
	if(isset($_SESSION['user_id'])){
		$name = $_SESSION['user_name'];
		$idfb = $_SESSION['user_id'];
		$mail = $_SESSION['user_email'];
		$c = $model->setLoginFacebook($idfb,$name,$mail);
	}
}
else{
	$facebook_permissions = ['email'];

	$facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/shop/shop/login.php',$facebook_permissions);

	$facebook_login_url = '<a href="'.$facebook_login_url.'"><img src="upload/loginfb.png" width="100%"></a>';
}



?>