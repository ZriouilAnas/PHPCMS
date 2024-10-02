<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
<?php 

$qty = $_SESSION['panier'][$idProduit] ?? 0;


$button = $qty == 0 ? 'Ajouter au panier' :'Modifier la quantite';
?>
<form method="post" class="counter" action="add-cart.php">
<button onclick="return false" class="btn counter-moins">-</button>
<input type="hidden" name="id" value="<?php echo $idProduit ?>">
 <input class="form-control" value="<?php echo $qty ?>" type="number" name="qty" id="qty" max="99">
<button onclick="return false" class="btn counter-plus">+</button>
<br>
<input type="submit" class="cartb" value="<?php echo $button ?>" name="ajouter">
</form>
<br>
<hr>
