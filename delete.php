<?php 

session_start();
if(!isset($_SESSION['zalogowany']))
{
  header('Location: index.php');
  exit();
}
unset($_SESSION['nie_wybrano']);


require_once "connect.php";


 
$delete_class;

    $polaczenie = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Połączenie do serwera MySQL nie powiodło się: '.mysqli_connect_error().'</p>';
    }
    else
{



    if($_POST) {
        if(isset($_POST['select_class'])) {
            if($_POST['select_class'] == 'NULL') {
              
            }
            else {
                
            	$delete_class=$_POST['select_class'];

            	$polaczenie->query("DELETE FROM `plan_basen` WHERE Klasa='$delete_class';");

header('Location: edycja.php');

            }
        }
    }

}

?>