<?php
session_start();


$id = $_POST['id'];
$qty = $_POST['qty'];

if (!isset($_SESSION['panier'])) {
    $_SESSION['panier'] = [];
}
if($qty == 0){
    unset($_SESSION['panier'][$id]);
}else{
    $_SESSION['panier'][$id] = $qty;
}

header("location:".$_SERVER['HTTP_REFERER']);
