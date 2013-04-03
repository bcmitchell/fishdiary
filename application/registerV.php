<?php session_start();
class RegisterV extends Controller {
	function index(){
include('views/templates/header.php');
include('views/pages/register.php');
include('views/templates/footer.php');
}
}

?>