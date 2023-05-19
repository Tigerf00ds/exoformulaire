<?php
//appeler le fichier de connexion
include 'db.php';
//on créé la variable de connexion
$con = connexionDB();
if(isset($_POST['nom'],$_POST['prenom'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    //on prépare la requete 
    $requete = $con->prepare('INSERT INTO utilisateur(nom,prenom)Values(?,?)');
    //on exécute la requête
    $requete->execute(array($nom,$prenom));
    //pour revenir sur l'affichage
    header('location: affiche.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action = "add.php" method = "POST">
    <label for="nom">nom utilisateur</label>
    <input type="text" name= "nom">
    <label for="prenom">prénom utilisateur</label>
    <input type="text" name= "prenom">

    <input type = "submit" name="submit"/>
    <a href="affiche.php">Retour</a>
</form>
</body>
</html>