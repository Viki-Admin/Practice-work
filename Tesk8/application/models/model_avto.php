<?
class Model_avto extends Model
{
    public $login;

    public $password;

    public $password_hash;

    public $connect;

    public function __construct($login, $password)
    {
        $this->connect = mysqli_connect('localhost', 'root', '', 'Task_list');

        $this->login = $login;
        $this->password = $password;

        $this->world();
    }

    public function world()
    {
        if(!empty($this->login) && !empty($this->password))
        {
            $this->login=htmlspecialchars($this->login);
            $this->password=htmlspecialchars($this->password);
            $this->password_hash = password_hash($this->password_hash, PASSWORD_BCRYPT);
            $lis_login = mysqli_real_escape_string($this->connect, $this->login);

            $str_out_users = "SELECT * FROM `users` WHERE login = '$this->login'";
            $run_out_users = mysqli_query($this->connect, $str_out_users);
            $count_user=mysqli_num_rows($run_out_users);
            $out_users = mysqli_fetch_array($run_out_users);

            if($count_user == 1)
            {
                if (password_verify($this->password, $out_users['password'])) 
                {

                    $_SESSION['users']=array (
                        'id' => $out_users['id'],
                        'login' => $out_users['login'],
                        'password' => $out_users['password']
                    );
                    header("Location: list");
                }
            }elseif($count_user == 0)
    	    {
                $str_sub_user="INSERT INTO `users` (`login`, `password`, `created_at`) VALUES ( '$this->login', '$this->password_hash', CURRENT_TIMESTAMP)";
                $run_sub_user=mysqli_query($this->connect,$str_sub_user);
                if($run_sub_user == true)
                {
                    $str_users = "SELECT * FROM `users` WHERE login='$this->login' AND password='$this->password_hash' ";
                    $run_users = mysqli_query($this->connect, $str_users);
                    $users = mysqli_fetch_array($run_users);

                    $_SESSION['users']=array(
                        'id' => $users['id'],
                        'login' => $users['login'],
                        'password' => $users['password']
                    );
                    header("Location: list");
                
                } else {
                    $_SESSION['error'] =  "<p class=error>Adding error</p>";
                }
            }
        }
    }
}
?>