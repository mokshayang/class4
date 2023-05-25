<?php include_once "base.php";
$db = new db($_POST['tab']);
$db->del($_POST['id']);