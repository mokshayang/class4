<?php include_once "base.php";
$rows = $Type->all(['parent'=>$_POST['parent']]);
foreach($rows as $row){
    echo "<option value={$row['id']}>";
    echo $row['name'];
    echo "</option>";
}