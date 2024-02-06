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
    <title>Récapitulatif des produits</title>
</head>
<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-body-primary">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="index.php">Home</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" href="#">Récapitulatif</a>
                </li>
            </ul>
            </div>
        </div>
        </nav>
    </header>
    
<?php

    // vérification si clé existe ou clé existe mais vide
        if(!isset($_SESSION['products']) || empty($_SESSION['products'])){
            echo "<p>Aucun produit en session...</p>";
        }else{
            echo "<table class='table table-striped'>",
                        "<thead>",
                            "<tr>",
                                "<th>#</th>",
                                "<th>Nom</th>",
                                "<th>Prix</th>",
                                "<th>Quantité</th>",
                                "<th>Total</th>",
                            "</tr>",
                        "</thead>",
                        "<tbody>";
        $totalGeneral = 0;

        foreach($_SESSION['products'] as $index => $product){
            echo  "<tr>",
                    "<td>".$index."</td>",
                    "<td>".$product["name"]."</td>",
                    "<td>".number_format($product["price"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                    "<td>".$product["qtt"]."</td>",
                    "<td>".number_format($product["total"], 2, ",", "&nbsp;")."&nbsp;€</td>",
                "</tr>";
                // number_format(variable à modifier, nombre de décimales souhaité, caractère séparateur décimal,caractère séparateur de milliers
                $totalGeneral += $product['total'];
        }
        echo "<tr>",
                "<td coldspan=4>Total général  : </td>",
                "<td><strong>"."<td>".number_format($totalGeneral, 2, ",", "&nbsp;")."&nbsp;€</strong></td>",
                "</tr>",
            "</tbody>",
                "</table>";
      }

      $quantite = 0;
        foreach($_SESSION['products'] as $product ){
          $quantite += $product['qtt'];
        }

        echo "Nombre Produit :<br>";
        echo "<button type='button' class='btn btn-primary position-relative> 
        <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>". $quantite; 
        echo '<span class="visually-hidden">unread messages</span></span></button>';
    

    ?>

</body>
</html>