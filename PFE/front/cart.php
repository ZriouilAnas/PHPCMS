
<?php 
require_once("../src/database.php");
?>
<!doctype html>
<html lang="en">
<head>
    <link rel="stylesheet" href="table.css" />
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Panier</title>
    
   
</head>
<body>
<?php include '../src/nav-front.php' ;


?>

  
    <h4>Panier</h4>
    
    <section id="pricing">
                <?php 
                $panier = $_SESSION['panier'];
               
                
                


                if(empty( $panier )) {
                  ?>
                  <div class="panier"><h5>Votre panier est vide</h5></div>
                  <div class="panier"><h6>Voyer le remplir</h6></div>
                  <br>
                  <a href="../front/home.php ">
                       <button  type="button" class="cartb">
                        
                         <span>Retourner </span> sur le boutique
                      </button>
                  <?php
                } else { 
                  $idProduit = array_keys($panier);
                  $idProduit = implode(',', $idProduit);
                  
                  $produits = $pdo->query( "SELECT * FROM produit WHERE id IN ($idProduit)" )->fetchAll(PDO::FETCH_ASSOC);
                  ?>
                 
                 
           
              
           
                  <table>
                    <thead>
                    <tr>
                        <th class="sr-only year">ID</th>
                        <th>Image</th>
                        <th>Nom</th>
                        <th>Quantite</th>
                        <th>Prix</th>
                        <th>Total</th>
                      </tr>
                      </thead>
                      <tbody>
                  <?php 
                   $total = 0;
                    foreach($produits as  $produit ) {   
                      $totalProduit = $produit['prix'] * $panier[$produit['id']];
                      $total +=  $totalProduit;
                      $idProduit = $produit['id']

                      ?>
                        
                        <tr >
                          <td><?php echo $produit['id'] ?></td>
                          <td><img width="80px" height="80px" src="..\upload\product\<?php echo $produit['image'] ?>" alt=""></td>
                          <td><?php echo $produit['libelle'] ?></td>

                          <td><?php echo $panier[$produit['id']] 
                          
                          ?>
                          <hr>
                        <br>
                        <?php  
         $idProduit  = $produit['id'];
      
      include '../src/counter.php'?>  
                        </td>
                          <td><?php echo $produit['prix'] ?></td>
                          <td><?php echo $totalProduit?></td>
                          <td>
                            <form method="post" action="rmv-cart.php">
                            <input type="hidden" name="id" value="<?php echo $produit['id']?>">
                            <input type="hidden" name="tp" value="<?php $totalProduit?>">
                            <input  style="width: max-content; background-color:coral" name="supprimer" class="btn" type="submit" value="Supprimer !">
                            </form>
                            
                          </td>
                          
                        </tr>
                        
                        
                  


                      <?php
                }
                
                ?>
                </tbody>
                  <tfoot>
                            <tr>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <td></td>
                              <th>TOTAL : </th>
                              <th><?php echo $total?></th>
                            </tr>
                            <tr>
                            <td></td>
                              <td></td>
                              <td></td>
                              <td colspan="3">
                                <?php 
                                  if (isset($_POST['vider'])) {
                                    $_SESSION['panier'] = [];
                                    header('location:cart.php' );
                                  }
                                ?>
                                  <form method="post">
                                      <input  style="width: max-content; background-color:crimson"  class="btn" onclick="return confirm('Voulez Vous vider le panier')" type="submit" name="vider" value="Vider le Panier !">
                                      <a href="cmnd.php"><input  style="width: max-content; background-color:darkolivegreen" class="btn"  value="Commander !" name="cmnd" ></a>
                                  </form>
                               </td>
                              
                              <td></td>
                              
                            </tr>
                          </tfoot>
                          
                          </table>
                          
                          
                <?php
                }
                
                ?>
                <?php 
                $_SESSION["total"] = $total;
                $_SESSION["cart"] = $panier;
                
                ?>
    </section>
</body>

<script src="..\js\counter.js"></script>   
</html>
