<div class="ct">
    <button onclick="of('?do=admin_add')">新增管理員</button>
</div>
<table class="all">
    <tr class="ct tt">
        <td>帳號</td>
        <td>密碼</td>
        <td>管理</td>
    </tr>
    <?php
    $rows = $Admin->all();
    foreach ($rows as $row) {
    ?>
        <tr class="ct pp">
            <td><?= $row['acc'] ?></td>
            <td><?= str_repeat("*", strlen($row['pw'])) ?></td>
            <td>
                <?php
                if($row['acc'] == "admin"){
                    echo "此為最高權限";
                }else{
                ?>
                <button onclick="of('?do=admin_edit&id=<?= $row['id'] ?>')">修改</button>
                <button onclick="del('admin',<?=$row['id']?>)">刪除</button>
            </td>
        </tr>
    <?php } }?>
</table>