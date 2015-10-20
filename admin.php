<html>
 <head>
  <title> 
    Einkaufen in Europa
  </title>

 </head>
 <body>




<?php 
function isAllowed() {
  $OK = ($_GET['passwort'] == "123456");
  if($OK) 
    return true;
  else
    return false;
}

  
if(isAllowed()) {

?>

   <h1>Bestellungen</h1>

<?php

$artikel_namen[100] = "Radium (200g Hochradioaktiv)";
$artikel_preis[100] = 24500.00;
$artikel_namen[101] = "Berillium (100g)";
$artikel_preis[101] = 250.00;
$artikel_namen[102] = "Seifenschalen (nicht an Lager)";
$artikel_preis[102] = 5.90;
$artikel_namen[1] = "Seife";
$artikel_preis[1] = 3.50;
$artikel_namen[2] = "Milch";
$artikel_preis[2] = 1.70;
$artikel_namen[3] = "Socken";
$artikel_preis[3] = 4.90;
$artikel_namen[4] = "Spam (Dose)";
$artikel_preis[4] = 3.50;
$artikel_namen[5] = "Tee";
$artikel_preis[5] = 2.65;
$artikel_namen[6] = "Yoghurt";
$artikel_preis[6] = 0.65;
$artikel_namen[7] = "CD-RW";
$artikel_preis[7] = 5.95;

?>
<table border="0">

<tr bgcolor="#cccccc"><td>Name</td> 
                      <td>Vorname</td>
                      <td>Adresse</td>
                      <td>Plz</td>
                      <td>Ort</td>
                      <td>Tel.</td>
                      <td>E-Mail</td>
                      <td>Kreditkarte</td>
                      <td>Total</td>
                      <td>Bestellungen</td></tr>


<?php

 function artArray($arts) {
   $result = "<table><tr><td>Art</td><td>Count</td></tr>\n";
   global $artikel_namen;

   parse_str($arts, $pa);

   foreach($pa as $art => $count) {
     $result = $result . "<tr><td>(" . $art . ") " . $artikel_namen[$art] . "</td><td>" .
       $count . "</td></tr>\n"; 
   }


   return $result . "</table>\n";
 }


$BEST = fopen("bestellungen.txt", "r");
//while($arr = fscanf($BEST, "%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\t%s\n")) { 
while($arr = fgetcsv($BEST, 2048, "\t")) {

echo "<tr valign=\"top\" bgcolor=\"#dddddd\"><td>" . $arr[0] . "</td>" .
         "<td>" . $arr[1] . "</td>" .  
         "<td>" . $arr[2] . "</td>" .  
         "<td>" . $arr[3] . "</td>" .  
         "<td>" . $arr[4] . "</td>" .  
         "<td>" . $arr[5] . "</td>" .  
         "<td>" . $arr[6] . "</td>" .  
         "<td>" . $arr[7] . "</td>" .  
         "<td>" . sprintf("%0.2f", $arr[8]) . "</td>" .  
  "<td>" . artArray($arr[9]) . "</td></tr>\n";
}


?>

</table>


<?php } else { ?>

<h1>Keine Berechtigung</h1>

<?php } ?>

 </body>
</html>