<?php
    include 'db.php';

    // Variables Tesk List

    $description=$_POST['description'];		
    $status=$_POST['status'];
    $sub_list=$_POST['sub_list'];

    $description=htmlspecialchars($description);
    $lqs_description=mysqli_real_escape_string($connect,$description);

    $user_id = $_SESSION['users']['id'];
    settype($city_id, 'integer');

    $str_sub_list="INSERT INTO `tasks` (`user_id`, `description`, `status`, `created_at`) VALUES ('$user_id', '$lqs_description', '1', CURRENT_TIMESTAMP)";


    if(!empty($sub_list))
    {
        if($description)
        {
            $run_sub_list=mysqli_query($connect, $str_sub_list);
            if($run_sub_list)
            {
                $_SESSION['mess'] = "<p class=mess>Задание добавленно!</p>";
            }else 
            {
                $_SESSION['error'] =  "<p class=error>Ошибка добавления</p>";
            }
        }else {
            $_SESSION['error'] =  "<p class=error>Заполните все поля</p>";
        }
        header("location: ../tesk_list.php");
    }
    
?>