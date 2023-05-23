<?php
    include 'db.php';

    $satus_id = $_GET['status_id'];

    $str_status="SELECT * FROM `tasks` WHERE id = $satus_id";
    $run_status=mysqli_query($connect, $str_status);
    $status_str=mysqli_fetch_array($run_status);
    if($status_str['status']==1)
    {
        $str_ud_list= "UPDATE `tasks` SET `status` = 2 WHERE id = $satus_id";
    } elseif($status_str['status'] == 2)
    {
        $str_ud_list= "UPDATE `tasks` SET `status` = 1 WHERE id = $satus_id";
    }
    $run_ud_list = mysqli_query($connect, $str_ud_list);
    header("Location: ../tesk_list.php");
?>