<?php
	ob_start();
	session_start();

	if(!isset($_SESSION['zalogowany']))
{
	header('Location: index.php');
	exit();
}

	require_once "connect.php";
$polaczenie = new mysqli($host_name, $user_name, $password, $database );


if ($polaczenie->connect_error) {
    echo "Error: ".$polaczenie->connect_errno;
} 
else{
$klasy = $polaczenie->query('SELECT Klasa FROM `plan_basen` ');

$string="s";
$wartosc;
$i=0;
while( $record = $klasy->fetch_assoc()){
	$string="klasa".$i;
   $wartosc = $_POST[$string];
	echo $wartosc;

if(strlen($wartosc)!=0)
	{

	$polaczenie->query("UPDATE plan_basen SET wyjazd='$wartosc' WHERE Klasa='{$record["Klasa"]}';");
	}
	$i++;

	}








	header('Location: edycja.php');	
}
?>