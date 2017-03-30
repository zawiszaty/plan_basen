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
   $plan_basen = $polaczenie->query('SELECT * FROM `plan_basen` ');
   $plan_basen2 = $polaczenie->query('SELECT * FROM `plan_basen` ');
 
}


?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>

   <div class="container" style="margin-top: 10px;">

 <div class="row">
  
        <?php
        $licznik=0;
        $tablica_klas[0]="a";
while( $record = $plan_basen->fetch_assoc()){
  

$string ="klasa".$licznik;


  //  nie mieszaj kodu html z php 
     echo " <div class='col-lg-12 well'>";
     echo " <div class='form-group'>";
     echo "<form method='post' action='wysylanie.php'>";
      echo "<input type='text' name='".$string."' class='form-control' placeholder=' {$record["Klasa"]}'>";
      
  
      
  echo "</div></div>";

  $licznik++;
  


}
$_SESSION['licznik'] =$licznik;

 

?>

 <div class="form-group">
 <input type="submit" value="wyslij" class="btn btn-success btn-block">
 </div>


</div>
<div class="row ">
  

<div class="form-group col-lg-3">
<form action="logaut.php" method="post">
<a href="logaut.php" class="btn btn-primary btn-lg">Wyloguj</a>
</form>
   </div>


<div class="col-lg-4">
<div class='form-group'>
<form method="post" action="add.php">


  <input type="text" name="new_class" placeholder="wpisz nazwe klasy" class="form-control">
  <input type="submit" value="dodaj nowa klase" class="btn btn-primary btn-block  " style="margin-top: 10px">

  </form>

 </div>
 </div>


 
<div class="col-lg-3 col-lg-offset-1" >
<form method="post" action="delete.php" >
 <select class="form-control"  name="select_class" >

 <option value=''>Wybierz Klase do usuniecia</option>
    <?php
while( $record2 = $plan_basen2->fetch_assoc()){
  //  nie mieszaj kodu html z php 
     echo " <option value='{$record2["Klasa"]}'>{$record2["Klasa"]}</option>";
 

  
}
?>
    




  </select>
  

  



  <input type="submit" value="usun_klase" style="margin-top: 10px;" class="btn btn-danger btn-block">
  </form>
  </div>


  </div>


</div>














    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>