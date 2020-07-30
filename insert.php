<?php 

mb_internal_encoding("utf8");

require "DB.php";
$db = new DB();
$pdo = $db->connect();

$stmt = $pdo ->prepare($db->insert());

$stmt->bindValue(1,$_POST['handlename']);
$stmt->bindValue(2,$_POST['title']);
$stmt->bindValue(3,$_POST['comments']);

$stmt->execute();
$pdo = NULL;

// $pdo = new PDO("mysql:dbname=yuta;host=localhost;","root","");

// $pdo->exec("insert into 4each_keijiban(handlename,title,comments)values('".$_POST['handlename']."','".$_POST['title']."','".$_POST['comments']."');");

header("Location:http://localhost/2_4each_keijiban/index.php");

?>