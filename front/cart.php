<?php
if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if(!isset($_SESSION['mem'])){
    to("?do=login");
}
?>
<style>
a img{width: 80px;}
</style>
<h2 class="ct"><?=$_SESSION['mem']?> 的購物車</h2>
<?php 
if(isset($_SESSION['cart'])){
?>
<table class="all">
    <tr class="tt ct">
        <td >編號</td>
        <td >商品名稱</td>
        <td >數量</td>
        <td >庫存量</td>
        <td >單價</td>
        <td >小記</td>
        <td >刪除</td>
    </tr>
    <?php 
    foreach($_SESSION['cart'] as $id => $qt){
        $row = $Goods->find($id);
    ?>
    <tr class="pp ct">
        <td ><?=$row['no']?></td>
        <td ><?=$row['name']?></td>
        <td ><?=$qt?></td>
        <td ><?=$row['stock']?></td>
        <td ><?=$row['price']?></td>
        <td ><?=$row['price']*$qt?></td>
        <td >
            <img src="icon/0415.jpg" onclick="remove(this,<?=$id?>)" style="cursor:pointer">
        </td>
    </tr>
    <?php } ?>
</table>
<div class="ct">
    <a href="?"><img src="icon/0411.jpg" alt=""></a>
    <a href="?do=ord"><img src="icon/0412.jpg" alt=""></a>
</div>
<?php }else{ ?>
<h2 class="ct">
    您的購物車是空的 !!
</h2>
<?php } ?>
<script>
    function remove(dom,id){
        $.post("api/remove.php",{id},()=>{
            $(dom).parents('tr').remove()
            history.pushState(null,null,"?do=cart")
        })
    }
</script>


