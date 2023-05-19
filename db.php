<?php
    function connexionDB(){
        try{
            $user = "root";
            $pass = "";
            //en utilisant PDO on évite les injections SQL
            $pdo = new PDO('mysql:host=localhost;dbname=formulaire',$user,$pass);
            $pdo ->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
            return $pdo;
        }catch(PDOException $e){
            print "Erreur ! : ".$e->getMessage()."<br/>";
            die();
        }
    }
?>