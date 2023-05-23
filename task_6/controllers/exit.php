<?php
session_start();
session_unset();
$_SESSION['mess'] = 'Вы вышли';
header("Location:../index.php");
?>