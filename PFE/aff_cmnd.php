<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
<h4>Commande Detaille</h4>

    <div class="container">
        <table class="table table-striped">
            
            <?php 
require_once 'src/database.php';
$sqlState = $pdo->prepare('SELECT * FROM cmnd WHERE id_cmnd=? ');
$id = $_GET['id'];
$sqlState->execute([$id]);
$cmnd = $sqlState->fetch(PDO::FETCH_ASSOC);


?>        <tr>
           <th>id du commande</th>
           <tr>
            <td><?php echo $cmnd['id_cmnd'] ?></td>
            </tr>
            <th>Nom</th>
            <tr>
            <td><?php echo $cmnd['titre'] ?></td>
            <td><?php echo $cmnd['nom'] ?></td>
            <td><?php echo $cmnd['prenom'] ?></td>
            </tr>
            <tr>
            <th>Location</th>
            <tr>
            <td><?php echo $cmnd['societe'] ?></td>
            <td><?php echo $cmnd['adresse'] ?></td>
            <td><?php echo $cmnd['ville'] ?></td>
            <td><?php echo $cmnd['pays'] ?></td>
            </tr>
            <th>Contact</th>
            <tr>
            <td><?php echo $cmnd['email'] ?></td>
            <td><?php echo $cmnd['telephone'] ?></td> 
            </tr>
            <tr>
            <th>Remarque</th>
            <tr>
            <td><?php echo $cmnd['remarques'] ?></td> 
            
            </tr>
            </table>
            <h4>Commande Produits</h4>

            <table class="table table-striped">
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                </tr>
            
            <tr><?php

$string = $cmnd['id_prd'];


$values = explode(',', $string);


foreach ($values as $value ) {
    $sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=? ');
$sqlState->execute([$value]);
$prd = $sqlState->fetch(PDO::FETCH_ASSOC);
?>

   <th><?php echo $prd['libelle'] . "\n"; ?></th> 
   <th><?php echo $prd['prix'] . "\n"; ?> DH</th> 
   <th></th>
   
   <?php
}
?>
</tr>

    
<tr>

    <?php 
    $string2 = $cmnd['qty_prd'];
    $qtys = explode(',', $string2);
    
    foreach ($qtys as $qty) {
        // Print each word
       ?> 
       <td><?php echo 'Qauntite : ' .$qty ;?></td>
       <td></td>
       
       <?php
    }; ?></tr> 

    
    </tr>

<tr>
    <th>Prix Total</th>
    <tr>
<td><?php echo $cmnd['tp'] ?> DH</td>
</tr>

        </tr> 
       
        </table>
        
    </div>
</body>
</html>