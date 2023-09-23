<h2 class="ct">商品分類</h2>
<div class="ct">
    新增大分類
    <input type="text" name="" id="big">
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
    <input type="text" name="" id="mid">
    <button onclick="add('mid')">新增</button>
</div>
<table class="all">
    <?php
    
    $bb = $Type->all(['parent'=>0]);
    foreach($bb as $b){
    ?>
    <tr class="ct tt">
        <td><?=$b['name']?></td>
        <td>
            <button onclick="edit(this,<?=$b['id']?>)">修改</button>
            <button onclick="del(this,'type',<?=$b['id']?>)">刪除</button>
        </td>
    </tr>
    <?php
    $mm = $Type->all(['parent'=>$b['id']]);
    foreach($mm as $m){
    ?>
    <tr class="ct pp">
        <td><?=$m['name']?></td>
        <td>
            <button onclick="edit(this,<?=$m['id']?>)">修改</button>
            <button onclick="del(this,'type',<?=$m['id']?>)">刪除</button>
        </td>
    </tr>
    <?php }} ?>
</table>
<script>
    function add(type){
        let parent = (type == "big")?0:$('#b').val();
        let name = (type == "big")?$('#big').val():$('#mid').val();
        $.post("api/type.php",{parent,name},()=>{
            location.reload()
        })
    }
    function edit(dom,id){
        let name = prompt("請輸入要修改的名稱" , $(dom).parent().prev().text());
        if(name){
        $.post("api/type.php",{name,id},()=>{
            $(dom).parent().prev().text(name);
        })
    }
    }
</script>
<style>
    .search {
        display: grid;
        grid-template-columns: 2fr 1fr 2fr;
        justify-content: end;
        width: 90%;
        margin: auto;
    }

    .search div {
        text-align: center;
    }
</style>
<h2 class="ct">商品管理</h2>

<div class="search">
    <div></div>
    <div><button onclick="of('?do=goods_add')">新增商品</button></div>
    <div>
        <input type="text" id="searchInput" placeholder="搜尋">
        <button onclick="searchTable()">搜尋</button>
    </div>
</div>
<table class="all">
    <tr class="ct tt">
        <td>編號</td>
        <td>商品名稱</td>
        <td>庫存量</td>
        <td>狀態</td>
        <td>操作</td>
    </tr>
    <?php
    $rows = $Goods->all();
    foreach($rows as $row){
    ?>
    <tr class="ct pp find">
        <td><?=$row['no']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['stock']?></td>
        <td><?=($row['sh']==1)?'販售中':'已下架'?></td>
        <td>
            <button onclick="of('?do=goods_edit&id=<?=$row['id']?>')">修改</button>
            <button onclick="del(this,'goods',<?=$row['id']?>)">刪除</button>
            <button onclick="sh(1,this,<?=$row['id']?>)">上架</button>
            <button onclick="sh(2,this,<?=$row['id']?>)">下架</button>
        </td>
    </tr>
    <?php } ?>
</table>
<script>
    function sh(type,dom,id){
        $.post("api/sh.php",{type,id},()=>{
            $(dom).parent().prev().text((type == 1)?'販售中':'已下架')
        })
    }
    // 雙each
    function searchTable() {
        const keyword = $('#searchInput').val().toLowerCase();

        $('.find').each(function() {
            let found = false; // 自創開關
            $(this).find('td').each(function() {
                const text = $(this).text().toLowerCase();
                // text 原本的文案
                // keyword 要搜尋的文字

                if (text.includes(keyword)) {
                    found = true;
                    return false; // 跳出内部的each循环
                }
                // 跳出 td 在seach tr($('.find')
            });

            if (found) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    }
</script>