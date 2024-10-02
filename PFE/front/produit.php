
<?php 
require_once("../src/database.php");
$id = $_GET['id'];
$sqlState =  $pdo->prepare("SELECT * FROM produit WHERE id=?" );
$sqlState->execute([$id]);
$produit = $sqlState->fetch(PDO::FETCH_ASSOC);

$sqlState =  $pdo->prepare("SELECT * FROM produit WHERE id_category=?" );
$sqlState->execute([$id]);
$produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);


?>

<html lang="en">
<head>
  <link rel="stylesheet" href="../src/styles-front.css" />
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>produit | <?php echo $produit['libelle'] ?></title>
   
</head>
<body>


<main id="main-doc">
  <section class="plp-section">
  
    <div class="PLPcontainer">
    
    <div style="min-width:300px ;" class="PLP1">
      <img   class="PLP-image" src="../upload/product/<?php echo $produit['image']?>" alt=" <?php echo $produit['libelle']?>">
    </div>
    <div class="PLP2">
      <h1>Produit : <span class="code">۞</span> <?php echo $produit['libelle']?> <span class="code">۞</span> </h1>
      <br>
      <hr>
      <h2>prix : <?php echo $produit['prix']?> DH</h2>
      <hr>
      <p>
      <?php echo $produit['description']?>
      </p>
      <?php  
         $idProduit  = $produit['id'];
         session_start();
      include '../src/counter.php'?>
      <br>
      </div>
    </div>
</main>
</body>
<script src="..\js\counter.js"></script>   
</html>
<?php 


include 'index.php' ?>