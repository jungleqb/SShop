<?php 

require"model/DBConnect.php";
require"controller/cartController.php";
require"model/shopModel.php";
require"helper/PHPMailer/sendmail.php";
require"helper/functions.php";

$model = new shopModel();
$DB = new DBConnect();
$cart = new cart($DB);
?>