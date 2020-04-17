<?php
session_start();
include_once "./traitement/fonctions.php";
$message="";
    if (isset($_POST['connexion'])) {
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        if (empty($login) || empty($mdp)) {
            $message="Tous les champs sont obligatoires";
        }else {
                if (verif_info_connexion($login, $mdp)) {
                    if ($login=="admin") {
                        $infos_admin[]= recup_info_user($login, $mdp);
                        foreach ($infos_admin as $value) {
                            $_SESSION['prenom']=$value->prenom;
                            $_SESSION['nom']=$value->nom;
                            $_SESSION['image']=$value->image;
                            $_SESSION['role']=$value->role;
                        }
                        header('location:../Quizz/pages/pageadmin.php');
                        
                    }
                    if ($login=="joueur") {
                        $infos_joueur[]= recup_info_user($login, $mdp);
                        foreach ($infos_joueur as $value) {
                            $_SESSION['prenom']=$value->prenom;
                            $_SESSION['nom']=$value->nom;
                            $_SESSION['image']=$value->image;
                            $_SESSION['role']=$value->role;
                        }
                        header('location:../Quizz/pages/joueur.php');
                    }
                }else {
                       $message="Login ou mot de passe Incorrect";
                    }
            }
        }
 //session_destroy();   
?>
<html>
    <head>
        <title>PAGE DE CONNEXION</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="./public/css/connexion.css">
    </head>
    <body>
        <div class="background-green">
            <div class="quizz">
                <a href="#"><img src="./public/images/logo-QuizzSA.png" alt="Erreur"></a>
            </div>
            <h2 id="titre">Le plaisir de jouer</h2>
        </div>
        <div class="arriere-plan">
            <?php require_once('./pages/connexion.php');?>
        </div>
    </body>
</html>