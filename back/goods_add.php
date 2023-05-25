<h2 class="ct">新增商品</h2>
<form action="api/goods.php" method="post" enctype="multipart/form-data">
    <table class="all">
        <tr>
            <td class="tt ct">所屬大分類</td>
            <td class="pp">
                <select name="big" id="big"  onclick="getMid()">

                </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">所屬中分類</td>
            <td class="pp">
                <select name="mid" id="mid">
            </select>
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品編號</td>
            <td class="pp">
                完成分類後自動分類
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品名稱</td>
            <td class="pp">
                <input type="text" name="name" id="" value="">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品價格</td>
            <td class="pp">
                <input type="text" name="price" id="" value="">
            </td>
        </tr>
        <tr>
            <td class="tt ct">規格</td>
            <td class="pp">
                <input type="text" name="spec" id="" value="">
            </td>
        </tr>
        <tr>
            <td class="tt ct">庫存量</td>
            <td class="pp">
                <input type="text" name="stock" id="" value="">
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品圖片</td>
            <td class="pp">
                <input type="file" name="img" id="" >
            </td>
        </tr>
        <tr>
            <td class="tt ct">商品介紹</td>
            <td class="pp">
                <textarea name="intro" id="" cols="60" rows="6"></textarea>
            </td>
        </tr>
    </table>
    <div class="ct">
        <input type="submit" value="新增"> |
        <input type="reset" value="重置"> |
        <button type="button" onclick="history.go(-1)">返回</button>
    </div>
</form>
<script>
    $('#big').load("api/type_bm.php",{parent:0},()=>{
        getMid()
    })
    function getMid(){
        $('#mid').load("api/type_bm.php",{parent:$('#big').val()},()=>{

        })
    }
</script>

