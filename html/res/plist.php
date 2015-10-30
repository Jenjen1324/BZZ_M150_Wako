<?php 

$artikel_namen = array();
$artikel_preis = array();

$mysql = new mysqli("127.0.0.1", "root", "1234", "m150_wako");

$stmt = $mysql->prepare("SELECT id, name, preis FROM produkte");
$stmt->execute();
$stmt->bind_result($id, $name, $preis);

while($stmt->fetch())
{
	$artikel_namen[$id] = $name;
	$artikel_preis[$id] = $preis;
}

$stmt->close();
$mysql->close();
 ?>