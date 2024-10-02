<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
    


    <div class="container">
    <h4>Connection</h4>
    <?php 
if(isset($_POST["add"])) {
    $login = $_POST["login"];
    $mdp = $_POST["password"];

    if(!empty($login) && !empty($mdp)) {
        require_once "src/database.php";
        $sqlState = $pdo->prepare("SELECT * FROM users WHERE login=? AND password=?");
    $sqlState->execute([$login,$mdp]);
    if($sqlState->rowCount() > 0) {
        
        var_dump($sqlState->fetch());
        $_SESSION["users"] = $sqlState->fetch();
        header("location: admin.php");


} else {
        ?>
        <div class="alert alert-danger">
        "login ou mot de pass incorrect"
        </div>
        <?php
    }
    
} else {
    ?>
    <div class="alert alert-danger">
    "login ou mot de pass incorrect"
    </div>
    <?php
    
}}?>
        <form method="post">

            <label  class="form-label">Login</label>
                <input type=""  class="form-control" name="login">

            <label  class="form-label">Password</label>
                <input type="password"  class="form-control" name="password">

            <input type="submit" value="Connection" class="btn btn-primary" name="add">
        </form>
    </div>
    
</body>
</html>