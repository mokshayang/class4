<?php
$row = $Goods->find($_GET['id']);
$str = $Type->find(['id'=>$row['big']])['name'] ;
$str .= " > ";
$str .= $Type->find(['id'=>$row['mid']])['name'] ;

?>
<h2><?=$row['name']?></h2>
<style>
.item{
    display: grid;
    grid-template-columns: 2fr 5fr;
    grid-gap: 2px;
    margin-top: 10px;
}
.left{
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 10px;
    box-shadow: 0 -1px 3px #00000070;
}
.ii{width: 160px;height: 120px;}
.goods{
    display: grid;
    grid-auto-flow: row;
    grid-gap: 2px;
    box-shadow: 0 -1px 3px #00000070;
}
.goods div{display: flex;align-items: center;padding: 2px;}
.goods div:nth-child(1){justify-content: center;}
.icon{display: flex;align-items: center;justify-content: center;box-shadow: 0 1px 3px #00000070;}
.icon img{width: 80px;cursor: pointer;}
</style>

<div class="item">
    <div class="left pp">
            <img src="upload/<?=$row['img']?>" class="ii">
    </div>
    <div class="goods">
        <div class="tt"><?=$str?></div>
        <div class="pp">編號 : <?=$row['no']?></div>
        <div class="pp">價格 : <?=$row['price']?></div>
        <div class="pp">簡介 : <?=$row['intro']?></div>
        <div class="pp">庫存量 : <?=$row['stock']?></div>
    </div>
</div>
<div class="icon tt">
    購買數量 
    <input type="number" name="" id="qt" value="1" min=1>
    <img src="icon/0402.jpg" onclick="cart()">
</div>
<script>
    function cart(){
        let qt = $('#qt').val();
        of(`?do=cart&id=<?=$row['id']?>&qt=${qt}`)
    }
    // 數量防呆

    $("input[type='number']").each(function() {
        if (isNaN(parseFloat($(this).val())) || parseFloat($(this).val()) < 1) {
            $(this).val(1);
        }
    });

    // 监听输入字段的变化事件
    $("input[type='number']").on("change", function() {
        var inputValue = parseFloat($(this).val());
        
        if (isNaN(inputValue) || inputValue < 1) {
            alert("请输入有效的数字，最小值为1。");
            $(this).val(1); // 将输入值重置为最小值
        }
    });

</script>
