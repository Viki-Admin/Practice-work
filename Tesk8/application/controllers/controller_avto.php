<?php
session_start();
class Controller_Avto extends Controller
{
    public $login;

    public $password;

    public function __construct()
    {
        $this->view = new View();

        if($_POST)
        {
            $this->login = $_POST['login'];
            $this->password = $_POST['password'];

            if(!empty($this->login) && !empty($this->password))
            {
                $this->model = new Model_Avto($this->login, $this->password);
					 echo $_SESSION['users']['id'];
            }else
            {
                $_SESSION['error'] =  "<p class=error>Adding error</p>";
            }
        }
    }

    function action_index()
    {
        $this->view->generate('avto_view.php', 'template_view.php');
    }
}
?>