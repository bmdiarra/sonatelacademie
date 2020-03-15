<?php 
$tabAdmin=array("user"=>array("Mass","Moussa","Samba"),
            "mdp"=>array(1234,5678,891011));
if (isset($_POST['user']) && isset($_POST['mdp'])) {
    if (preg_match('/^[a-zA-Z,0-9]/',$_POST['user']) || preg_match('/^[a-zA-Z,0-9]/',$_POST['mdp'])) {
        session_start();
        $_SESSION['user']=$_POST['user'];
           if ($_SESSION['user']== $tabAdmin['user'][$i]){
            header('location:question.php');
           }else {
            header('location:admin.php');
           }
}
}
?>
<html>
    <head>
        <title>PAGE ADMIN</title>
        <meta charset=utf-8>
        <link rel="stylesheet" type="text/css" href="admin.css">
    </head>
    <body>
        <div class="body">
            <h1>Se connecter en Admin</h1>
            <div class="transparent">
            <form action="" method="POST">
                <div class="conteneur">
                    <div class="input">
                        <img src="App2/icone-user.png" alt="" id="img1">
                        <input type="text" name="user" placeholder="Utilisateur">
                    </div>
                    <div class="input">
                        <img src="App2/icone-password.png" alt="" id="img2">  
                        <input type="text" name="mdp" placeholder="Mot de passe">
                    </div>
                    <div class="submit">
                        <input type="submit" value="Connexion" id="sub">
                    </div>
                </div>
                </form>
            </div>
        </div>
    </body>
</html>