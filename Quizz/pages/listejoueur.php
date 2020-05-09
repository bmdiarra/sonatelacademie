<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/listejoueur.css">
    <title>Liste des Joueurs</title>
</head>
<body>
    <h2 class="h2">LISTE DES JOUEURS PAR SCORE</h2>
    <div class="conteneur-joueur">

    <div class="nomjoueur">
            <div class="nom">Prenoms</div>
        </div>
        <div class="nomjoueur">
           <div class="nom">Nom</div>
        </div>
        <div class="nomjoueur">
           <div class="nom">Score</div>
        </div>
    <?php 
    $file=json_decode(file_get_contents('./data/utilisateurs.json'));
    $tab = [];
    $taille = count($file);
    for($j=0 ; $j < $taille ;$j++){
        $tab[] = $file[$j]->score ;
        
    }
    array_multisort($tab, SORT_DESC, $file);
                            
    define("NOMBREVALEURPARPAGE",7);
    $totalevaleur = count($file);
    $nbrePages = ceil($totalevaleur/NOMBREVALEURPARPAGE);


    if(isset($_GET['page'])){
        $pageActuelle = $_GET['page'];
        if($pageActuelle > $nbrePages){
            $pageActuelle = $nbrePages;
        }
    }else{
        $pageActuelle = 1;
    }

    $indiceDepart = ($pageActuelle - 1) * NOMBREVALEURPARPAGE ;
    $indiceDeFin  = $indiceDepart + NOMBREVALEURPARPAGE - 1 ;

    //$j = 7 * $nbrePages ;
    //$k = $j - $taille ;

    for($i = $indiceDepart ; $i <= $indiceDeFin ; $i++ ){
    //foreach ($file as $value) {
        if(isset($file[$i]->role)){
        if($file[$i]->role != "admin" && isset($file[$i])){
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
            <div class="list-nom"><p><?= $file[$i]->score ?></p></div>
        </div>
        <?php } 
        
    
        }
            //echo $tab[$i]." ";
        }
        
      /*  for($page=1 ; $page <= $nbrePages ; $page++){
            echo '<a href="index.php?inscri=2&admin=listejoueur&page='.$page.'">['.$page.']</a>';
        }
    */
        
        ?> 

    </div>
    
    
    <div class="suivant">
    <?php  if($_SESSION['page'] <= $nbrePages){ ?>
        <div class="link-suivant"><a href="index.php?inscri=2&admin=listejoueur&page=<?php echo $_SESSION['page']+1; ?>">Suivant</a></div>
    <?php $_SESSION['page']=$_SESSION['page']+1; } ?>
    </div>
</body>
</html>


