<h2>第一次購物</h2>
<a href="?do=reg">
    <img src="icon/0413.jpg" alt="">
</a>
<h2 class="ct">會員登入</h2>
<table class="all">
    <tr>
        <td class="ct tt">帳號</td>
        <td class="pp">
            <input type="text" name="" id="acc">
        </td>
    </tr>
    <tr>
        <td class="ct tt">密碼</td>
        <td class="pp">
            <input type="password" name="" id="pw">
        </td>
    </tr>
    <tr>
        <td class="ct tt">驗證碼</td>
        <td class="pp">
            <?php
            $a = rand(11, 99);
            $b = rand(11, 99);
            $_SESSION['cert'] = $a + $b;
            echo "$a + $b = ";
            ?>
            <input type="text" name="" id="cert">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('mem')">確認</button>
</div>
<script>
    function login(tab) {
        $.post("api/cert.php", {cert: $('#cert').val()}, (res) => {
            if (res * 1) {
                $.post("api/login.php",{tab,acc:$('#acc').val(),pw:$('#pw').val()},(res)=>{
                    if(res*1){
                        of('index.php')
                    }else{
                        alert("帳號密碼錯誤")
                    }
                })
            }else{
                alert("驗證碼錯誤")
            }
        })
    }
</script>