<?php 

session_start();
if(!isset($_SESSION['zalogowany']))
{
  header('Location: index.php');
  exit();
}



require_once "connect.php";


 


    $polaczenie = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Połączenie do serwera MySQL nie powiodło się: '.mysqli_connect_error().'</p>';
    }
    else
{



	$new_class = $_POST['new_class'];


		if(strlen($new_class)!=0)
	{

	$polaczenie->query("INSERT INTO `plan_basen` (`wyjazd`, `Klasa`, `ID`) VALUES ('', '$new_class', NULL);");
	}
header('Location: edycja.php');
	
}