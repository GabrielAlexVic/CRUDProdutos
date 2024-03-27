<?php 

require_once ("../PDOs/pdoUser.php");

$pdo = new usePDO();

session_start();

$userName = $_POST['userName'];
$password = $_POST['password'];

if($pdo->login($userName, $password) != 0)
{
	$_SESSION['userName'] = $userName;
	$_SESSION['password'] = $password;
	header('location:../index.php');
}
else{
  unset ($_SESSION['userName']);
  unset ($_SESSION['password']);
  header('location:../index.php');
}
?>

