<?php
//appeler le fichier de la connexion bdd
//utiliser include
include "db.php";

$con=connexionDB();

//suppression d'un utilisateur
if(isset($_GET['del'])){
  $id = $_GET['del'];
  $delRequest = "DELETE FROM utilisateur WHERE id=?";
  $deleteRequest = $con->prepare($delRequest);
  $deleteRequest->execute(array($id));
  header('location : affiche.php');
}




//faire la requête
//création de la variable requete et on y fait une requete sql
$requete = 'SELECT * from utilisateur';
//on souhaite dans une variable avoir la réponse de la requête
//Attention on est pas encore co à la bdd
//on créé la variable "$response" et on se co à la bdd 
$response = $con->query($requete);
//on récupère toutes les lignes de la requête
$lignes = $response->fetchAll();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulaire</title>
    <!--CSS ONLY-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>
    <div>
        <h1 class="text-center mt-4 mb-4">Utilisateurs de la bdd</h1>
    </div>
    <div class="text-center mt-4 mb-4">
        <a href="add.php"><button class="btn btn-success">Ajouter</button></a>
    </div>
<table class="table">
  <thead>
    <tr>
      <th scope="col">id</th>
      <th scope="col">Nom</th>
      <th scope="col">Prénom</th>
      <th scope="col">Modifier</th>
      <th scope="col">Supprimer</th>
    </tr>
  </thead>
  <tbody>
    <?php
    //boucle "for each pour afficher chaque lignes de la requête
    foreach($lignes as $ligne){
       echo '<tr>
      <th scope="row">'.$ligne['id'].'</th>
      <td>'.$ligne['nom'].'</td>
      <td>'.$ligne['prenom'].'</td>
      <td><a class="btn btn-warning" href="update.php?id='.$ligne['id'].'">Modifier</a></td>
      <td><form method="GET"><button class="btn btn-danger" type="submit" name="del" value='.$ligne['id'].' >Supprimer</button></form></td>
    </tr>';
    }
    
    ?>
  </tbody>
</table>
</body>
</html>
