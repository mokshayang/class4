<h2 class="ct">新增商品</h2>
<form action="api/goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="ct tt">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big" onclick="getMid()"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid"></select>
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品編號</td>
            <td class="pp">
                完成分類後自動分配
                <!-- <input type="text" name="no" value=""> -->
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" value="">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品價格</td>
            <td class="pp">
                <input type="text" name="price" value="">
            </td>
        </tr>
        <tr>
            <td class="ct tt">規格</td>
            <td class="pp">
                <input type="text" name="spec" value="">
            </td>
        </tr>
        <tr>
            <td class="ct tt">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" value="">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" value="">
            </td>
        </tr>
        <tr>
            <td class="ct tt">商品介紹</td>
            <td class="pp">
                <textarea name="intro"  cols="60" rows="6"></textarea>
            </td>
        </tr>
    </table>
    <input type="submit" value="新增"> |
    <input type="reset" value="重置"> |
    <button onclick="history.go(-1)" type="button">返回</button>
</form>
<script>
    $('#big').load("api/type_bm.php",{parent:0},()=>{
        getMid()
    })
    function  getMid(){
        $('#mid').load("api/type_bm.php",{parent:$('#big').val()},()=>{

        })
    }
</script>