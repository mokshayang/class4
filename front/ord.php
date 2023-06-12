<?php
$row = $Mem->find(['acc' => $_SESSION['mem']]);
?>
<style>
.all{
    margin: -1px auto;
}
</style>
<h2 class="ct">填寫資料</h2>
<table class="all">
    <tr>
        <td class="ct tt">個人帳號</td>
        <td class="pp">
            &nbsp; <?= $row['acc'] ?>
        </td>
    </tr>
    <tr>
        <td class="ct tt">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="<?= $row['name'] ?>">
        </td>
    </tr>
    <tr>
        <td class="ct tt">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email" value="<?= $row['email'] ?>">
        </td>
    </tr>
    <tr>
        <td class="ct tt">聯絡地址</td>
        <td class="pp">
            <input type="text" name="addr" id="addr" value="<?= $row['addr'] ?>">
        </td>
    </tr>
    <tr>
        <td class="ct tt">聯絡電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel" value="<?= $row['tel'] ?>">
        </td>
    </tr>
</table>

<table class="all">
    <tr class="ct tt">
        <td>商品名稱</td>
        <td>編號</td>
        <td>數量</td>

        <td>單價</td>
        <td>小記</td>
    </tr>
    <?php
    $sum = 0;
    foreach ($_SESSION['cart'] as $id => $qt) {
        $row = $Goods->find($id);
        $sum += $row['price']*$qt;
    ?>
        <tr class="ct pp content">
            <td><?= $row['no'] ?></td>
            <td><?= $row['name'] ?></td>
            <td><?= $qt ?></td>

            <td><?= $row['price'] ?></td>
            <td><?= $row['price'] * $qt ?></td>
        </tr>
    <?php } ?>
</table>
<table class="all">
    <tr class="ct tt">
        <td>
            總價: <?=$sum?>
        </td>
    </tr>
</table>
<br>
<div class="ct">
    <button onclick="ord()">確定送出</button>
    <button onclick="of('?do=cart')">返回修改訂單</button>
</div>
<script>
    function ord(){
        let ord = {
            name : $('#name').val(),
            email : $('#email').val(),
            tel : $('#tel').val(),
            addr : $('#addr').val(),
            total : <?=$sum?>
        }
        $.post("api/ord.php",ord,()=>{
            alert("訂購成功")
            of('?do=index.php')
        })
    }
</script>