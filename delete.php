<?php
include "DB.php";
$con = connexionDB();

if(isset($_GET['id'])){
    $id = $_GET['id'];
    
    $requete = $con->prepare('DELETE FROM utilisateur WHERE ID = ?');
    $requete->execute(array($id));

    header('location: affiche.php');
    exit();
}

?>