<?php
session_start();
$isConnected = false;
if(isset($_SESSION ["users"])) {
    
    $isConnected = true;
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<div class="container">
  <nav class="navbar bg-dark border-bottom border-body" data-bs-theme="dark">
    <div class="container-fluid">
      <a class="navbar-brand" href="index.php">Inscription </a>
      <?php 
      if($isConnected) {
        ?>
        <a class="navbar-brand" href="add_cat.php">Ajouter Categorie</a>
        <a class="navbar-brand" href="categorie.php">Categorie</a>
        <a class="navbar-brand" href="produit.php">Produit</a>
        <a class="navbar-brand" href="commande.php">Commande</a>
      <a class="navbar-brand" href="add_prod.php">Ajouter Produit</a>
      <a class="navbar-brand" href="deco.php">Deconnecter</a>
      <?php
      }
      ?>
      
      <a class="navbar-brand" href="connection.php">Connection</a>
    </div>
  </nav>
</div>
</body>
</html>