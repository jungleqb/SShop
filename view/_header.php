<?php 

require"model/DBConnect.php";
require"controller/cartController.php";
$DB = new DBConnect();
$cart = new cart($DB);
?>