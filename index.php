<?php include_once "api/base.php" ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<!-- saved from url=(0039) -->
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <title>┌精品電子商務網站」</title>
    <link href="./css/css.css" rel="stylesheet" type="text/css">
    <script src="./js/jquery-3.4.1.min.js"></script>
    <script src="./js/js.js"></script>
</head>

<body>
    <iframe name="back" style="display:none;"></iframe>
    <div id="main">
        <div id="top">
            <a href="?">
                <img src="./icon/0416.jpg" style="width:56%">
            </a>
            <div style="padding:10px;display:inline;vertical-align:top">
                <a href="?">回首頁</a> |
                <a href="?do=news">最新消息</a> |
                <a href="?do=look">購物流程</a> |
                <a href="?do=cart">購物車</a> |
                <?php
                if (isset($_SESSION['mem'])) {
                    echo "<a href='logout.php?tab=mem'>會員登出</a> | ";
                } else {
                    echo "<a href='?do=login'>會員登入</a> | ";
                }
                if (isset($_SESSION['admin'])) {
                    echo "<a href='admin.php'>返回管理</a>";
                } else {

                    echo "<a href='?do=admin'>管理登入</a>";
                }
                ?>
            </div>
            <marquee scrollamount="12">
                <?php
                $rows = $Ad->all(['sh' => 1]);
                foreach ($rows as $row) {
                    echo $row['text'] . "&nbsp;&nbsp;&nbsp;&nbsp;";
                ?>
                <?php } ?>
            </marquee>
        </div>
        <div id="left" class="ct">
            <div style="min-height:400px;">
                <a href="?type=0">全部商品(<?= $Goods->count(['sh' => 1]) ?>)</a>
                <?php
                $bb = $Type->all(['parent' => 0]);
                foreach ($bb as $b) {
                    echo "<div class='ww'>";
                    echo "<a href='?type={$b['id']}'>{$b['name']}({$Goods->count(['big' =>$b['id'], 'sh' => 1])})</a>";
                   
                        $mm = $Type->all(['parent' => $b['id']]);
                        foreach ($mm as $m) {
                            echo "<div class='s'>";
                            echo "<a href='?type={$m['id']}'>{$m['name']}({$Goods->count(['mid' =>$m['id'], 'sh' => 1])})</a>";
                            echo "</div>";
                        }
                    
                    echo "</div>";
                }
                ?>
            </div>
            <span>
                <div>進站總人數</div>
                <div style="color:#f00; font-size:28px;">
                    00005 </div>
            </span>
        </div>
        <div id="right">
            <?php
            $do = isset($_GET['do']) ? $_GET['do'] : "main"; // php 5.6
            // $do = $_GET['do'] ?? "main";
            $file = "front/$do.php";
            if (file_exists($file)) {
                include_once $file;
            } else {
                include_once "front/main.php";
            }
            ?>
        </div>
        <div id="bottom" style="line-height:70px;background:url(icon/bot.png); color:#FFF;" class="ct">
            頁尾版權 : <?= $bot['text'] ?>
        </div>
    </div>

</body>

</html>