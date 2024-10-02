<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier produits</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'src/nav.php' ?>
    <div class="container">
    <h4>Modifier Produit</h4>
    <a href="produit.php" class="btn btn-primary">Liste des produits</a>
<?php 
$id = $_GET['id'];
require_once 'src/database.php';
$sqlState = $pdo->prepare('SELECT * FROM produit WHERE id=? ');

$sqlState->execute([$id]);
$produits = $sqlState->fetch(PDO::FETCH_ASSOC);


   
?>
<?php 
    if (isset($_POST['mod'])) {
        $libelle = $_POST['libelle'];
        $prix = $_POST['prix'];
        $categorie = $_POST['categorie'];
        $description = $_POST['description'];


        $filename = '';
        if (!empty($_FILES['image']['name'])) {
            $image = $_FILES['image']['name'];
            $filename = uniqid() . $image;
            move_uploaded_file($_FILES['image']['tmp_name'], 'upload/produit/' . $filename);
        }
        
        if (!empty($libelle) && !empty($prix) && !empty($categorie)) {

            if (!empty($filename)) {
                $query = "UPDATE produit SET libelle=? ,
                                                    prix=? ,
                                                    description=?,
                                                    id_category=?,
                                                    
                                                    
                                                    image=?

                                                WHERE id = ? ";
                $sqlState = $pdo->prepare($query);
                $updated = $sqlState->execute([$libelle, $prix, $categorie, $description , $filename, $id]);
            } else {
                $query = "UPDATE produit 
                                                SET libelle=? ,
                                                    prix=? ,
                                                    description?,
                                                    id_category=?
                                                    
                                                WHERE id = ? ";
                $sqlState = $pdo->prepare($query);
                $updated = $sqlState->execute([$libelle, $prix, $categorie, $description, $id]);
            }
            if ($updated) {
                ?>
                <div class="alert">
                Produit <?php echo $libelle ?> est bien Modifier
                </div>
                <?php 
            } else {

                ?>
                <div class="alert alert-danger" role="alert">
                    Database error (40023).
                </div>
                <?php
            }
        } else {
            ?>
            <div class="alert alert-danger" role="alert">
                Libelle , prix , catégorie sont obligatoires.
            </div>
            <?php
        }
       
       }
?>


        
            
        <form method="post">
        <label  class="form-label">id</label>
                <input type="" value="<?php echo $produits['id'] ?>"  class="form-control" name="id">

<label  class="form-label">libelle</label>
    <input type=""  value="<?php echo $produits['libelle'] ?>" class="form-control" name="libelle">

    <label  class="form-label">image</label>
    <img width="100" height="100" src="upload/product/<?= $produits['image'] ?>"><br>
                <input type="file"  class="form-control" name="image">


<label  class="form-label">prix</label>
<input type="number"  value="<?php echo $produits['prix'] ?>" class="form-control" name="prix">

<label  class="form-label">description</label>
                <textarea name="description" value="<?php echo $produits['description'] ?>" ></textarea>

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
    

<input type="submit" value="Modifier Produit" class="btn btn-primary" name="mod">
</form>
    </div>
    
</body>
</html>