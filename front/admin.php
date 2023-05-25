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
            $a = rand(10, 99);
            $b = rand(10, 99);
            $_SESSION['cert'] = $a + $b;
            echo "$a + $b = ";
            ?>
            <input type="text" name="" id="cert">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="login('admin')">確認</button>
</div>
<script>
    function login(tab) {
        $.post("api/cert.php", {cert: $('#cert').val()}, (res) => {
            if (res * 1) {
                $.post("api/login.php",{tab,acc:$('#acc').val(),pw:$('#pw').val()},(res)=>{
                    if(res*1){
                        of('admin.php')
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



