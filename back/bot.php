<?php
if(!empty($_POST['bot'])){
    $bot['text'] = $_POST['bot'];
    $Bottom->save($bot);
}
?>
<h2 class="ct">編輯頁尾版權區</h2>
<form action="#" method="post">
    <table class="all">
        <tr class="ct">
            <td class="tt">頁尾宣告內容</td>
            <td class="pp">
                <input type="text" name="bot" value="<?=$bot['text']?>">
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="修改"> | 
        <input type="reset" value="重置">
    </div>
</form>