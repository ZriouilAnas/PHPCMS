
<?php 
require_once("../src/database.php");
$id = $_GET['id'];
$sqlState =  $pdo->prepare("SELECT * FROM category WHERE id=?" );
$sqlState->execute([$id]);
$categories = $sqlState->fetch(PDO::FETCH_ASSOC);

$sqlState =  $pdo->prepare("SELECT * FROM produit WHERE id_category=?" );
$sqlState->execute([$id]);
$produits = $sqlState->fetchAll(PDO::FETCH_ASSOC);


?>

<html lang="en">
<head>
 
   <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>category | <?php echo $categories['libelle'] ?></title>
   
</head>
<body>
<?php include '../src/nav-front.php' ?>

<main id="main-doc">
  <section class="main-section">
    <h4><?php echo $categories['libelle']?></h4>
    <section id="products" class="products">
            <div class="products-grid">
                <?php 
                foreach ($produits as $produit) {
                  $idProduit = $produit['id'];
             ?>  <div class="product-card product">
              
                      <a
                    href="produit.php?id=<?php echo $produit['id']?>"
                    >
                          <img
                            class="product-image"
                            src="../upload/product/<?php echo $produit['image'] ?>"
                            alt="product"
                          /></a>
                          <div class="product-tile">
                          <p >
                            <span class="code">۞</span>
                            <?php echo $produit['libelle'] ?>
                            <span class="code">۞</span>
                          </p>
                          <p class="product-title">
                          
                          </p>
                          <p>
                            <span class="code">۞</span>
                            <?php echo $produit['prix'] ?> DH
                            <span class="code">۞</span>
                          </p>
                          </div>
                          <div >
                                  
                                        </div>
                          
                      
                </div>
                
                <?php
                } 
                ?>
</section>
</main>

</body>
</html>
<?php 


include 'index.php' ?>