<style >
 label{
     margin-top: 20px;
     margin-left: 20px;
 } 

input{
    margin-top: 22px;
    margin-left: -40px;
}

.labtxt{
    margin-left: 10px;
}
</style>


<div >

    <?php 
    
    $file=json_decode(file_get_contents('./data/question.json'));
                            
    for($i=0;$i<4;$i++){
        for($j=0;$j<4;$j++){
            if(isset($_POST['radio'.($i*10+$j)]) || isset($_POST['checkbox'.($i*10+$j)])){
            if($_POST['radio'.($i*10+$j)] == "on" || $_POST['checkbox'.($i*10+$j)] == "on"){
               
                $_SESSION['donnee'.($i*10+$j)] = $file[$i]->reponse[$j]->valeur ;
                
            }
            }
            if(isset($_POST['txt'.$i])){
                $_SESSION['donnee'.($i+100)] = $_POST['txt'.$i] ;
                
            }
            
        }
    }
    ?>

    <div >
    <?php
    for($i=0 ; $i<count($file) ; $i++){
    ?>
        <div>
        <h4><?= ($i+1)." . ".$file[$i]->question ?> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <?= " Score: ".$file[$i]->point ?></h4>
        
        <?php
            for($j=0 ; $j<count($file[$i]->reponse) ; $j++){
                if($file[$i]->type == "choixsimple"){
                    ?>
                    <div style="display:flex">
                    <?php 
                        if( $file[$i]->reponse[$j]->bon_resultat == "on" && !empty($_SESSION['donnee'.($i*10+$j)]) ){
                    ?>
                    <h3 style="color:green">V</h3>
                    <?php
                        }
                    ?>

                    <?php 
                        if( $file[$i]->reponse[$j]->bon_resultat == "on" && empty($_SESSION['donnee'.($i*10+$j)]) ){
                            if(isset($_SESSION['trouve'.($i*10+$j)])){
                            $_SESSION['trouve'.($i*10+$j)] == 1; 
                            }
                    ?>
                    <h3 style="color:red">X</h3>
                    <?php
                        }
                    ?>

                    <?php 
                        if(isset($_SESSION['donnee'.($i*10+$j)]) && $file[$i]->reponse[$j]->bon_resultat != "on" && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur){
                            $_SESSION['trouve'.($i*10+$j)] == 1;
                    ?>
                    <h3 style="color:red">X</h3>
                    <?php
                        }
                    ?>
                    <input type="radio" name="" <?php if(isset($_SESSION['donnee'.($i*10+$j)]) && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur ){ echo "checked";}?>>
                    <label><?= $file[$i]->reponse[$j]->valeur ?></label><br/>
                    </div>
                    <?php
                }

                if($file[$i]->type == "choixmultiple"){
                    ?>
                    <div style="display:flex">
                    <?php 
                        if( ($file[$i]->reponse[$j]->bon_resultat == "on" && !empty($_SESSION['donnee'.($i*10+$j)]) && $file[$i]->reponse[$j]->valeur == $_SESSION['donnee'.($i*10+$j)]) || ($file[$i]->reponse[$j]->bon_resultat != "on" && empty($_SESSION['donnee'.($i*10+$j)]))){
                            
                    ?>
                    <h3 style="color:green">V</h3>
                    <?php
                        }else
                
                     {
                         if(isset($_SESSION['trouve'.($i*10+$j)])){
                        $_SESSION['trouve'.($i*10+$j)] == 1;
                         }
                    ?>
                    <h3 style="color:red">X</h3>
                    <?php
                        }
                    ?>

                    <input type="checkbox" name="" <?php if(isset($_SESSION['donnee'.($i*10+$j)]) && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur){ echo "checked";} ?> >
                    <label><?= $file[$i]->reponse[$j]->valeur ?></label><br/>
                    </div>
                    <?php
                }

                if($file[$i]->type == "choixtexte"){
                    ?>
                    <div style="display:flex">
                    <?php 
                        if(isset($_SESSION['donnee'.($i+100)]) && $_SESSION['donnee'.($i+100)] == $file[$i]->reponse[0]->valeur){
                    ?>
                    <h3 style="color:green">V</h3>
                    <label><?= $file[$i]->reponse[0]->valeur ?></label><br/>
                    <?php
                        }
                    ?>
                    <?php 
                        if(isset($_SESSION['donnee'.($i+100)]) &&  $_SESSION['donnee'.($i+100)] != $file[$i]->reponse[0]->valeur){
                            //$_SESSION['trouve'.($i+100)] == 1;
                    ?>
                    <h3 style="color:red">X</h3>
                    <label class="labtxt"><?= $_SESSION['donnee'.($i+100)] ?></label><br/>
                    <p>&nbsp;&nbsp;&nbsp;&nbsp;--------->&nbsp;&nbsp;&nbsp;&nbsp;</p>
                    <h3 style="color:green">V</h3>
                    <label class="labtxt"><?= $file[$i]->reponse[0]->valeur ?></label><br/>
                    <?php
                        }
                    ?>
                    </div>
                    <?php
                }

            }
        ?>
        </div>
    <?php 
    } 
    ?>

    <?php
    $scores = 0;
    $false = 0;
    $scoretot = 0;
    $file2=json_decode(file_get_contents('./data/utilisateurs.json'));
    
        for($i=0;$i<4;$i++){
            if(isset($file[$i])){
            $scoretot = $scoretot + $file[$i]->point ;
            }
            if((isset($file[$i]) && $file[$i]->type == "choixsimple") || (isset($file[$i]) && $file[$i]->type == "choixmultiple")){
                for($j=0;$j<4;$j++){
                        if(isset($_SESSION['trouve'.($i*10+$j)]) && $_SESSION['trouve'.($i*10+$j)] == 1){
                            $false = 1;
                        }
                    
                }
                if($false != 1){
                    $scores = $scores +  $file[$i]->point ;
                    for($k=0 ; $k<count($file2) ; $k++){
                        if(isset($file2[$i]) && $_SESSION['prenom'] == $file2[$k]->prenom ){
                            $file2[$k]->questiontrouve[] = $file[$i]->id;

                            $json_data = json_encode($file2);
                            file_put_contents('./data/utilisateurs.json', $json_data);
                        }
                    }

                }
            }
            
            if(isset($file[$i]) && $file[$i]->type == "choixtexte"){
                
                if(isset($_SESSION['donnee'.($i+100)]) && $_SESSION['donnee'.($i+100)] == $file[$i]->reponse[0]->valeur){
                    
                    $scores = $scores +  $file[$i]->point ;
                    
                    for($k=0 ; $k<count($file2) ; $k++){
                        if(isset($file2[$i]) && $_SESSION['prenom'] == $file2[$k]->prenom ){
                            $file2[$k]->questiontrouve[] = $file[$i]->id;

                            $json_data = json_encode($file2);
                            file_put_contents('./data/utilisateurs.json', $json_data);
                        }
                    }
                    
                }
            }
        }


    ?>

   <h1 style="color: green; text-align: center;"> SCORE: <?= $scores." / ".$scoretot ?> </h1>

   <?php
   //$file2=json_decode(file_get_contents('./data/utilisateurs.json'));
   for($i=0; $i<count($file2) ; $i++){
       if(isset($file2[$i]) && $_SESSION['prenom'] == $file2[$i]->prenom ){
           if($file2[$i]->score < $scores){
                $file2[$i]->score = $scores ;
           }
       }
   }
   
   $json_data = json_encode($file2);
    file_put_contents('./data/utilisateurs.json', $json_data);
   ?>
    </div>
  