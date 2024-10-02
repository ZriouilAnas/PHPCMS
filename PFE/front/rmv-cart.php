
<?php
session_start();
$id = $_POST['id'];

unset($_SESSION['panier'][$id]);
header("location:".$_SERVER['HTTP_REFERER']);

?>
