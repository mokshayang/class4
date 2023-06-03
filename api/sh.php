<?php include_once "base.php";
$sh = $Goods->find($_POST['id']);
$sh['sh'] = ($_POST['type'] ==1)?1:0;
$Goods->save($sh);
