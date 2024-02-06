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
    ?>
</body>
</html>