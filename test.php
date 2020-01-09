<?php 
require_once"vendor/autoload.php";

if(!session_id()){
	session_start();
}

$facebook = new \Facebook\Facebook([
	'app_id' => '2389593001339406',
	'app_secret' => 'a032fec8ad7623cd67cdf8750f1b3e65',
	'default_graph_version' => 'v2.10'
]);

?>