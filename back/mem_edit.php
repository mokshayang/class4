<h2 class="ct">會員管理</h2>
<?php $row = $Mem->find($_GET['id']); ?>
<form action="api/mem.php" method="post">
    <table class="all">
        <tr>
            <td class="tt ct">帳號</td>
            <td class="pp">
               <?=$row['acc']?>
            </td>
        </tr>
        <tr>
            <td class="tt ct">姓名</td>
            <td class="pp">
                <input type="text" name="name" id="name" value="<?=$row['name']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">電子信箱</td>
            <td class="pp">
                <input type="text" name="email" id="email" value="<?=$row['email']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">聯絡住址</td>
            <td class="pp">
                <input type="text" name="addr" id="addr" value="<?=$row['addr']?>">
            </td>
        </tr>
        <tr>
            <td class="tt ct">聯絡電話</td>
            <td class="pp">
                <input type="text" name="tel" id="tel" value="<?=$row['tel']?>">
            </td>
        </tr>
    </table>
    <div class="ct">
       <input type="hidden" name="id" value="<?=$row['id']?>">
       <input type="submit" value="編輯"> | 
       <input type="reset" value="重置"> | 
       <button type="button" onclick="history.go(-1)">取消</button>
    </div>
</form>
