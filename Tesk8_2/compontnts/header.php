<?
include 'controllers/db.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<div class="wrapper"></div>
    <header>
        <h1>Task list</h1>
        <?
            if($_SESSION['users'])
            {
                echo"
                    <h2><a href='controllers/exit.php'><button>Exit</button></a><h2>
                ";
            }
        ?>
    </header>



