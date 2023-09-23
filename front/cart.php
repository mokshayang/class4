<?php
if (!isset($_SESSION['mem'])) {
    echo "<script>alert('請登入會員喔')</script>";
    echo "<script>of('?do=login')</script>";
    // to("index.php");
} else {
    if (isset($_GET['id'])) {
        $_SESSION['cart'][$_GET['id']] = $_GET['qt'];
    }
?>
    <style>
        .num input {
            border: 0;
            background-color: transparent;
            width: 40px;
        }

        .bbt {
            width: 100px;
        }
    </style>
    <h2 class="ct"><?= $_SESSION['mem'] ?>的購物車</h2>
    <table class="all">
        <tr class="ct tt">
            <td>編號</td>
            <td>商品名稱</td>
            <td>數量</td>
            <td>庫存量</td>
            <td>單價</td>
            <td>小記</td>
            <td>刪除</td>
        </tr>
        <?php
        if (isset($_SESSION['cart'])) {
            foreach ($_SESSION['cart'] as $id => $qt) {
                $row = $Goods->find($id);
                $qt;
        ?>
                <tr class="ct pp content">
                    <td><?= $row['no'] ?></td>
                    <td><?= $row['name'] ?></td>
                    <td class="num">
                        <input type="number" style="background:#eee" id="<?= $id ?>" value="<?= $qt ?>" min=1 onchange="getNum(<?= $row['id'] ?>)">
                    </td>
                    <td><?= $row['stock'] ?></td>
                    <td class="price"><?= $row['price'] ?></td>
                    <td class="total"><?= $row['price'] * $qt ?></td>
                    <td>
                        <img src="icon/0415.jpg" class="cu" onclick="remove(this,<?= $row['id'] ?>)">
                    </td>
                </tr>
        <?php }
        } ?>
    </table>
    <div class="ct" id="ord">
        <?php
        if (empty($qt)) {
        ?>
            <br>您的購物車是空的<p></p>
            <a href="index.php"><img src="icon/0411.jpg" class="bbt cu"></a>
        <?php } else { ?>
            <a href="index.php"><img src="icon/0411.jpg" class="bbt cu"></a>
            <a href="?do=ord"><img src="icon/0412.jpg" class="bbt cu"></a>
        <?php } ?>
    </div>
<?php } ?>
<script>
    // 修改商品數量
    function getNum(id) {
        let num = $('#' + id).val()
        $.post("api/num.php", {
            id,
            num
        })
        let url = new URL(window.location.href);
        url.searchParams.set('qt', num);
        history.pushState(null, null, url.toString());
    }
    // 預防數量的防呆 :
    $("input[type='number']").each(function() {
        let price = $(this).closest('tr').find('.price').text();
        let totalElement = $(this).closest('tr').find('.total');
        if (isNaN(parseFloat($(this).val())) || parseFloat($(this).val()) < 1) {
            $(this).val(1);
            qt=1
        }
        let total = parseFloat(price) * parseFloat(qt);
        totalElement.text(total);
    });
    // 加入監聽
    $("input[type='number']").on("change", function() {
        let price = $(this).closest('tr').find('.price').text();
        let totalElement = $(this).closest('tr').find('.total');
        let inputValue = parseFloat($(this).val());
        if (isNaN(inputValue) || inputValue < 1) {
            alert("請輸入有效數量，最小值 1");
            $(this).val(1); // 重置最小值
            qt=1
        }
        let total = parseFloat(price) * parseFloat(qt);
        totalElement.text(total);
    });


    function remove(dom, id) {
        // let div = `
        //             <br>您的購物車是空的<p></p>
        //             <a href="index.php">
        //                 <img src="icon/0411.jpg" class="bbt cr">
        //             </a>
        //             `
        $.post("api/remove.php", {
            id
        }, () => {
            $(dom).parents('tr').remove()
            history.pushState(null, null, '?do=cart')
            // let table = $('.all')
            // let row = table.find('.content')
            // if (row.length == 0) {
            //     $('#ord').remove().append(div)
            // }
            location.reload();
        })
    }
</script>