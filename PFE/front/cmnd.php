<?php 



require_once("../src/database.php");


?>
<?php include '../src/nav-front.php' ;
    $cart = $_SESSION['cart'];
    $qtproduit = implode(",",  $_SESSION['cart']);
    $idProduit = array_keys( $cart);
                  $idProduit = implode(',', $idProduit );
    
    
?>    
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Commander</title>
    <style>
            html {max-height:100%; }
html {display:table; width:100%;}
body {display:table-cell; text-align:center; vertical-align:middle; }
        form {

            margin-top: 8%;
            padding: 40px;
              margin-left:20% ;
    border: 5px solid;
                width: 50%;
                
        }
           
            label { 
            text-align:left;
            width: 20%;
            box-sizing: border-box;
            margin-left: 7px;
            color: aquamarine;
            }
            input[type=text] {
                    width: 70%;
                    padding: 7px 12px;
                    margin: 2px 0;
                     box-sizing: border-box;
                     border: 2px solid;
            }
            textarea {
                width: 70%;
                    padding: 12px 12px;
                    margin: 2px 0;
                     box-sizing: border-box;
                     border: 2px solid;
            }
            input[type=submit] {
                    width: 30%;
                    padding: 6px 12px;
                    margin: 2px 12px;
                     box-sizing: border-box;
                     border: 2px solid;
                     
                     
            }
  
  
  </style>
</head>

<?php 

require_once "../src/database.php";
if (isset($_POST['envoyer'])) {
    session_start();
    $id_prd = $_POST['id_prd'];
    $qty_prd = $_POST['qty_prd'];
    $tp = $_POST['tp'];
    $titre = $_POST['titre'];
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $societe = $_POST['societe'];
    $adresse = $_POST['adresse'];
    $ville = $_POST['ville'];
    $pays = $_POST['pays'];
    $email = $_POST['email'];
    $telephone = $_POST['telephone'];
    $remarques = $_POST['remarques'];
    
    
    
   
        

    $sqlState = $pdo->prepare("INSERT INTO cmnd(id_prd,qty_prd,tp,titre,nom,prenom,societe,adresse,ville,pays,email,telephone,remarques) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?) ");
    $sqlState->execute([$id_prd,$qty_prd,$tp,$titre,$nom,$prenom,$societe,$adresse,$ville,$pays,$email,$telephone,$remarques]);
     ?>  <script> alert("votre form a etait envoyer avec success");</script> <div>"votre form a etait envoyer avec success"</div> 
     <?php
}


?>

<body>

    
    <form method="post">
        <h3 style="margin-top: 2px;">Inserez votre detaille </h3><br>
    <input type="text" name="id_prd" hidden  value="<?php echo $idProduit ?>">
    <input type="text" name="qty_prd" hidden value="<?php echo $qtproduit  ?>">
    <input type="text" name="tp" hidden value="<?php echo $_SESSION["total"]; ?>">
    <label>Titre :</label>
     <input type="radio" name="titre" value="madame"> <label>Madame</label> <input type="radio" value="monsieur" name="titre"> <label>Monsieur</label>
            <br>
     <label>Nom</label>
        <input type="text" name="nom" value=" ">
            <br>
        <label>Prenom</label>
        <input type="text" name="prenom" value="">
        <br>
        <label>Societe</label>
        <input type="text" name="societe" value="">
        <br>
        <label>Adresse</label>
        <input type="text" name="adresse">
        <br>
        
        <br>
        <label>Ville</label>
        <input type="text" name="ville">
        <br>
        <label>Pays</label>
        <input type="text" name="pays">
        <br>
        <label>* Email</label>
        <input type="text" name="email" value="">
        <br>
        <label>* Telephone</label>
        <input type="text" name="telephone">
        
        
        <br>
            <label>*Remarques</label>
            <textarea name="remarques"></textarea>
            <br>
            <input  type="submit" value="Envoyer le commande"  name="envoyer">
            
    </form>
</body>
</html>