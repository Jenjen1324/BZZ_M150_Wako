<html>
  <head>
  
  <?php include("res/head.php"); ?>
    <title>Einkaufen in Europa</title>

<?php

$wk = fopen("warenkorb.txt", "w");
fwrite($wk, "");

$abs;

foreach($_POST as $var_name => $var_value) {
  if(ereg("Art_([0-9]*)", $var_name, $act)) {
    $abs[$act[1]] = $var_value;
  }
  if($var_name == "name") {
    $name = $var_value; 
  }
  if($var_name == "vorname") {
    $vorname = $var_value; 
  }
  if($var_name == "adr") {
    $adr = $var_value; 
  }
  if($var_name == "plz") {
    $plz = $var_value; 
  }
  if($var_name == "ort") {
    $ort = $var_value; 
  }
  if($var_name == "tel") {
    $tel = $var_value; 
  }
  if($var_name == "email") {
    $email = $var_value; 
  }
  if($var_name == "kredit") {
    $kredit = $var_value; 
  }
  if($var_name == "Total") {
    $total = $var_value; 
  }
}

$bs = fopen("bestellungen.txt", "a+");
fwrite($bs, $name    . "\t");
fwrite($bs, $vorname . "\t");
fwrite($bs, $adr     . "\t");
fwrite($bs, $plz     . "\t");
fwrite($bs, $ort     . "\t");
fwrite($bs, $tel     . "\t");
fwrite($bs, $email   . "\t");
fwrite($bs, $kredit  . "\t");
fwrite($bs, $total   . "\t");

foreach($abs as $artNr => $artCount) {
  fwrite($bs, "" . $artNr . "=" . $artCount . "&");
}
fwrite($bs, "\n");
?>


  </head>
  <body>
   <h1>Vielen Dank <?=$name ?> f�r Ihre Bestellung</h1>
 
   Zur�ck zur <a href="produkte.php">Produkte�bersicht</a>
  


  </body>
</html>