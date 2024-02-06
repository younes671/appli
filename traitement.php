<?php
    session_start();

    // limitation accès à la page

    if(isset($_POST['submit'])){
        // vérification intégrité des valeurs transmises via $_POST avec la fonction filter_inptu()
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_SPECIAL_CHARS); // filter_sanitize.. empeche injection code html
        $price = filter_input(INPUT_POST, "price", FILTER_VALIDATE_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // filter_validate_float => nb à virgule obligatoire, filter_flag_allow... => permet caractère "," ou "."
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // valide que si la saisie est nb entier

        // vérification succès filtre

        if($name && $price && $qtt){
            
            // si valeur positive = donnée ok
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price * $qtt
            ];


            // enregistrer produit dans $_session
            $_SESSION['products'] [] = $product;

        }
       

    }


        header("location:index.php");

?>