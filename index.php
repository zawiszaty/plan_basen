<?php
require_once "connect.php";


 


    $polaczenie = mysqli_connect($host_name, $user_name, $password, $database);
    
    if(mysqli_connect_errno())
    {
    echo '<p>Połączenie do serwera MySQL nie powiodło się: '.mysqli_connect_error().'</p>';
    }
    else
{
   $plan_basen = $polaczenie->query('SELECT * FROM `plan_basen` ');
  
  
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
   <div class="container " style="margin-top: 10px;">
  <?php
while( $record = $plan_basen->fetch_assoc()){
  echo "<div class='row well'>"; 
     
      echo "<div class='col-lg-4 '> {$record["Klasa"]} </div>";
      echo "<div class='col-lg-7 col-lg-offset-1 '> {$record["wyjazd"]} </div>";
  
      
  echo "</div>";

  
}
?>
</div>
  

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>