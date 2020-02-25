<?php 
session_start();
unset($_SESSION['iduser']);
header('location:dang-nhap');
?>