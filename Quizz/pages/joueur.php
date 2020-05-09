<?php
//session_start();
//session_destroy();   
if (!isset($_SESSION['role'])) {
    header('location: connexion.php');
    exit;
}

if(isset($_POST['precedent']) || isset($_POST['suivant'])){ 
    if(isset($_POST['suivant'])){
         $indexQuestion = $_GET['page']+1 ;
         var_dump($indexQuestion);
     }
     if(isset($_POST['precedent'])){
        $indexQuestion = $_GET['page']-1 ;
        var_dump($indexQuestion);
     }
 }
?>
<link rel="stylesheet" href="./public/css/joueu.css">

        <div class="arriere-plan">
            <div class="conteneur">
                <div class="entete">
                    <div class="image">
                        <div class="pp"><img src="<?= "./public/images/".$_SESSION['image'] ?>" alt="" srcset=""></div>
                        <span id="prenom"><?= $_SESSION['prenom'] ?></span>
                        <span id="nom"><?= $_SESSION['nom'] ?></span>
                        <span id="score"><?= $_SESSION['score'] ?></span>
                    </div>
                    <div class="text">
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ<br></span>
                        <span>JOUER ET TESTER VOTRE NIVEAU DE CULTURE GENERAL</span> 
                    </div>
                    <div class="class-deconnexion">
                        <a href="./pages/deconnexion.php" id="deconnexion">Déconnexion</a>
                    </div>
                </div>
                <div class="conteneur-body">
                    <div class="question">
                    
                        <?php
                            if($_GET['page'] == 1){
                                require_once("jeu.php");
                            }
                            if($_GET['page'] == 2){
                                require_once("jeu.php");
                            }
                            if($_GET['page'] == 3){
                                require_once("jeu.php");
                            }
                            if($_GET['page'] == 4){
                                require_once("resultat.php");
                            }

                        ?>
                        
                        </div>

                        
                    </div>

                    <div class="score">
                                <div class="nomjoueur">
                                    <!--<div class="nom">Nom</div>-->
                                    <div class="list-nom"><strong>Nom</strong></p></div>
                                </div>
                                <div class="nomjoueur">
                                    <!--<div class="nom">Nom</div>-->
                                    <div class="list-nom"><strong>Prenom</strong></p></div>
                                </div>
                                <div class="nomjoueur">
                                    <!--<div class="nom">Nom</div>-->
                                    <div class="list-nom"><strong>Score</strong></p></div>
                                </div>
                        <?php
                            $file=json_decode(file_get_contents('./data/utilisateurs.json'));
                            $tab = [];
                            $taille = count($file);
                            for($j=0 ; $j < $taille ;$j++){
                                $tab[] = $file[$j]->score ;
                            }
                            array_multisort($tab, SORT_DESC, $file);
                            
                            for($i = 0 ; $i <= 5 ; $i++ ){
                            //foreach ($file as $value) {
                                if($file[$i]->role != "admin"){
                            ?>      
                                <div class="nomjoueur">
                                    <!--<div class="nom">Nom</div>-->
                                    <div class="list-nom"><p><?= $file[$i]->nom ?></p></div>
                                </div>
                                <div class="nomjoueur">
                                <!-- <div class="nom">Prénoms</div>-->
                                    <div class="list-nom"><p><?= $file[$i]->prenom ?></p></div>
                                </div>
                                <div class="nomjoueur">
                                <!-- <div class="nom">Score</div>-->
                                    <div class="list-nom"><p style="border-bottom: 2px solid red;"><?= $file[$i]->score ?></p></div>
                                </div>
                                <?php  } 
                            
                                    //echo $tab[$i]." ";
                        }?>
                    </div>

                    
                </div>
            </div>
        </div>
    