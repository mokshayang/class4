<h2 class="ct">會員管理</h2>
<table class="all">
    <tr class="ct tt">
        <td>姓名</td>
        <td>會員帳號</td>
        <td>註冊日期</td>
        <td>操作</td>
    </tr>
    <?php
    $rows = $Mem->all();
    foreach($rows as $row){
    ?>
    <tr class="ct pp">
        <td><?=$row['name']?></td>
        <td><?=$row['acc']?></td>
        <td><?=$row['date']?></td>
        <td>
            <button onclick="of('?do=mem_edit&id=<?=$row['id']?>')">修改</button>
            <button onclick="del('mem',<?=$row['id']?>)">刪除</button>
        </td>
    </tr>
    <?php } ?>
</table>