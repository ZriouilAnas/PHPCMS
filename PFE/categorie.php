<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste categories</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
<h4>Liste des categories</h4>
<a href="add_cat.php" class="btn btn-primary">Ajouter catégorie</a>
    <div class="container">
        <table class="table table-striped">
            <tr>
                <th>id</th>
                <th>libelle </th>
                <th>description  </th>
                <th>Date_creation </th>
            </tr>
            <?php
        require_once "src/database.php";
        $categories = $pdo->query("SELECT * FROM category")->fetchAll(PDO::FETCH_ASSOC);
        foreach ($categories as $category) {
            ?>  <tr>
            <td><?php echo $category['id'] ?></td>
            <td><?php echo $category['libelle'] ?></td>
            <td><?php echo $category['description'] ?></td>
            <td><?php echo $category['Date_creation'] ?></td>
            <td> <a href="modi_cat.php?id=<?php echo $category['id'] ?>" class="btn btn-primary">Modifier</a>
                    <a href="supp_cat.php?id=<?php echo $category['id'] ?>" onclick="return confirm('Voulez vous vraiment supprimer la catégorie <?php echo $category['libelle'] ?>');" class="btn btn-danger">Supprimer</a></td>
        </tr> 
        <?php   
        }
        ?>
        </table>
    </div>
</body>
</html>