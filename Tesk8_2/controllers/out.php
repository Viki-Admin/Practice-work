<?php
    include 'db.php';
    
    // Variables
    $login = $_POST['login'];
    $password = $_POST['password'];
    $sub_user = $_POST['sub_user'];

    $login=htmlspecialchars($login);
    $password=htmlspecialchars($password);
    $hash = password_hash($password, PASSWORD_BCRYPT);
    
    // Request
    $str_out_users = "SELECT * FROM `users` WHERE login = '$login'";
    $run_out_users = mysqli_query($connect, $str_out_users);
    $count_user=mysqli_num_rows($run_out_users);
    $out_users = mysqli_fetch_array($run_out_users);
	 
    // Registration
	if(!empty($sub_user))
	{
		if(!empty($login) && !empty($password))
        {
    	    if($count_user == 0)
    	    {
                $str_sub_user="INSERT INTO `users` (`login`, `password`, `created_at`) VALUES ( '$login', '$hash', CURRENT_TIMESTAMP)";
                $run_sub_user=mysqli_query($connect,$str_sub_user);
                if($run_sub_user == true)
                {
                    $str_users = "SELECT * FROM `users` WHERE login='$login' AND password='$hash' ";
                    $run_users = mysqli_query($connect, $str_users);
                    $users = mysqli_fetch_array($run_users);

                    $_SESSION['users']=array(
                        'id' => $users['id'],
                        'login' => $users['login'],
                        'password' => $users['password']
                    );
                    header("Location: ../tesk_list.php");
                
                } else {
                    $_SESSION['error'] =  "<p class=error>Adding error</p>";
                }
            }
            // Authorization
            else if($count_user == 1)
            {
                if (password_verify($password, $out_users['password'])) {

                    $_SESSION['users']=array (
                        'id' => $out_users['id'],
                        'login' => $out_users['login'],
                        'password' => $out_users['password']
                    );
                    header("Location: ../tesk_list.php");
                }
            }else
            {
                $_SESSION['error'] = "<p class=error> Учетные данные не верны!</p>";
                header("Location: ../index.php");
            }
	    }else
        {
            $_SESSION['error'] ="<p class=error> Заполните все поля!</p>";
            header("Location: ../index.php");
        }
	}
?>
