<style rel="stylesheet">
    .body-projet{
        background-image: url('Images/img-bg.jpg');
        height: 800px;
    }

    .form{
        background-color: #ECF0F1;
        position: relative;
        top: 100px;
        margin: 0px 19% 0px 19%;
    }

    .titre-form{
        background-color: #62BAF3;
        height: 80px;
    }

    .input-username{

        background-image: url(Images/ic-login.png);
        background-repeat: no-repeat;
        background-position: 90% 50%;
    }

    .btn-connec{
        float: left;
    }
    
    .btn-deconnec{
        float: left;
    }

</style>

<div class="body-projet">
<link rel="stylesheet" href="styleminiprojet.css">
    <?php 
        /*$T =[
            0 => ["bmd","diarra"],
            1 => ["mo","fobs"]
        ];*/
        
        $data = file_get_contents('admin.json');
        $T = json_decode($data);
        echo $T->{'admin'}[0]->{'user'};
        $_SESSION['page'] = 0;    
    ?>
    <div class="form">
    <div class="titre-form">
    </div>
    <form method="POST">
    <br/><br/>
    <div class="connec"><input class="input-username" type="text" name="username" placeholder="Login"></div>
    <div class="connec"><input type="password" name="password" placeholder="Password"></div>
        <div class="btn">
        <input class="btn-connec" type="submit" name="valider" value="connexion">
        <a href='Page-inscription.php'> Inscrivez vous </a>
        </div>
    </form>
    </div>   
    <div>
        <?php
            
            if (isset($_POST['valider'])) {
                 
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    for($i=0;$i<count($T->{'admin'});$i++){
                        if($_POST['username'] == $T->{'admin'}[$i]->{'user'} && $_POST['password'] == $T->{'admin'}[$i]->{'password'}){
                            $_SESSION['page'] = 1;
                            $_SESSION['nom']={'admin'}[$i]->{'user'};
                            header("Location: index.php" );
                        }

                        if($_POST['username'] == $T->{'joueur'}[$i]->{'user'} && $_POST['password'] == $T->{'joueur'}[$i]->{'password'}){
                            $_SESSION['page'] = 2;
                            $_SESSION['nom']={'joueur'}[$i]->{'user'};
                            header("Location: index.php" );
                        }
                    }
                }
            }
            
            /*if (isset($_POST['valider'])) {

                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    for($i=0;$i<count($T);$i++){
                        if($_POST['username'] == $T[$i][0] && $_POST['password'] == $T[$i][1]){
                            $_SESSION['page'] = 1;
                            header("Location: index.php" );
                        }
                    }
                }
            }*/

            if (isset($_POST['inscrire'])) {
                session_destroy();
            }


            
        ?>


    </div>
</div>