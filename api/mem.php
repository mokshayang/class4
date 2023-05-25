<?php include_once "base.php";
$Mem->save($_POST);
to("../admin.php?do=mem");
// 後臺修改會員用 to(...)