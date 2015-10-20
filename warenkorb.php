<html>
 <head>
 <?php include("res/head.php"); ?>
  <title> 
    Einkaufen in Europa
  </title>
 </head>
 <body>
   <h1>Ihr Warenkorb</h1>

<?php

include("res/plist.php");

$WAKO = fopen("warenkorb.txt", "r"); // $WAKO = Filehandle auf "warenkorb.txt"
while($arr = fscanf($WAKO, "%d\t%d\n")) { // 
  $wako[$arr[0]] = $arr[1];
}
fclose($WAKO);

$artnr = $_GET['artikel'];

if($wako[$artnr]) {
  $wako[$artnr] ++;
} else {
  $wako[$artnr] = 1;
}

// save
$WAKO = fopen("warenkorb.txt", "w");
foreach($wako as $artikel=> $anzahl) {
  fwrite($WAKO, "" . $artikel . "\t" . $anzahl . "\n");
}
fclose($WAKO);
?>

<table>
  <tr bgcolor="#cccccc"><td>Nummer</td><td>Name</td><td>Preis</td><td>Anzahl</td><td>Total</td></tr>
<?php
$tp = 0; // Die Variable $tp erhält den Wert Null (0)
foreach($wako as $artikel=> $anzahl) {
  $preis = $artikel_preis[$artikel] * $anzahl;
  $tp += $preis;
  echo "<tr bgcolor=\"#dddddd\">" . 
           "<td>" . $artikel . "</td>" .
           "<td>" . $artikel_namen[$artikel] . "</td>" .
           "<td>CHF " . sprintf("%0.2f", $artikel_preis[$artikel]) . "</td>" .
           "<td>" . $anzahl . "</td>" .
           "<td>CHF " . sprintf("%0.2f", $preis) . "</td>";
  echo "</tr>\n";
}
?>
</table>


<p>
Sie haben Waren für einen Totalbetrag von <b><?php
  $out = sprintf("%0.2f", $tp);
  echo "CHF " . $out;
?></b> in Ihrem Warenkorb.
</p>

<h2>Weitere Einkäufe</h2>

<p>
Zurück zur <a href="produkte.php">Artikellsite</a>
</p>

  <form method="post" action="bestellung.php">

<?php
foreach($wako as $artikel=> $anzahl) {
  $preis = $artikel_preis[$artikel] * $anzahl;
  echo "  <input type=\"hidden\" name=\"Art_" . $artikel . "\" value=\"" . $anzahl . "\" />\n";
}

echo "  <input type=\"hidden\" name=\"Total\" value=\"" . $tp . "\" />\n";

?>

<h2>Bestellung absenden</h2>

<table border="0">
<tr bgcolor="#dddddd"><td>Name</td>
    <td><input type="text" name="name" size="60" value=""></td></tr>
<tr bgcolor="#dddddd"><td>Vorname</td>
    <td><input type="text" name="vorname" size="60" value=""></td></tr>
<tr bgcolor="#dddddd"><td>Adresse (Strasse / Nummer)</td>
    <td><input type="text" name="adr" size="60" value=""> <br /></td></tr>
<tr bgcolor="#dddddd"><td>Postleitzahl</td>
    <td><input type="text" name="plz" size="60" value=""> <br /></td></tr>
<tr bgcolor="#dddddd"><td>Ort</td>
    <td><input type="text" name="ort" size="60" value=""> <br /></td></tr>
<tr bgcolor="#dddddd"><td>Telephon</td>
    <td><input type="text" name="tel" size="60" value=""> <br /></td></tr>
<tr bgcolor="#dddddd"><td>E-Mail</td>
    <td><input type="text" name="email" size="60" value=""> <br /></td></tr>
<tr bgcolor="#dddddd"><td>Kreditkarten Nummer</td>
    <td><input type="text" name="kredit" size="60" value=""></td></tr>
</table>

     <input type="submit" name="submit" value="Bestellen" />

  </form>
<?php
// warenkorb = $art[0], [1], ...  $anz[0], $anz[1], ...
?>
 </body>
</html>