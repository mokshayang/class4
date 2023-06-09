<?php
if(isset($_GET['id'])){
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if(!isset($_SESSION['mem'])){
    to("index.php");
}
?>
<style>
    .num input{
        border: 0;
        background-color: transparent;
        width: 40px;
    }
    .bbt{
        width: 100px;
    }
</style>
<h2 class="ct"><?=$_SESSION['mem']?>的購物車</h2>
<table class="all">
    <tr class="ct tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>數量</td>
        <td>庫存量</td>
        <td>單價</td>
        <td>小記</td>
        <td>刪除</td>
    </tr>
    <?php  
    if(isset($_SESSION['cart'])){
    foreach($_SESSION['cart'] as $id => $qt){
        $row = $Goods->find($id);
        $total[]=$qt;
    ?>
    <tr class="ct pp content">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td class="num">
            <input type="text" id="<?=$id?>" value="<?=$qt?>" onchange="getNum(<?=$row['id']?>)">
        </td>
        <td><?=$row['stock']?></td>
        <td><?=$row['price']?></td>
        <td><?=$row['price']*$qt?></td>
        <td>
            <img src="icon/0415.jpg" class="cu" onclick="remove(this,<?=$row['id']?>)">
        </td>
    </tr>
    <?php } } ?>
</table>
<div class="ct" id="ord">
    <?php
    if(empty($total) || !isset($_SESSION['cart'])){
    ?>
        <br>您的購物車是空的<p></p>
        <a href="index.php"><img src="icon/0411.jpg" class="bbt"></a>
    <?php }else{ ?>
        <a href="index.php"><img src="icon/0411.jpg" class="bbt"></a>
        <a href="?do=ord"><img src="icon/0412.jpg" class="bbt"></a>
    <?php } ?>
</div>
<script>
    function getNum(id){
        let num = $('#'+id).val()
        $.post("api/num.php",{id,num})
        let url = new URL(window.location.href);
        url.searchParams.set('qt', num);
        history.pushState(null, null, url.toString());
    }
    function remove(dom,id){
        let div = `
                    <br>您的購物車是空的<p></p>
                    <a href="index.php">
                        <img src="icon/0411.jpg" class="bbt">
                    </a>
                    `
        $.post("api/remove.php",{id},()=>{
            $(dom).parents('tr').remove()
            history.pushState(null,null,'?do=cart')
            let table = $('.all')
            let row = table.find('.content')
            if(row.length == 0){
                $('#ord').remove().append(div)
            }
            location.reload();
        })
    }
</script>

