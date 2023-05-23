<?php
// appeler le fichier de la connexion bdd
include "db.php";
// variable pour appeler la fonction connexionDB()
$con = connexionDB();

// Vérifier si l'id est fourni dans la requête GET
if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Requête pour récupérer les données de l'utilisateur spécifié par l'id
    $requete = "SELECT * FROM utilisateur WHERE id = $id";
    $response = $con->query($requete);
    $user = $response->fetch(); // Fetch a single row

    // Vérifier si l'utilisateur existe
    if ($user) {
        // Le formulaire a été soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupérer les valeurs soumises
            $nom = $_POST['nom'];
            $prenom = $_POST['prenom'];

            // Mettre à jour les données de l'utilisateur dans la base de données
            $requeteUpdate = "UPDATE utilisateur SET nom = '$nom', prenom = '$prenom' WHERE id = $id";
            $con->exec($requeteUpdate);

            // Rediriger vers la page affiche.php pour afficher la liste mise à jour
            header('Location: affiche.php');
            exit;
        }
    } else {
        // L'utilisateur n'existe pas, gérer cette situation (par exemple, afficher un message d'erreur)
        echo 'Utilisateur non trouvé.';
    }
} else {
    // L'id n'est pas fourni dans la requête GET, gérer cette situation (par exemple, afficher un message d'erreur)
    echo 'ID non fourni.';
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Utilisateur</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
</head>

<body>
    <div>
        <h1 class="text-center mt-4 mb-4">Modifier Utilisateur</h1>
    </div>
    <div class="container">
        <form method="POST">
            <div class="mb-3">
                <label for="nom" class="form-label">Nom</label>
                <input type="text" class="form-control" id="nom" name="nom" value="<?php echo $user['nom']; ?>">
            </div>
            <div class="mb-3">
                <label for="prenom" class="form-label">Prénom</label>
                <input type="text" class="form-control" id="prenom" name="prenom"
                    value="<?php echo $user['prenom']; ?>">
            </div>
            <button type="submit" class="btn btn-primary">Enregistrer</button>
        </form>
    </div>
</body>

</html>