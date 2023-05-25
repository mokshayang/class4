# 網乙第四題

新增功能 :

1. 減少使用 location.reload();
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
2. 改用$(dom).hrml(res)
3. Ajax 直接修改，畫面不會重整，所以不會跳來跳去
4. 新增最新消息管理
    * 相關front :
        1. index.php marquee
        2. news.php 最新消息區
5. css 固定畫面大小，不會在晃來晃去
6. 購物車，登入帳號後，直接點擊購物車，會正常顯示購物車是空的