<?php
session_start();
session_unset();
$_SESSION['mess'] = '<h2 class= ex >You`re out<h2>';
header("Location: main");
?>
