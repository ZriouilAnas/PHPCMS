<?php 

require_once "src/database.php";
$id = $_GET["id"];
echo"".$id."";

$sqlState = $pdo->prepare('DELETE FROM category WHERE id=?');
$supprimer = $sqlState->execute([$id]);
if ($supprimer) {
    header('location:categorie.php');
}
echo'DATABASE ERROR';
?>