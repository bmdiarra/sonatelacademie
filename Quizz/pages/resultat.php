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
    
  /*  $file=json_decode(file_get_contents('./data/question.json'));
    $nbrequestion = json_decode(file_get_contents('./data/nbrequestion.json'));

*/


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



/*
                            
    for($i=0;$i<$nbrequestion;$i++){
        for($j=0;$j<count($file[$i]->reponse);$j++){
            if(isset($_POST['radio'.($i*10+$j)]) || isset($_POST['checkbox'.($i*10+$j)])){
            if($_POST['radio'.($i*10+$j)] == "on" || $_POST['checkbox'.($i*10+$j)] == "on"){
               
                $_SESSION['donnee'.($i*10+$j)] = $file[$i]->reponse[$j]->valeur ;
                
            }
            }
            if(isset($_POST['txt'.$i])){
                $_SESSION['donnee'.($i+100)] = $_POST['txt'.$i] ;
                
            }
            
        }
    }*/


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
    ?>

    <div >
    <?php
    for($i=0 ; $i<$nbrequestion ; $i++){
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
                            $_SESSION['trouve'.($i*10+$j)] = 1; 
                            }
                    ?>
                    <h3 style="color:red">X</h3>
                    <?php
                        }
                    ?>

                    <?php 
                        if(isset($_SESSION['donnee'.($i*10+$j)]) && $file[$i]->reponse[$j]->bon_resultat != "on" && $_SESSION['donnee'.($i*10+$j)] == $file[$i]->reponse[$j]->valeur){
                            $_SESSION['trouve'.($i*10+$j)] = 1;
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
                        $_SESSION['trouve'.($i*10+$j)] = 1;
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
                            $_SESSION['trouve'.($i+100)] = 1;
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

   <?php
   $file2=json_decode(file_get_contents('./data/utilisateurs.json'));
   for($i=0; $i<count($file2) ; $i++){
       
       if(isset($file2[$i]) && $_SESSION['prenom'] == $file2[$i]->prenom ){
       // echo $_SESSION['prenom'];   
        //echo $file2[$i]->prenom;
          $cor = $file2[$i]->score;
           if($file2[$i]->score < $scores){
                echo "super3";
                $file2[$i]->score = $scores ;
                $cor = $file2[$i]->score;
           }
       }
   }

?>
   <h1 style="color: green; text-align: center;"> SCORE: <?= $cor." / ".$scoretot ?> </h1>
  <?php 
   $json_data = json_encode($file2);
    file_put_contents('./data/utilisateurs.json', $json_data);
   ?>
    </div>
  