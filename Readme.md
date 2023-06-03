# 網乙第四題

新增功能 :

1. 減少使用 location.reload();
2. 改用$(dom).html(res)，之類的直接修改
3. dom 直接修改，畫面不會重整，所以不會跳來跳去
    * ex :
    ```JS
        function edit(dom,id){
            let name = prompt("請修改名稱",$(dom).parent().prev().text());
            if(name){
                $.post("api/type.php",(name,id),()=>{
                    $(dom).parent().prev().text(name)
                })
            }
        }
    ```
4. 新增最新消息管理

    * 相關back :
        1. 新增兩隻API
            * 刪除用ajax與dom api/ad_del.php
            * form 修改 api/news.php

    * 相關front :
        1. index.php marquee
        2. news.php 最新消息區
5. css 固定畫面大小，不會在晃來晃去
6. 購物車，登入帳號後，直接點擊購物車，會正常顯示購物車是空的
7. 簡化商品的聯動選單 將 'parent' 帶入 ajax
8. 後續有空的話，會修改UI介面，有空的話 。。。。
9. 還不會與銀行的API，這個要問一下經驗的
10. 強化地6項功能 : 在確定送出訂單後的API ， 將

    ```php
    unset($_SESSION['cart']);
    改為
    $_SESSION['cart'] = array();
    或者 :
    $_SESSION['cart'] = [];
    ```

11. 前端購物車，修改下方兩個按鈕，以及刪除後 的顯示

    ```php
    <div class="ct" id="sub">
    <?php 
    if(empty($qt)){
    ?>
    <br> 您的購物車是空的 <br><br>
    <a href="?do=index.php"><img src="icon/0411.jpg" class="cu" style="width:100px"></a>
    <?php }else{ ?>
    <a href="?do=index.php"><img src="icon/0411.jpg" class="cu" style="width:100px"></a>
    <a href="?do=ord"><img src="icon/0412.jpg" class="cu" style="width:100px"></a>
    <?php } ?>
    </div>
    ```

    ```Js
    <script>
    function remove(dom, id) {
        let div = `
        <br> 您的購物車是空的 <br><br>
                <a href="?do=index.php">
                    <img src="icon/0411.jpg" class="cu" style="width:100px">
                </a>
                `
        $.post("api/remove.php", {
            id
        }, () => {
            $(dom).parents('tr').remove();
            history.pushState(null, null, "?do=cart");
            let table = $('.all');
            let row = table.find('.content');
            if (row.length == 0) {
                $('#sub').empty().append(div)
            }
        })
    }
    </script>
    ```
12. 說明一下遇到的問題 : 

    ```Js
    <script>
    function remove(dom, id) {
        let div = `
        <br> 您的購物車是空的 <br><br>
                <a href="?do=index.php">
                    <img src="icon/0411.jpg" class="cu" style="width:100px">
                </a>
                `
        let table = $('.all');
        let row = table.find('.content');
        $.post("api/remove.php", {id},()=>{
            $(dom).parents('tr').remove();
            history.pushState(null, null, "?do=cart");
            if (row.length == 0) {
                $('#sub').empty().append(div)
            }
        })
    }
    </script>
    ```
    
    ## 這樣的話會無效 : 
    
    ### 順序關係 :
        * row 是在 Ajax 请求回調函數之外的 作用域内 定義和獲取的。
            * let 的作用域
        * 在此情况下，AJAX 檢查 row.length 时，仍然保持 Ajax 發前的狀態，可能判断錯誤

    ## Ajax 特性 :

        1. 請求尚未完成：如果 Ajax 的請求過程尚未結束，
           這時候  程式會繼續往下執行 程式會繼續往下執行 *N，  
           在此时檢查 row.length 的值可能得到不準確的结果，
           因為無法判斷何時會完成 ~~
        
        2. 因此，在 AJAX 請求完成之前，檢查 row.length 可能不會正確反映 .content 元素的實際狀態。

        3. 非同步操作導致的延遲：
            * 由于 AJAX 請求是非同步操作，可能在請求完成之前的短暂延遲
            * remove() 函數中 $('#sub').empty().append(div) 时，而此時可能仍然存在 .content 元素。
    註 : 上課時有提過，寫出來 + 深印象
