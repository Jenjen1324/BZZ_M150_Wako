<html>
 <head>
  <?php include("res/head.php"); ?>
  <title> 
    Einkaufen in Europa
  </title>

 </head>
 <body>
   <h1>Produkteliste</h1>

<?php

include("res/plist.php");

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