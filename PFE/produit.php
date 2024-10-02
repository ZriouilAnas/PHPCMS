<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
<h4>Liste des produits</h4>
<a href="add_prod.php" class="btn btn-primary">Ajouter produit</a>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>libelle </th>
                <th>prix  </th>
                <th>id_category </th>
                <th>Date_creation </th>
                <th>image </th>
            </tr>
            <?php
        require_once "src/database.php";
        $produits = $pdo->query("SELECT produit.*,category.libelle as 'GG' FROM produit INNER JOIN category on produit.id_category = category.id")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($produits as $produit) {
            ?>  <tr>
            <td><?php echo $produit['id'] ?></td>
            <td><?php echo $produit['libelle'] ?></td>
            <td><?php echo $produit['prix'] ?> MAD</td>
            <td><?php echo $produit['GG'] ?></td>
            <td><?php echo $produit['date_creation'] ?></td>
            
            <td><img width="100" height="100" src="upload/product/<?= $produit['image']?>"></td>
            <td> <a href="modi_prod.php?id=<?php echo $produit['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="supp_prod.php?id=<?php echo $produit['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $categorie['libelle'] ?>');" class="btn btn-danger">Supprimer</a></td>
        </tr> 
        <?php   
        }
        ?>
        </table>
    </div>
</body>
</html>