<?php include_once "base.php";
dd($_POST['ads']);
dd($_POST['id']);
dd($_POST['sh']);


if(isset($_POST['id'])){
    foreach($_POST['id'] as $key => $id){
        $Ad->save(['id'=>$id,'text'=>$_POST['ads'][$key],'sh'=>(in_array($id,$_POST['sh'])?1:0)]);
    }
}


if(isset($_POST['add']) ){
    foreach($_POST['add'] as $add){
        if(trim($add)){
            $Ad->save(['text'=>$add]);
        }
    }
}
to("../admin.php?do=news");

