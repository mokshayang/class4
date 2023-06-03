<h2 class="ct">最新消息管理</h2>
<div class="ct"><button onclick="add()">新增消息</button></div>
<form action="api/news.php" method="post">
    <table class="all">
        <tr class="ct tt">
            <td>標題內容</td>
            <td>顯示</td>
            <td>操作</td>
        </tr>
        <?php
        $rows = $Ad->all();
        foreach ($rows as $row) {
            $sh = ($row['sh'] == 1) ? 'checked' : '';
            
        ?>
            <tr class="ct pp">
                <td>
                    <input type="text" name="ads[]" value="<?= $row['text'] ?>">
                </td>
                <td>
                    <input type="checkbox" name="sh[]" value="<?= $row['id'] ?>" <?= $sh ?>>

                </td>
                <td>
                    <button type="button" onclick="adDel(this,<?= $row['id'] ?>)">刪除</button>

                </td>
                <input type="hidden" name="id[]" value="<?= $row['id'] ?>">

            </tr>
        <?php } ?>
    </table>
    <div class='ct'>
        <input type='submit' value='編輯'> |
        <input type='reset' value='重置'>
    </div>
</form>
<script>
    function add() {
        let div = `
                    <tr class="ct pp">
                        <td>
                            <input type="text" name="add[]" >
                        </td>
                        <td>
                            <input type="checkbox" name="sh[]" checked disabled="true">
                        </td>
                        <td>
                            <button type="button" onclick="newDel(this)">刪除</button>
                        </td>
                    </tr>
                `;
        $('.all').append(div);
    }

    function adDel(dom, id) {
        $.post("api/ad_del.php", {
            id
        }, () => {
            $(dom).parents('tr').remove();
        })
    }

    function newDel(dom) {
        $(dom).parents('tr').remove();
    }
</script>