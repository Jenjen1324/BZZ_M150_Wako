<html>
 <head>
  <title> 
    Einkaufen in Europa
  </title>

 </head>
 <body>
   <h1>Produkteliste</h1>

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

<tr bgcolor="#cccccc"><td>ID</td> <td>Artikel</td> <td>Preis</td> <td bgcolor="#dddddd">&nbsp;</td></tr>
<?php
foreach($artikel_namen as $id => $name) {
  if($id < 100) 
  {
    echo "<tr bgcolor=\"#dddddd\"><td>" . $id . "</td>" .
           "<td>" . $name . "</td>" .
           "<td>" . "CHF " . sprintf("%0.2f", $artikel_preis[$id]) . "</td>" .
           "<td bgcolor=\"#ffffff\"><a href=\"warenkorb.php?artikel=" . $id . "\"><img border=\"0\" src=\"wako.gif\" /></a></td>\n";
  }
}
?>

</table>
 </body>
</html>