<?php
// appeler le fichier de la connexion ---- appel de PDO.php
// utiliser l'include
include 'db.php';
//variable pour appeler la fonction connexiondb()
$con = connexionDB();
//faire la requète 
//création de la variable requete et on y fait une requete
$requete = 'SELECT * from utilisateur';
//on souhaite avoir la réponse de la requete dans une variable.
//ATTENTION on est pas encore connecté
//on crée la variable "$response" et on se connecte à la BDD en faisant une requete sql sockée dans response
$response = $con->query($requete);
$lignes = $response->fetchAll();

//on récupère toutes les lignes de la requète

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
    <title>Formulaire</title>
</head>
<body>
    <div class='text-center mt-4 mb-4'>
        <div>
            <h1>Utilisateurs de la BDD</h1>
        </div>
        <button class="btn btn-success">Ajouter</button>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">nom</th>
      <th scope="col">prénom</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //boucle for each pour afficher chaque ligne de la requete
    foreach($lignes as $ligne){
        echo '<tr>
        <th scope="row">'.$ligne['id'].'</th>
        <td>'.$ligne['nom'].'</td>
        <td>'.$ligne['prenom'].'</td>
        <td><button class ="btn btn-warning">Modifier</button></td>
        <td><button class ="btn btn-danger">Supprimer</button></td>
      </tr>';
    }

    ?>

    

  </tbody>
</table>




</body>
</html>
