<?php
include "DB.php";
$con = connexionDB();

if(isset($_GET['id'])){
    $id = $_GET['id'];

    $requete = $con->prepare('SELECT * FROM utilisateur WHERE ID = ?');
    $requete->execute([$id]);
    $user = $requete->fetch();

    if(!$user){

        header('location: affiche.php');
        exit();
    }
}

if(isset($_POST['submit'])){

    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];

    $requete = $con->prepare('UPDATE utilisateur SET nom = ?, prenom = ? WHERE ID = ?');
    $requete->execute([$nom, $prenom, $id]);

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
    <title>Modifier l'utilisateur</title>
</head>
<body>
    <h1>Modifier l'utilisateur</h1>

    <form action="edit.php?id=<?php echo $id; ?>" method="POST">
        <div>
            <label for="nom">Nom</label><br>
            <input type="text" name="nom" id="nom" value="<?php echo $user['nom']; ?>">
        </div>
        <div>
            <label for="prenom">Prenom</label><br>
            <input type="text" name="prenom" id="prenom" value="<?php echo $user['prenom']; ?>">
        </div>
        <div>
            <input type="submit" name="submit" value="Modifier">
            <a href="affiche.php">Retour</a>
        </div>
    </form>
</body>
</html>