
        <h2>
                    Exercice_1.<br />
                    
                </h2>
                <br/>
                <br/>

                <form action="index.php?exo=1" method="POST">
                <label for="val">Entrer un valeur superieur a 10000:</label>
                <input type="text" name="val" value="<?php if(isset($_POST['valider'])){ echo $_POST['val'];} ?>"><br>
                <input style="margin: 0% 0% 0% 13%;" type="submit" value="Valider" name="valider">
    </form>
    <div style="text-align: center;">
        
        <?php
        function est_premier($premier){
            $i = 2;
            while($premier % $i != 0 ){
                $i = $i +1;
            }
            if($i == $premier){
                return 1;
            }else{
                return 0;
            }
        }

        function moyenne( $tab ){
            $somme = 0; $moy; $indice = 0;
            for($i=0 ; $i< count($tab) ; $i++ ){
                $somme = $somme + $tab[$i];
                //$indice = $indice + $i;
            }
            $moy = $somme / $i;
            return $moy;
        }

        if(empty($_POST['val']))
        {
            echo 'Remplissez les parametres du formulaire svp:';
        }else{
                if(isset($_POST['valider'])){
                        
                    $n = $_POST['val'];
                    $premier = array();
                    $k = 0;
                    $T = array("inferieur" => array(),
                            "superieur" => array());
                    
                    if(preg_match("#[0-9]#",$n) && ($n >= 1000))
                    {
                        for($i=2; $i<=$n ; $i++){
                            
                            if( est_premier($i) == 1 ){
                                
                                $premier[$k] = $i ;
                                $k++;
                            }
                        }

                        $moy = moyenne($premier);
                        $l = 0; $m = 0;

                    // print_r($premier);
                        //echo "Moyenne".$moy."<br/>";
                        for($i=0 ; $i < $k; $i++){
                            if( $premier[$i] <= $moy ){
                                $T['inferieur'][$l] = $premier[$i];
                                $l++;
                            }
                            if( $premier[$i] > $moy ){
                                $T['superieur'][$m] = $premier[$i];
                                $m++;
                            }
                        }

                    for($i=0 ; $i < count($T['inferieur']); $i++){
                            echo " ".$T['inferieur'][$i]." ";
                    }

                    echo "<br/>"."<br/>"; 

                    for($i=0 ; $i < count($T['superieur']); $i++){
                        echo " ".$T['superieur'][$i]." ";
                        }



                    }else{
                        
                        echo 'svp saisissez des valeurs numeriques';
                    
                    }

            
                    
                }
            }
        ?>

        </div>
