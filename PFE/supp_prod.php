<?php 

require_once "src/database.php";
$id = $_GET["id"];
echo"".$id."";

$sqlState = $pdo->prepare('DELETE FROM produit WHERE id=?');
$supprimer = $sqlState->execute([$id]);
if ($supprimer) {
    header('location:produit.php');
}
echo'DATABASE ERROR';
?>