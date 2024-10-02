<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>
<?php include 'src/nav.php' ?>
    <div class="container">
        <?php
        require_once "src/database.php";
        
        if (!isset($_SESSION['users'])) {  
            header('location: connection.php');
        }
        ?>
        <h3>bonjour <?php echo $_SESSION['users']['login']; ?> </h3>
    </div>
</body>
</html>