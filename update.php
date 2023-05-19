<?php
include "DB.php";
$con = connexionDB();

if(isset($_POST['nom'], $_POST['prenom'], $_POST['id'])){
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $id = $_POST['id'];

    header('location: affiche.php');
    exit();
}
?>