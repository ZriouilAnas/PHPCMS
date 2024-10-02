<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Produit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php 
    require_once 'src/database.php';
    include 'src/nav.php' ?>
    <div class="container">
    <h4>Ajouter Produit</h4>
<?php 
    if (isset($_POST['add'])) {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $categorie = $_POST['categorie'];
        $date = date('Y-m-d');
        $description = $_POST['description'];

        
        $filename = 'upload/product/PHolder.png';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/product/' . $filename);
        }

       
        if(!empty($libelle) && !empty($prix)) {
            require_once "src/database.php";
    
        $sqlState = $pdo->prepare("INSERT INTO produit(libelle,prix,id_category ,date_creation,image,description) VALUES(?,?,?,?,?,?)");
        $sqlState->execute([$libelle,$prix,$categorie,$date, $filename,$description]);
        ?>
        <div class="alert">
        Produit <?php echo $libelle ?> est bien Ajouter
        <a href="produit.php" class="btn btn-primary">Liste des produits</a>
        </div>
        <?php 
    }
    else {
        ?>
        <div class="alert alert-danger">
        "entrez libelle  et prix"
        </div>
        <?php
        
    }}
?>

        <form method="post" enctype="multipart/form-data">

            <label  class="form-label">libelle</label>
                <input type=""  class="form-control" name="libelle">

            <label  class="form-label">image</label>
                <input type="file"  class="form-control" name="image">

            <label  class="form-label">prix</label>
                <input type="number"  class="form-control" name="prix">

                <label  class="form-label">description</label>
                <textarea name="description" ></textarea>

            

            <?php  
             $categories = $pdo->query("SELECT * FROM category ")->fetchAll(PDO::FETCH_ASSOC) ;
             
            
            ?>

                <label  class="form-label">Categorie</label>
            <select name="categorie" class="form-control y2">
                <option value="">choisir une categorie</option>
            <?php  
             foreach ($categories as $category) {
                echo "<option value=".$category['id'].">".$category['libelle']."</option>";
             }
            
            ?>
               

            </select>
                

            <input type="submit" value="Ajouter Produit" class="btn btn-primary" name="add">
        </form>
    </div>
    
</body>
</html>