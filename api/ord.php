<?php include_once "base.php";
$_POST['acc'] = $_SESSION['mem'];
$_POST['no'] = date("Ymd").rand(100000,999999);
$_POST['cart'] = serialize($_SESSION['cart']);
$Ord->save($_POST);
// unset($_SESSION['cart']);
// unset($_SESSION['cart']['id']);
$_SESSION['cart'] = array();
