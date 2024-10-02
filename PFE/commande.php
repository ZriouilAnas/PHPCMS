<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
<h4>Liste des commandes</h4>

    <div class="container">
        <table class="table table-striped">
            <tr>
            <th>ID</th>
                <th>Nom</th>
                <th>Prenom </th>
                <th>Ville  </th>
                <th>TotalPrix </th>
            </tr>
            <?php
        require_once "src/database.php";
        $commandes = $pdo->query("SELECT * FROM cmnd")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($commandes as $cmnd) {
            ?>  <tr>
                <td><?php echo $cmnd['id_cmnd'] ?></td>
            <td><?php echo $cmnd['nom'] ?></td>
            <td><?php echo $cmnd['prenom'] ?></td>
            <td><?php echo $cmnd['ville'] ?></td>
            <td><?php echo $cmnd['tp'] ?></td>
            <td> <a href="aff_cmnd.php?id=<?php echo $cmnd['id_cmnd'] ?>" class="btn btn-primary">Afficher</a>
                    <a href="supp_cat.php?id=<?php echo $cmnd['id_cmnd'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $cmnd['id_cmnd'].$cmnd['ville'].$cmnd['nom'] ?>');" class="btn btn-danger">Supprimer</a></td>
        </tr> 
        <?php   
        }
        ?>
        </table>
    </div>
</body>
</html>