<h2 class="ct">最新消息</h2>
<table class="all">
    <tr class="tt ct">
        <td>標題</td>
    </tr>
    <?php
    $rows = $Ad->all(['sh' => 1]);
    foreach ($rows as $row) {
    ?>
        <tr class="pp ct">
            <td><?= $row['text'] ?></td>
        </tr>
    <?php } ?>
</table>