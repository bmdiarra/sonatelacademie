<?php
//session_start();
//session_destroy(); 
if (!isset($_SESSION['role'])) {
    header('location: connexion.php');
    exit;
}

?>

<script type="text/javascript"><!--
$(document).ready(function () {  

  $("a.load")
  .click(function() {
  $("#myid").load(this.href);
    return false;
  });

  $("a.load")
  .each(function(i){
    $(this)
   .href(this.href.replace("mapage", "mapage_fragment"))
  });

});
// --></script>


        
        <div class="arriere-plan">
            <div class="conteneur">
                <div class="entete">
                    <span id="texte">CREER ET PARAMETRER VOS QUIZZ</span>
                    <div class="class-lien-decinnexion">
                        <a href="./pages/deconnexion.php" id="deconnexion">Déconnexion</a>
                    </div>
                </div>
                <div class="petite-section">
                    <div class="info-user">
                        <div class="pp">
                            <img src="<?= "./public/images/".$_SESSION['image'] ?>" alt="" srcset="">
                        </div>
                        <div class="filiale">
                            <p id="prenom"><?= $_SESSION['prenom'] ?></p>
                            <p id="nom"><?= $_SESSION['nom'] ?></p>
                        </div>
                    </div>
                    <div class="list-prop">
                        <ul>
                            <div class="li"><a href="?inscri=2&admin=listequestion" ><li><span class="text">Liste Questions</span><span class="icn"><img src="./public/icones/ic-liste.png" alt="" srcset=""></span></li></a></div>
                            <div class="li"><a href="?inscri=2&admin=inscription" ><li><span class="text">Créer Admin</span><span class="icn"><img src="./public/icones/ic-ajout.png" alt="" srcset=""></span></li></a></div>
                            <div class="li"><a href="?inscri=2&admin=listejoueur" ><li><span class="text">Liste Joueurs</span><span class="icn"><img src="./public/icones/ic-liste.png" alt="" srcset=""></span></li></a></div>
                            <div class="li"><a href="?inscri=2&admin=question" ><li><span class="text">Créer Questions</span><span class="icn"><img src="./public/icones/ic-ajout.png" alt="" srcset=""></span></li></a></div>
                        </ul>
                    </div>
                </div>
                <div class="grande-section" id="myid">
                    <?php 
                        if(isset($_GET['admin'])){
                            if(($_GET['admin']) =="listequestion"){
                                require_once('./pages/listequestion.php');
                            }
                            elseif(($_GET['admin'])=="inscription"){
                                $role = "admin";
                                require_once('./pages/inscription.php');
                            }
                            elseif(($_GET['admin'])=="listejoueur"){
                                
                                require_once('./pages/listejoueur.php');
                            }
                            elseif(($_GET['admin'])=="question"){
                                require_once('./pages/question.php');
                            }
                        }
                    ?>
                </div>
            </div>
        </div>
    

<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<script type='text/javascript'>//<![CDATA[
 $(window).load(function(){
     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
              
             reader.onload = function (e) {
                 $('#blah').attr('src', e.target.result);
             }
              
             reader.readAsDataURL(input.files[0]);
         }
     }
      
     $("#fichier").change(function(){
         readURL(this);
     });
 });//]]> 
  
 </script>