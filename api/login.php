<?php include_once "base.php";
$db = new db($_POST['tab']);
$tab = $_POST['tab'];
unset($_POST['tab']);
$chk = $db->count($_POST);
if($chk) $_SESSION[$tab] = $_POST['acc'];
echo $chk;