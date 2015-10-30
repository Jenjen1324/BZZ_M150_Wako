<?php 
// Session zerstören um den wako zu leeren

session_start();
session_destroy();

?>

<html>
  <head>

  <?php include("res/head.php"); ?>
    <title>Einkaufen in Europa</title>

<?php

include("res/plist.php");

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
  /*if($var_name == "Total") {
    $total = $var_value; 
  }*/
}

// Fixes total manipulation
$total = 0;
foreach($abs as $artNr => $artCount) {
  $total += $artikel_preis[$artNr] * $artCount;
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
   <h1>Vielen Dank <?=$name ?> für Ihre Bestellung</h1>
 
   Zurück zur <a href="produkte.php">Produkteübersicht</a>
  


  </body>
</html>