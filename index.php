<?php
session_start();
ob_start() 

?>

        <form action="traitement.php?action=addProduit" method="post">
            <!-- <legend>Ajouter produit</legend> -->
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Nom du produit</label>
                    <input type="text"  class="form-control" name="name">
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Prix du produit</label>
                    <input type="text"  class="form-control" name="price">
                    <!-- <input type="text"  class="form-control" name="price" value="<?php //echo $_SESSION['products'][0]['price']; ?>"> -->
                </div>
                <div class="mb-3">
                    <label for="disabledTextInput" class="form-label">Quantitée désirée</label>
                    <input type="number"  class="form-control" name="qtt" value="1">
                </div>
            <button type="submit" class="btn btn-primary" name="submit">Ajouter</button>
        </form>

        <?php


        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Veuilliez remplir les champs...</p>";
        }else{
        $quantite = 0;
        foreach($_SESSION['products'] as $product ){
          $quantite += $product['qtt'];
          
        }
  
        echo "Nombre Produit :<br>";
        echo "<button type='button' class='btn btn-primary position-relative> 
        <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>". $quantite; 
        echo '<span class="visually-hidden">unread messages</span></span></button>';


        $alreadyDisplayed = false;
        foreach($_SESSION['products'] as $product){
            $result = $product['message'];
            if(empty($result)){
                $result = "<br>Ajouté avec succès";
            }
            if (!$alreadyDisplayed) {
                echo $result; // Afficher le résultat
                $alreadyDisplayed = true; // Mettre à jour le drapeau pour indiquer que le résultat a été affiché
            }
        }
    }



$title = "Ajouter Produit";
$content = ob_get_clean(); 
require_once "template.php";
?>