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

include("res/plist.php");

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