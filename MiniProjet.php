
    <?php 
        $T =[
            0 => ["bmd","diarra"],
            1 => ["mo","fobs"]
        ];

        $_SESSION['page'] = 0;    
    ?>
    <form method="POST">
    <br/><br/>
    <div class="connec"><label for="username">username</label><input type="text" name="username"></div>
    <div class="connec"><label for="password">password</label><input type="password" name="password"></div>
        <div class="btn"><input style="margin-left: 100px;" type="submit" name="valider" value="connexion"></div>
        <br/>
        <div class="btn"><input style="margin-left: 100px;" type="submit" name="deconnexion" value="deconnexion"></div>
    </form>   
    <div>
        <?php
            if (isset($_POST['valider'])) {

                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    for($i=0;$i<count($T);$i++){
                        if($_POST['username'] == $T[$i][0] && $_POST['password'] == $T[$i][1]){
                            $_SESSION['page'] = 1;
                            header("Location: index.php" );
                        }
                    }
                }
            }

            if (isset($_POST['deconnexion'])) {
                session_destroy();
            }


            /*if (isset($_POST['valider'])) {
                if(!empty($_POST['username']) && !empty($_POST['password'])){
                    
                    if($_POST['username']==$_SESSION['admin'] && $_POST['password']==$_SESSION['password'] ){
                        $_SESSION['page'] = 1;
                        header("Location: index.php" );
                    }else{
                        $_SESSION['page'] = 2;
                        header("Location: index.php" );
                    }
                }
            }  */
        ?>


    </div>
