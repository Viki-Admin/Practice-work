<? 
session_start();

if (!$_SESSION['users']) 
{
	header("location: index.php");
}
include 'compontnts/header.php';
include 'compontnts/content/list.php';
include 'compontnts/footer.php';
?>