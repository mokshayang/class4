<h2 class="ct">商品分類 </h2>
<div class="ct">
    新增大分類
    <input type="text" name="" id="big" >
    <button onclick="add('big')">新增</button>
</div>
<div class="ct">
    新增中分類
    <select name="" id="b">
        <?php
        $rows = $Type->all(['parent'=>0]);
        foreach($rows as $row){
            echo "<option value={$row['id']}>";
            echo $row['name'];
            echo "</option>";
        }
        ?>
    </select>
    <input type="text" name="" id="mid" >
    <button onclick="add('mid')">新增</button>
</div>
<table class="all ct">
    <?php
    foreach($Type->all(['parent'=>0]) as $bb){
    ?>
    <tr class="tt">
        <td ><?=$bb['name']?></td>
        <td>
            <button onclick="edit(this,<?=$bb['id']?>)">修改</button>
            <button onclick="del('type',<?=$bb['id']?>)">刪除</button>
        </td>
    </tr>
    <?php
    foreach($Type->all(['parent'=>$bb['id']]) as $mm){
    ?>
    <tr class="pp">
        <td><?=$mm['name']?></td>
        <td>
            <button onclick="edit(this,<?=$mm['id']?>)">修改</button>
            <button onclick="del('type',<?=$mm['id']?>)">刪除</button>
        </td>
    </tr>
    <?php }} ?>
</table>
<script>
    function add(type){
        let parent = (type == "big") ? 0 : $('#b').val();
        let name = (type == "big") ? $('#big').val() : $('#mid').val();
        $.post("api/type.php",{parent,name},()=>{
            location.reload();
        })
    }
    function edit(dom,id){
        let name = prompt("請修改名稱",$(dom).parent().prev().text());
        if(name){
        $.post("api/type.php",{name,id},()=>{
            $(dom).parent().prev().text(name)
        })
    }
    }
</script>

<h2 class="ct">商品管理</h2>
<div class="ct">
    <button onclick="of('?do=goods_add')">新增商品</button>
</div>
<table class="all">
    <tr class="tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    foreach($Goods->all() as $row){
    ?>
    <tr class="pp">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['stock']?></td>
        <td><?=($row['sh']==1) ? "販售中" : "已下架" ;?></td>
        <td>
            <button onclick="of('?do=goods_edit&id=<?=$row['id']?>')">修改</button>
            <button onclick="del('goods',<?=$row['id']?>)">刪除</button>
            <button onclick="sh(1,this,<?=$row['id']?>)">上架</button>
            <button onclick="sh(2,this,<?=$row['id']?>)">下架</button>
        </td>
    </tr>
    <?php } ?>
</table>
<script>
    function sh(type,dom,id){
        $.post("api/sh.php",{type,id},()=>{
            $(dom).parent().prev().text((type==1)?'販售中':'已下架')
        })
    }
</script>