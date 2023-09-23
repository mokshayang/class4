<?php
session_start();
unset($_SESSION[$_GET['tab']]);
unset($_SESSION['cart']);
header("location:index.php");