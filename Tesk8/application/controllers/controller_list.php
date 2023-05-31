<?

class Controller_List extends Controller
{



	public function __construct()
	{
		$this->view = new View();
		$this->model = new Model_list();
	}


	public function action_add_list()
	{
		$description = $_POST['description'];
		$sub_list = $_POST['sub_list'];

		if(!empty($sub_list))
		{
			if(!empty($description))
			{
				$this->model->all($_SESSION['users']['id'], $description);
			}else
			{
				$_SESSION['error'] = "<p class = 'error'>Ошибка</p>";
				header("Location:/");
			}
		}
	}

	public function action_index()
	{	
		$this->view->generate('list_view.php', 'template_view.php');
	}

	public function action_exit()
	{
		$this->model->exit();
	}

	public function action_all()
	{
		$this->model->all($_GET['user_id']);
	}

	public function action_real_all()
	{
		$this->model->real_all($_SESSION['users']['id']);
	}

	public function action_status()
	{
		$this->model->status($_GET['status_id']);
	}

	
	public function action_status_all()
	{
		$this->model->status_all($_SESSION['users']['id']);
	}

	public function action_delete()
	{
		$this->model->real_delete($_GET['delete_id']);
	}

}

?>