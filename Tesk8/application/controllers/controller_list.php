<?

class Controller_List extends Controller
{
	function action_index()
	{	
		$this->view->generate('list_view.php', 'template_view.php');
	}
}

?>