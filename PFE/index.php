<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
    <?php include 'src/nav.php' ?>
    <div class="container">
    <h4>Ajouter ulitilisateur</h4>
<?php 
if(isset($_POST["add"])) {
    $login = $_POST["login"];
    $mdp = $_POST["password"];

    if(!empty($login) && !empty($mdp)) {
        require_once "src/database.php";

        $date = date("Y-m-d");
        var_dump($date);
    echo "".$login."".$mdp."";
    $sqlState = $pdo->prepare("INSERT INTO users VALUES(null,?,?,?) ");
    $sqlState->execute([$login,$mdp,$date]);
    //redirection
} else {
    ?>
    <div class="alert alert-danger">
    "entrez le login et le mot de pass"
    </div>
    <?php
    
}}

?>

        <form method="post">

            <label  class="form-label">Login</label>
                <input type=""  class="form-control" name="login">

            <label  class="form-label">Password</label>
                <input type="password"  class="form-control" name="password">

            <input type="submit" value="Ajouter ulitilisateur" class="btn btn-primary" name="add">
        </form>
    </div>
    
</body>
</html>