<h2 class="ct">會員註冊</h2>
<table class="all">
    <tr>
        <td class="tt ct">姓名</td>
        <td class="pp">
            <input type="text" name="name" id="name" value="">
        </td>
    </tr>
    <tr>
        <td class="tt ct">帳號</td>
        <td class="pp">
            <input type="text" name="acc" id="acc" value="">
            <button onclick="acc()">檢測帳號</button>
        </td>
    </tr>
    <tr>
        <td class="tt ct">密碼</td>
        <td class="pp">
            <input type="password" name="pw" id="pw" value="">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電話</td>
        <td class="pp">
            <input type="text" name="tel" id="tel" value="">
        </td>
    </tr>
    <tr>
        <td class="tt ct">住址</td>
        <td class="pp">
            <input type="text" name="addr" id="addr" value="">
        </td>
    </tr>
    <tr>
        <td class="tt ct">電子信箱</td>
        <td class="pp">
            <input type="text" name="email" id="email" value="">
        </td>
    </tr>
</table>
<div class="ct">
    <button onclick="reg()">註冊</button>
    <button>重置</button>
</div>
<script>
    function acc() {
        $.post("api/acc.php", {acc: $('#acc').val()}, (res) => {
            if (res * 1 || $('#acc').val() == "admin") {
                alert("帳號已被使用")
            } else {
                alert("帳號可以使用")
            }
        })
    }

    function reg() {
        let mem = {
            acc: $('#acc').val(),
            pw: $('#pw').val(),
            name: $('#name').val(),
            tel: $('#tel').val(),
            addr: $('#addr').val(),
            email: $('#email').val(),
        };
        $.post("api/acc.php", {acc: $('#acc').val()}, (res) => {
                if (res * 1 || mem.acc == "admin") {
                    alert("帳號已被使用")
                } else {
                    $.post("api/mem.php", mem, (res) => {
                        alert("註冊成功")
                        of('?do=login')
                    })
                }
            })
        }
</script>