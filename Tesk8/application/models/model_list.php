<?

session_start();
if(!$_SESSION['users'])
{
    header("Location:/avto");
}


class Model_List extends Model
{
    public $connect;

    public function __construct()
    {
        $this->connect = mysqli_connect('localhost', 'root', '', 'Task_list');
    }

    public function exit()
    { 
        session_unset();
        header("Location: /");
    }

    public function all($user_id, $lqs_description)
    { 
        $lqs_description = htmlspecialchars($lqs_description);
        $real_add = mysqli_real_escape_string($this->connect, $lqs_description);

        $str_sub_list="INSERT INTO `tasks` (`user_id`, `description`, `status`, `created_at`) VALUES ('$user_id', '$lqs_description', '1', CURRENT_TIMESTAMP)";


        $run_sub_list = mysqli_query($this->connect, $str_sub_list);
        
        if($run_sub_list)
        {
            echo $_SESSION['mess'] = "<p class=mess>Задание добавленно!</p>";
            header("Location: /list");
        }else 
        {
            echo $_SESSION['error'] =  "<p class=error>Ошибка добавления</p>";
            header("Location: /");
        }
        

    }

    public function real_all($id)
    { 

        $str_del_tasks = "DELETE FROM `tasks` WHERE `user_id` = $id";
        $run_del_tesks = mysqli_query($this->connect, $str_del_tasks);

        $_SESSION['mess'] = "<p class='mess'>Удаленно</p>";
        header("Location: /list");

    }

    public function status($id)
    { 
        $str_tesk_list="SELECT * FROM `tasks` WHERE id = '$id' ";
        $run_tesk_list=mysqli_query($this->connect,$str_tesk_list);
        $tesk_list_str=mysqli_fetch_array($run_tesk_list);

        if($tesk_list_str['status']==1)
        {
            $str_status = "UPDATE `tasks` SET `status` = 2 WHERE id = $id";
        }elseif($tesk_list_str['status']==2)
        {
            $str_status = "UPDATE `tasks` SET `status` = 1 WHERE id = $id";
        }else{
            $_SESSION['error'] = "<p class = 'error' >Ошибка</p>";
            header("Location: /list");
        }

        $run_status = mysqli_query($this->connect, $str_status);
        header("Location: /list");
    }


    public function status_all($id)
    { 
        $str_status = "UPDATE `tasks` SET `status` = 2 WHERE user_id = $id";
        $run_status = mysqli_query($this->connect, $str_status); 
        header("Location: /list");
    }

    public function real_delete($id)
    { 
        $str_delete = "DELETE FROM `tasks` WHERE id = $id";
        $run_delete = mysqli_query($this->connect, $str_delete);

        $_SESSION['mess'] = "<p class = 'mess' >Удаленно</p>";
        header("Location: /list");
    }
}
?>