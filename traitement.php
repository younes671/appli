<?php
    session_start();

    // limitation accès à la page

   function addProduit(){
    if(isset($_POST['submit'])){
        // vérification intégrité des valeurs transmises via $_POST avec la fonction filter_inptu()
        $name = filter_input(INPUT_POST, "name", FILTER_SANITIZE_FULL_SPECIAL_CHARS); // filter_sanitize.. empeche injection code html
        $price = filter_input(INPUT_POST, "price", FILTER_SANITIZE_NUMBER_FLOAT, FILTER_FLAG_ALLOW_FRACTION); // filter_validate_float => nb à virgule obligatoire, filter_flag_allow... => permet caractère "," ou "."
        $qtt = filter_input(INPUT_POST, "qtt", FILTER_VALIDATE_INT); // valide que si la saisie est nb entier
        $message = "";
    
        // vérification succès filtre
        
        if($name && $price && $qtt){
            
            // si valeur positive = donnée ok
            $product = [
                "name" => $name,
                "price" => $price,
                "qtt" => $qtt,
                "total" => $price * $qtt,
                "message" => $message
            ];
            
            // enregistrer produit dans $_session
            $_SESSION['products'] [] = $product;
        }
    }
   }

     // Supprimer tous les produits
     function suppAllProduit() {
        unset($_SESSION['products']);
        return !isset($_SESSION['products']); // Retourne true si la suppression est réussie
    }

    function suppProduit() {
        $indexProduit = filter_input(INPUT_GET, "indexProduit", FILTER_SANITIZE_NUMBER_INT);

        unset($_SESSION['products'][$indexProduit]);
        
        return !isset($_SESSION['products'][$indexProduit]); // Retourne true si la suppression est réussie
    }
        
    function changeQtt(bool $isUp) {
        $indexProduit = filter_input(INPUT_GET, "indexProduit", FILTER_SANITIZE_NUMBER_INT);

        $newProductQtt = $_SESSION['products'][$indexProduit]['qtt'];
        $newProductQtt = $isUp ? $newProductQtt + 1 : $newProductQtt - 1;

        if($newProductQtt <= 0){
            $newProductQtt = 1;
        }

        $_SESSION['products'][$indexProduit]['qtt'] = $newProductQtt;

        $productPrice = $_SESSION['products'][$indexProduit]['price'];

        $_SESSION['products'][$indexProduit]['total'] = $newProductQtt * $productPrice;

        var_dump($newProductQtt);
        return $newProductQtt;
    }


    

    if(isset($_GET['action'])){
        switch($_GET['action']){
               
                case "addProduit" : 
                    addProduit();
                break;

                case "deleteAllProduit" : 
                    suppAllProduit();
                break;

                case "deleteProduit" : 
                    suppProduit();
                break;

                case "up-qtt" : 
                    changeQtt(1);
                break;

                case "down-qtt" : 
                    changeQtt(0);
                break;
        }
        
        header("location:recap.php");
    } else {

        header("location:index.php");
    }




?>