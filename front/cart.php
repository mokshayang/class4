<?php

if (isset($_GET['id'])) {
    $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
}
if (!isset($_SESSION['mem'])) {
    to("index.php");
}

?>
<style>
    .num input{
        border: 0;
        background-color: transparent;
    }
</style>
<h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
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
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id);
    ?>
        <tr class="ct pp content">
            <td><?= $row['no'] ?></td>
            <td><?= $row['name'] ?></td>
            <td class="num">
                <input type="text" id="<?= $id ?>" value="<?= $qt ?>" onchange="num(<?= $id ?>)" style="width:40px;">
            </td>
            <td><?= $row['stock'] ?></td>
            <td><?= $row['price'] ?></td>
            <td><?= $row['price'] * $qt ?></td>
            <td >
                <img src="icon/0415.jpg" class="cu" onclick="remove(this,<?= $row['id'] ?>)">
            </td>
        </tr>
    <?php } ?>
</table>

<div class="ct" id="sub">
    <?php
    if (empty($qt)) {
    ?>
        <br> 您的購物車是空的 <br><br>
        <a href="?do=index.php"><img src="icon/0411.jpg" class="cu" style="width:100px"></a>
    <?php } else { ?>
        <a href="?do=index.php"><img src="icon/0411.jpg" class="cu" style="width:100px"></a>
        <a href="?do=ord"><img src="icon/0412.jpg" class="cu" style="width:100px"></a>
    <?php } ?>
</div>



<script>
    function num(id) {
        let num = $('#' + id).val();
        $.post("api/num.php", {id,num})
    }

    function remove(dom, id) {
        let div = `
        <br> 您的購物車是空的 <br><br>
                <a href="?do=index.php">
                    <img src="icon/0411.jpg" class="cu" style="width:100px">
                </a>
                `
        $.post("api/remove.php", {
            id
        }, () => {
            $(dom).parents('tr').remove();
            history.pushState(null, null, "?do=cart");
            let table = $('.all');
            let row = table.find('.content');
            if (row.length == 0) {
                $('#sub').empty().append(div)
            }
        })
    }
</script>