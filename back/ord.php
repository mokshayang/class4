<h2 class="ct">訂單管理</h2>
<table class="all">
    <tr class="ct tt">
        <td>訂單編號</td>
        <td>金額</td>
        <td>會員帳號</td>
        <td>姓名</td>
        <td>下單時間</td>
        <td>操作</td>
    </tr>
    <?php 
    $rows = $Ord->all();
    foreach($rows as $row){
    ?>
    <tr class="ct pp">
        <td>
            <a href="?do=detail&id=<?=$row['id']?>"><?=$row['no']?></a>
        </td>
        <td><?=$row['total']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['name']?></td>
        <td><?=$row['date']?></td>
        <td>
            <button type="button" onclick="del(this,'ord',<?=$row['id']?>)">刪除</button>
        </td>
    </tr>
    <?php } ?>
</table>