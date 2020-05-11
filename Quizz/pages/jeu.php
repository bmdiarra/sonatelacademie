<style>
.btn_submit{
    background-color: #3addd6;
    color: white;
    height: 40px;
    width: 110px;
    font-size: 20px;
    margin-left: 120px;
}

.btn_quitter{
    background-color: red;
    color: white;
    height: 40px;
    width: 110px;
    font-size: 20px;
    margin-left: 43%;
}
</style>

<div class="ensemblequestion">
                        
                        <?php
                         
                            $questionjoueur=json_decode(file_get_contents('./data/question.json'));

                            $file2=json_decode(file_get_contents('./data/utilisateurs.json'));
                            $nbrequestion = json_decode(file_get_contents('./data/nbrequestion.json'));

                           // $file[] = [];
                            $tableaujoueur[] = [];
                            $k=0;
                            for($j=0 ; $j<count($file2) ; $j++){
                                if($_SESSION['prenom'] == $file2[$j]->prenom){
                                    //$tableaujoueur[] = $file2[$j]->questiontrouve;
                                    $k=$j;
                                }
                            }

                            for($i=0 ; $i<count($questionjoueur) ; $i++){
                                $trouve = 0;
                               for($j=0 ; $j<count($file2[$k]->questiontrouve) ; $j++){
                                   
                                   if($questionjoueur[$i]->id == $file2[$k]->questiontrouve[$j]){  
                                        $trouve = 1;
                                   } 
                               }  
                               if($trouve == 0){
                                  $file[] = $questionjoueur[$i] ;
                               }
                            }

                           /* print_r($file);
                            echo "-------->"; */
                            //print_r($questionjoueur);
                            
                          //  print_r($file[0]);
                            for($i=0;$i<count($file);$i++){
                                for($j=0;$j<count($file[$i]->reponse);$j++){
                                    if(isset($_POST['radio'.($i*10+$j)]) || isset($_POST['checkbox'.($i*10+$j)])){
                                    if(isset($_POST['radio'.($i*10+$j)])){
                                        if($_POST['radio'.($i*10+$j)] == "on"){
                                            $_SESSION['donnee'.($i*10+$j)] = $file[$i]->reponse[$j]->valeur ;
                                        }
                                    }

                                    if(isset($_POST['checkbox'.($i*10+$j)])){

                                        if($_POST['checkbox'.($i*10+$j)] == "on"){
                                            $_SESSION['donnee'.($i*10+$j)] = $file[$i]->reponse[$j]->valeur ;
                                        }
                                    }

                                    }
                                    if(isset($_POST['txt'.$i])){
                                        $_SESSION['donnee'.($i+100)] = $_POST['txt'.$i] ;
                                    }
                                }
                            }

                            define("NOMBREVALEURPARPAGE",1);
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

                                



                            for($i = $indiceDepart ; $i <= $indiceDeFin ; $i++){
                            
                        ?>
                            
                            <form action="index.php?inscri=3&page=<?= ($_GET['page']+1) ?>" method="POST"> 
                            
                            <div class="questionvaleur">
                                <p>question: <?= $file[$i]->id ?>/10</p>
                                <h4><?= $file[$i]->question ?></h4>
                                <h6>nombre de point:<?= $file[$i]->point ?></h6>
                            </div>
                                <?php 
                                    if($file[$i]->type == "choixsimple"){

                                ?>
                            <div class="reponsevaleur">
                                <?php
                                for($j=0 ; $j < count($file[$i]->reponse) ; $j++){
                                 ?>
                                 <input type="radio" name="radio<?= ($i*10+$j) ?>" <?php if(isset($_SESSION['donnee'.($i*10+$j)]) && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur ){ echo "checked";} ?>>
                                <label><?= $file[$i]->reponse[$j]->valeur ?></label><br/>
                                    
                                <?php
                                
                                } 
                                ?>
                            </div>
                        <?php 
                        }
                        if($file[$i]->type == "choixmultiple"){
                        ?>
                            <div class="reponsevaleur">
                            <?php
                                for($j=0 ; $j < count($file[$i]->reponse) ; $j++){
                                 ?>
                                <input type="checkbox" name="checkbox<?= ($i*10+$j) ?>" <?php if(isset($_SESSION['donnee'.($i*10+$j)]) && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur ){ echo "checked";} ?>>
                                <label><?= $file[$i]->reponse[$j]->valeur ?></label><br/>
                                
                                <?php
                                
                                } 
                                ?>
                            </div>
                                        <?php
                        }
                        if($file[$i]->type == "choixtexte"){
                            ?>
                            <input class="inputtextejeu" type="text" name="txt<?= $i ?>" value=<?php if(isset($_SESSION['donnee'.($i+100)])){ echo $_SESSION['donnee'.($i+100)]; } ?>>
                            <?php
                        }

                        } 
                                ?>
                        </div>

                        <div class="ensemblebtn">
                            
                            <div class="btn-pagination">
                                <input type="submit" onclick="this.form.action='index.php?inscri=3&page=<?= ($_GET['page']-1) ?>'" class="btn_submit" name="submitjeu" value="<?php if($_GET['page'] == 1){ echo "inactive";}else{echo "precedent";} ?>" <?php if($_GET['page'] == 1){ echo "disabled";} ?>>
                            </div>
                            
                            <div class="btn-pagination">
                                    <?php
                                        
                                        for($page=1 ; $page <= $nbrePages ; $page++){
                                            if($page==$_GET['page'] && $_GET['page'] < $nbrequestion){
                                            echo '<input type="submit" class="btn_submit" value="suivant" name="submitjeu">';
                                            }
                                            if($page==$_GET['page'] && $_GET['page'] == $nbrequestion){
                                                ?>
                                                <input type="submit" class="btn_submit" name="submitjeu" value="terminer">
                                                <?php
                                            }
                                        } 
                                    ?>
                            </div>

                            <input type="submit" class="btn_quitter" name="quitter" onclick="this.form.action='index.php?inscri=3&page=4'" value="quitter">

                            </form>

                                    <?php //} ?>
                        