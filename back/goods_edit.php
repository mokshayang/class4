<h2 class="ct">修改商品</h2>
<?php
$row = $Goods->find($_GET['id']);
?>
<form action="api/goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="ct tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big" onclick="getMid()"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品編號</td>
            <td class="pp">
                <?=$row['no']?>
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" value="<?=$row['name']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price" value="<?=$row['price']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp">
                <input type="text" name="spec" value="<?=$row['price']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" value="<?=$row['stock']?>">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" >
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp">
                <textarea name="intro"  cols="60" rows="6"><?=$row['intro']?></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="hidden" name="id" value="<?=$row['id']?>">
        <input type="submit" value="修改"> |
        <input type="reset" value="重置"> |
        <button onclick="history.go(-1)" type="button">返回</button>
    </div>
</form>
<script>
    let gg = {
        big : <?=$row['big']?>,
        mid : <?=$row['mid']?>,
    }
    $('#big').load("api/type_bm.php",{parent:0},()=>{
        $(`option[value=${gg.big}]`).prop('selected',true)
        getMid()
    })
    function  getMid(){
        $('#mid').load("api/type_bm.php",{parent:$('#big').val()},()=>{
            $(`option[value=${gg.mid}]`).prop('selected',true)
        })
    }
</script>