<?php include '../src/nav-front.php' ?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des categories</title>
    <link rel="stylesheet" href="../src/styles-front.css" />
</head>

<body>

    <div class="container">
<?php 
require_once("../src/database.php");
$categories = $pdo->query("SELECT * FROM category" )->fetchAll(PDO::FETCH_ASSOC);

?>

<sidenav id="sidenav">
<ul  class="list-group list-group-flush">
    <?php 
    foreach($categories as $category) {
        ?>
        <li class="list-group-item">
            <a class="nav-link sidelink"  href="category.php?id=<?php echo $category["id"] ?>" class="btn btn-light"><?php echo $category["libelle"]; ?></a>
            
        </li>
    <?php
    
    }
    
    ?>
 
</ul>
</sidenav>
</div>
</body>
</html>