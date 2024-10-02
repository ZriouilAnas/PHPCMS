<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Categorie</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'src/nav.php' ?>
    <div class="container">
    <h4>Modifier Categorie</h4>
    <a href="categorie.php" class="btn btn-primary">Liste des catégories</a>
<?php 
require_once 'src/database.php';
$sqlState = $pdo->prepare('SELECT * FROM category WHERE id=? ');
$id = $_GET['id'];
$sqlState->execute([$id]);
$categorie = $sqlState->fetch(PDO::FETCH_ASSOC);


   
?>
<?php 
    if (isset($_POST['modi'])) {
        $libelle = $_POST['libelle'];
        $description = $_POST['description'];
       
        if(!empty($libelle) && !empty($description)) {
            
    
        $sqlState = $pdo->prepare("UPDATE category SET libelle = ? , description = ? WHERE id = ?  ");
        $sqlState->execute([$libelle,$description, $id]);
        ?>
        <div class="alert">
        Category <?php echo $libelle ?> est bien Modifier
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
            
        <label  class="form-label">id</label>
                <input type="" value="<?php echo $categorie['id'] ?>"  class="form-control" name="id">

            <label  class="form-label">libelle</label>
                <input type=""  value="<?php echo $categorie['libelle'] ?>"  class="form-control" name="libelle">

            <label  class="form-label">description</label>
            <textarea class="form-control" name="description"><?php echo $categorie['description'] ?></textarea>
                

            <input type="submit" value="Modifier Categorie" class="btn btn-primary" name="modi">
        </form>
    </div>
    
</body>
</html>