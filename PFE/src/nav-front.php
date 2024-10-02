<?php 
session_start();
require_once 'database.php';
if (!isset($_SESSION['panier'])) {
  $_SESSION['panier'] = [];
}
?>

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
<link rel="stylesheet" href="../src/styles-front.css" />
<?php 
define('pcnt',   count($_SESSION['panier']));
?>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<header id="header">

          <div class="logo">
            <img
              id="header-img"
              src="../img\logos\LogoPFE2.jpg"
              alt="original trombones logo"
            />
          </div>
          <nav id="nav-bar">
            <ul>
              <li><a class="nav-link" href="Home.php">Home</a></li>
             
              
            </ul>
            <a href="../front/cart.php ">
            <button  id="cart-btn" type="button" class="cartb"><div id="cartAmount" class="cartAmount">  <?php  echo  pcnt; ?> </div><i class="bi bi-cart2"></i>
        <span id="show-hide-cart">afficher </span> le panier
      </button>
      </a>
          </nav>
          
        </header>

        