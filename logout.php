<?php
session_start();
unset($_SESSION[$_GET['tab']]);
header("location:index.php");