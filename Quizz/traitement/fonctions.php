<?php
    //FONCTION POUR VERIFIER LES INFORMATIONS DE CONNEXION
function verif_info_connexion($loginform,$mdpform){
    $file=json_decode(file_get_contents('./data/utilisateurs.json'));
    foreach ($file as $value) {
        $log=$value->login;
        $pass=$value->mdp;
        $rol=$value->role;
        if ($log==$loginform && $pass==$mdpform) {
            return true;
        }
    }
    return false;
}

function is_login_unique($loginform){
    $file=json_decode(file_get_contents('./data/utilisateurs.json'));
    foreach ($file as $value) {
        $log=$value->login;
        if ($log==$loginform) {
            return false;
        }
    }
    return true;
}
    //FONCTION POUR VERIFIER LES INFORMATIONS DE CONNEXION
function recup_info_user($loginform,$mdpform){
     $file=json_decode(file_get_contents('./data/utilisateurs.json'));
    foreach ($file as $value) {
        $log=$value->login;
        $pass=$value->mdp;
        $rol=$value->role;
        if ($log==$loginform && $pass==$mdpform) {
            return $value;
        }
    }
}
function connexion($login,$pwd){
    $utilisateurs=getData();
    foreach ($utilisateurs as $user) {
        if ($user["login"]===$login && $user["mdp"]===$pwd)  {
            $_SESSION['user']=$user;
            $_SESSION['statut']="login";
            if ($user["role"]==="admin") {
                return "accueil";
            }else {
                return "jeux";
            }
        }
    }
    return "erreur";
}

function deconnexion(){
    unset($_SESSION['user']);
    unset($_SESSION['statut']);
    session_destroy();

}

function is_connect(){
    if (!isset($_SESSION['statut'])) {
        header("location:index.php");
    }
}

function getData($file="utilisateurs"){
    $data=file_get_contents("../data/".$file.".json");
    $data=json_decode($data,true);
    return $data;
}

function listeJoueur($role="joueur"){
    $file=json_decode(file_get_contents('./data/utilisateurs.json'));
    foreach ($file as $value) {
        $log=$value->login;
    }
    
}
?>