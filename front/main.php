<?php
if(isset($_GET['type']) && $_GET['type'] !=0){
    $type = $Type->find($_GET['type']);
    if($type['parent'] == 0){
        $nav = $type['name'];
        $rows = $Goods->all(['sh'=>1,'big'=>$type['id']]);
    }else{
        $bb = $Type->find($type['parent']);
        $nav = $bb['name']." > ".$type['name'];
        $rows = $Goods->all(['sh'=>1,'mid'=>$type['id']]);
    }
}else{
    $nav = "全部商品";
    $rows = $Goods->all(['sh'=>1]);
}
?>
<h2><?=$nav?></h2>
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
    box-shadow: 0 1px 3px #00000070;
}
.ii{width: 160px;height: 120px;}
.goods{
    display: grid;
    grid-auto-flow: row;
    grid-gap: 2px;
    box-shadow: 0 1px 3px #00000070;
}
.goods div{display: flex;align-items: center;}
.goods div:nth-child(1){justify-content: center;}
.icon{margin-left: auto;}
.icon img{width: 72px;}
</style>
<?php
foreach($rows as $row){
?>
<div class="item">
    <div class="left pp">
        <a href="?do=detail&id=<?=$row['id']?>">
            <img src="upload/<?=$row['img']?>" class="ii">
        </a>
    </div>
    <div class="goods">
        <div class="tt"><?=$row['name']?></div>
        <div class="pp">
            <?=$row['price']?>
            <a href="?do=cart&id=<?=$row['id']?>&qt=1" class="icon">
                <img src="icon/0402.jpg" alt="">
            </a>
        </div>
        <div class="pp"><?=$row['spec']?></div>
        <div class="pp"><?=$row['intro']?></div>
    </div>
</div>
<?php } ?>