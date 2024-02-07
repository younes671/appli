<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" 
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Ajout produit</title>
</head>
<body>
<header>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="#">Home</a>
            </li>
            <li class="nav-item">
            <a class="nav-link" href="recap.php">Récapitulatif</a>
            </li>
        </ul>
        </div>
    </div>
    </nav>
</header>
        <form action="traitement.php?action=addProduit" method="post">
            <legend>Ajouter produit</legend>
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
        
        ?>

<!-- <button type="button" class="btn btn-primary position-relative">
  Inbox
  <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
    99+
    <span class="visually-hidden">unread messages</span>
  </span>
</button> -->
  </body>
</html>