
            <div class="conteneur conteneur-connexion">
                <div class="entete-form">
                    <span id="login-form">Login Form</span>
                </div>
                <form action="" method="post">
                    <div class="input">
                        <span id="message" style="color:red"><?= isset($message) ? $message : '' ?></span>
                        <input type="text" name="login" id="inputlogin" placeholder="Login">
                        <span class="icone-input"><img src="../public/icones/ic-login.png" alt="" srcset=""></span>
                    </div>
                    <div class="input">
                        <input type="password" name="mdp" id="inputpsswd" placeholder="Password">
                        <span class="icone-input"><img src="../public/icones/ic-password.png" alt="" srcset=""></span>
                    </div>
                    <div class="submit">
                        <input type="submit" name="connexion" value="Connexion" id="sub">
                        <span class="lien-insc"><a href="?inscri=1">S'inscrire pour jouer ?</a></span>
                    </div>
                </form>
            </div>
        