<?php
session_start();
include_once "./traitement/fonctions.php";
$message="";
$indexQuestion = 0;
                             

    if (isset($_POST['connexion'])) {
        $login=$_POST['login'];
        $mdp=$_POST['mdp'];
        if (empty($login) || empty($mdp)) {
            $message="Tous les champs sont obligatoires";
        }else {
                if (verif_info_connexion($login, $mdp)) {
                    $info_connec[] = recup_info_user($login, $mdp);
                    foreach($info_connec as $value){
                        $_SESSION['prenom']=$value->prenom;
                        $_SESSION['nom']=$value->nom;
                        $_SESSION['image']=$value->image;
                        $_SESSION['role']=$value->role;

                    }
                    if($_SESSION['role'] == "admin"){
                        header('location:?inscri=2&admin=listequestion');
                    }
                    if($_SESSION['role'] == "joueur"){
                        header("location:?inscri=3&page=1");
                    }
                }else {
                       $message="Login ou mot de passe Incorrect";
                    }
            }
        }
        $_SESSION['page']=1;
 //session_destroy();   
?>
<html>
    <head>
        <title>PAGE DE CONNEXION</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="./public/css/connexion.css">
        <link rel="stylesheet" type="text/css" href="./public/css/inscriptionjoueur.css">
        <link rel="stylesheet" type="text/css" href="./public/css/pageadminn.css">
        <!--link rel="stylesheet" href="./public/css/joueur.css"-->
        <link rel="stylesheet" href="./public/css/listejoueur2.css">  
        
    </head>
    <body>
        <div class="background-green">
            <div class="quizz">
                <a href="?inscri=0"><img src="./public/images/logo-QuizzSA.png" alt="Erreur"></a>
            </div>
            <h2 id="titre">Le plaisir de jouer</h2>
        </div>
        <div class="arriere-plan" >
            <div class="dynamic" >
            <?php
            if(isset($_GET['inscri'])){    
                if($_GET['inscri']==0){
                require_once('./pages/connexion.php');
                }elseif($_GET['inscri']==1){
                    $role = "joueur";
                    require_once("./pages/inscription.php");
                }elseif($_GET['inscri']==2){
                    require_once("./pages/pageadmin.php");
                }elseif($_GET['inscri']==3){

                    $_SESSION['donnee']=array();
                    $tab=[];
                    require_once("./pages/joueur.php");
                }

                }else{
                    require_once('./pages/connexion.php');
                } 
            
            ?>
            </div>
        </div>
    </body>
</html>




<?php
require_once("./traitement/fonctions.php");
if(isset($_POST['btn'])){
    //echo is_login_unique($_POST['login']);
    if(is_login_unique($_POST["login"])){
        $file=json_decode(file_get_contents('./data/utilisateurs.json'));
        $extra = array(
            "login" => $_POST['login'],
            "mdp"   => $_POST['password'],
            "role"  => $role,
            "prenom"=> $_POST['prenom'],
            "nom"   => $_POST['nom'],
            "score" => 0,
            "image" => basename($_FILES['fichier']['name'])
        );
        $file[] = $extra ;
        $json_data = json_encode($file);
        
        file_put_contents('./data/utilisateurs.json', $json_data);

        $dossier = './public/images/';
        $fichier = basename($_FILES['fichier']['name']);
        $extensions = array('.png', '.jpg', '.jpeg');
        $extension = strrchr($_FILES['fichier']['name'], '.'); 
        //Début des vérifications de sécurité...
        if(!in_array($extension, $extensions)) //Si l'extension n'est pas dans le tableau
        {
             $erreur = 'Vous devez uploader un fichier de type png, jpg, jpeg';
        }
        if(!isset($erreur)) //S'il n'y a pas d'erreur, on upload
        {
             //On formate le nom du fichier ici...
             $fichier = strtr($fichier, 
                  'ÀÁÂÃÄÅÇÈÉÊËÌÍÎÏÒÓÔÕÖÙÚÛÜÝàáâãäåçèéêëìíîïðòóôõöùúûüýÿ', 
                  'AAAAAACEEEEIIIIOOOOOUUUUYaaaaaaceeeeiiiioooooouuuuyy');
             $fichier = preg_replace('/([^.a-z0-9]+)/i', '-', $fichier);
             if(move_uploaded_file($_FILES['fichier']['tmp_name'], $dossier . $fichier)) //Si la fonction renvoie TRUE, c'est que ça a fonctionné...
             {
                  echo 'Upload effectué avec succès !';
                //  header('location:?incri=0');
             }
             else //Sinon (la fonction renvoie FALSE).
             {
                  echo 'Echec de l\'upload !';
             }
             

        }
        else
        {
             echo $erreur;
        }
        
    }else{
        echo "login deja existant";
        //header("location:inscriptionjoueur.php");
    }
}
?>


