<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    
    <link
  rel="stylesheet"
  href="https://use.fontawesome.com/releases/v5.8.1/css/all.css"
  integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
  crossorigin="anonymous"
/>
</head>

<body>
<?php include '../src/nav-front.php' ;
if (isset($_POST['env'])) {
  require_once '../src/database.php';
  $email = $_POST['email'];
  $sqlState = $pdo->prepare("INSERT INTO inf(email) VALUES(?) ");
    $sqlState->execute([$email]);
}


?>
    <div class="container">
  
    <main id="main-doc" >
               <section id="hero">
          <h2>Bonjour, masterpieces of a clothing</h2>
          
          <form id="form" method="post">
            <input
              name="email"
              id="email"
              type="email"
              placeholder="Enter your email address"
              required
            />
           
            <input id="submit" type="submit" value="lettre de nouvelles" class="btn" name="env" />
          </form>
          <a aria-label="Chat on WhatsApp" href="https://wa.me/+212621980036"> <img alt="Chat on WhatsApp" src="../img\logos\WhatsAppButtonGreenMedium.svg" />
</a > 


        </section>
          <section id="features">
            <div class="grid">
              <div class="icon"><i class="fa fa-3x fa-fire"></i></div>
              <div class="desc">
                <h2>Matériaux haut de gamme</h2>
                <p>
                  Nos vêtements sont fabriqués à partir du laiton le plus brillant provenant de sources locales. Ce
                   augmentera la longévité de votre achat.
                </p>
              </div>
            </div>
            <div class="grid">
              <div class="icon"><i class="fa fa-3x fa-truck"></i></div>
              <div class="desc">
                <h2>Livraison rapide</h2>
                <p>
                  Nous veillons à ce que vous receviez vos vêtements dès que nous avons terminé leur confection. Nous proposons également des retours gratuits si vous n'êtes pas satisfait.
                </p>
              </div>
            </div>
            <div class="grid">
              <div class="icon">
                <i class="fa fa-3x fa-battery-full" aria-hidden="true"></i>
              </div>
              <div class="desc">
                <h2>Qualité garantie </h2>
                <p>
                  Pour chaque achat que vous effectuez, nous veillerons à ce qu'il n'y ait aucun dommage ou
                  défauts et nous vérifierons.
                </p>
              </div>   
            </div>
           
          </section>

  
 


    </div>

</body>
</html>
<?php
include 'index.php' ?>