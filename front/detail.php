<?php
$row = $Goods->find($_GET['id']);
$str =$Type->find(['id'=>$row['big']])['name'];
$str .=" > ";
$str .=$Type->find(['id'=>$row['mid']])['name'];
?>
<h2><?=$row['name']?></h2>
<style>
.item{
    display: grid;
    grid-template-columns: 3fr 5fr;
    grid-gap: 2px;
    margin-top: 10px;
}
.left{display: flex;justify-content: center;align-items: center;}
.ii{width: 200px;height: 150px;}
.goods{
    display: grid;
    grid-auto-flow: row;
    grid-gap: 2px;
}
.goods div{display: flex;align-items: center;}
.goods div:nth-child(1){justify-content: center;}
.pp{padding: 2px;padding-left: 5px;}
/* .icon{display: flex;align-content: center;} */
.tt{display: flex;justify-content: center;align-items: center;}
.tt img{width: 80px;cursor: pointer;}
</style>

<div class="item">
    <div class="left pp">
        <img src="upload/<?=$row['img']?>" class="ii">
    </div>
    <div class="goods">
        <div class="pp">分類 : <?=$str?></div>
        <div class="pp">編號 : <?=$row['no']?></div>
        <div class="pp">
            價格 : <?=$row['price']?>
            <!-- <a href="?do=cart&id=<?=$row['id']?>&qt=1" class="icon"><img src="icon/0402.jpg" alt=""></a> -->
        </div>
        <div class="pp">詳細說明 : <?=$row['intro']?></div>
        <div class="pp">庫存量 : <?=$row['stock']?></div>
    </div>
</div>
<div class="ct tt">
    購買數項
    <input type="number" name="" id="qt" value="1">
    <img src="icon/0402.jpg" class="img" onclick="cart()">
</div>
<div class="ct">
    <button onclick="history.go(-1)">返回</button>
</div>
<script>
    function cart(){
        let qt = $('#qt').val();
        of(`?do=cart&id=<?=$row['id']?>&qt=${qt}`);
    }
</script>
