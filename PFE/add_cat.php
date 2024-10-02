<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'src/nav.php' ?>
    <div class="container">
    <h4>Ajouter Categorie</h4>
    <a href="categorie.php" class="btn btn-primary">Liste des catégories</a>
<?php 
    if (isset($_POST['add'])) {
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
       
        if(!empty($libelle) && !empty($description)) {
            require_once "src/database.php";
    
        $sqlState = $pdo->prepare("INSERT INTO category(libelle,description) VALUES(?,?) ");
        $sqlState->execute([$libelle,$description]);
        ?>
        <div class="alert">
        Category <?php echo $libelle ?> est bien Ajouter
        </div>
        
        <?php 
    }
    else {
        ?>
        <div class="alert alert-danger">
        "entrez libelle  et description"
        </div>
        <?php
        
    }}
?>

        <form method="post">

            <label  class="form-label">libelle</label>
                <input type=""  class="form-control" name="libelle">

            <label  class="form-label">description</label>
            <textarea class="form-control" name="description"></textarea>
                

            <input type="submit" value="Ajouter Categorie" class="btn btn-primary" name="add">
        </form>
    </div>
    
</body>
</html>