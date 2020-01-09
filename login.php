<?php require_once "view/header.php";
include'test.php';
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
	$graph_response = $facebook->get("/me?fields=name,email", $access_token);
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
}
else{
	$facebook_permissions = ['email'];

	$facebook_login_url = $facebook_helper->getLoginUrl('http://localhost/shop/shop/login.php',$facebook_permissions);

	$facebook_login_url = '<div align="center"><a href="'.$facebook_login_url.'"><img src="loginfb.png"></a></div>';
}
?>

<section>
	<div class="container">
		<div class="row">
			<?php
				if(isset($facebook_login_url)){
					echo $facebook_login_url;
				}
				else{
					echo '<div class="panel-heading">Welcome User'.$_SESSION['user_name'].'</div>';
					echo '<a href="view/logout.php">Logout</a>';
				}
			?>
		</div>
	</div>
</section>


<?php require"view/footer.php" ?>	
	

	
	
