<?php
    session_start();
    ob_start(); 


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
?>
            <tr>
                <td>
                    <a style='text-decoration:none'class='link-light' href='traitement.php?action=deleteProduit&indexProduit=<?= $index ?>'>
                        <button class='btn btn-danger' type='button'>Supprimer produit</button>
                    </a>
                    <span><?= $index ?></span>
                </td>
                <td><?= $product["name"] ?></td>
                <td><?= number_format($product["price"], 2, ",", "&nbsp;") ?>&nbsp;€</td>
                <td>
                <div class='d-grid gap-2 d-md-inline'>
                        <a style='text-decoration:none' href="traitement.php?action=down-qtt&indexProduit=<?= $index ?>">
                        <button class='btn btn-primary' type='button'>-</button>
                    </div>
                    <span><?= $product["qtt"] ?>&nbsp;</span>
                    <div class='d-grid gap-2 d-md-inline'>
                        <a style='text-decoration:none' href="traitement.php?action=up-qtt&indexProduit=<?= $index ?>">
                        <button class='btn btn-primary' type='button'>+</button>
                    </div>
                </td>
                <td><?= number_format($product["total"], 2, ",", "&nbsp;") ?>&nbsp;€</td>
            </tr>
<?php
            // number_format(variable à modifier, nombre de décimales souhaité, caractère séparateur décimal,caractère séparateur de milliers
            $totalGeneral += $product['total'];
        }
    ?>
            <tr>
                <td coldspan=4>Total général  : </td>
                <td><strong>.<td><?= number_format($totalGeneral, 2, ",", "&nbsp;")?>&nbsp;€</strong></td>
            </tr>
            </tbody>
                </table>
                <a style='text-decoration:none'class='link-light' href='traitement.php?action=deleteAllProduit'>
                <button class='btn btn-danger' type='button'> Supprimer liste</button>
            </a><br>
<?php

            $quantite = 0;
            foreach($_SESSION['products'] as $product ){
                $quantite += $product['qtt'];
            }

            echo "Nombre Produit :<br>";
            echo "<button type='button' class='btn btn-primary position-relative> 
            <span class='position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger'>". $quantite; 
            echo '<span class="visually-hidden">unread messages</span></span></button>';
        }

       

        // Supprimer un produit individuel
       

$title = "Récapitulatif";
$content = ob_get_clean();
require "template.php";
?>