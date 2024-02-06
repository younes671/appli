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
    <h1>Ajouter produit</h1>
    <form action="traitement.php" method="post">
        <p>
            <label>
                Nom du produit : 
                <input type="text"  name="name">
            </label>
        </p>
        <p>
            <label>
                Prix du produit : 
                <input type="number" step="any" name="price">
            </label>
        </p>
         <p>
            <label>
                Quantité désirée : 
                <input type="number" name="qtt" value="1">
            </label>
        </p>
        <p>
            <input type="submit" name="submit" value="Ajouter le produit">
        </p>
    </form>
  </body>
</html>