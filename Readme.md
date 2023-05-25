# 網乙第四題

新增功能 :

1. 減少使用 location.reload();
2. 改用$(dom).html(res)，之類的直接修改
3. dom 直接修改，畫面不會重整，所以不會跳來跳去
    * ex :
    ```
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
10. 測試一個修改