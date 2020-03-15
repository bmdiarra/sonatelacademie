<div style="background-color: #00B7C0; margin: 0% 20% 0% 20%;">
    <?php 
    $couleur = [
                "blue"  => "blue",
                "red"   => "red",
                "yellow"=> "yellow"
            ]
    ?>
    <h1 style="margin: 0px 20% 0px 36%; ">SONATEL ACADEMIE</h1>
    <form method="POST">
        
        <div class="texte" >Taille de la matrice carr�e</div>
        <div class="input"><img src="App1/icone1.png" alt="" id="img1"><input type="text" name="nombre" value="<?php if(isset($_POST['dessiner'])){ echo $_POST['nombre'];} ?>"></div>
        <div class="texte" >Select C1</div>
        <div class="input" >
            <img src="App1/icone2_3.png" alt="" id="img2">
            <select name="c1" id="s1">
             <?php   foreach($couleur as $key => $value){ ?>
                <option value="<?= $value ?>"><?= $key ?></option>
              <?php  }  ?>
                
            </select>
        </div>

        <div class="texte">Select C2</div>
        <div class="input">
            <img src="App1/icone2_3.png" alt="" id="img3">
            <select name="c2" id="s2">
            <?php   foreach($couleur as $key => $value){ ?>
                <option value="<?= $value  ?>"><?= $key ?></option>
              <?php  }  ?>
            </select>
        </div>
        <div class="texte" >Position</div>
        <div class="input">
            <img src="App1/interrogation.png" alt="" id="img4">
            <select name='p' id="s3">
                <img src="" alt="">
                <option value="haut">Haut</option>
                <option value="bas">Bas</option>
            </select>
        </div>
        <div class="bouton">
        <div class="bouton"><input type="reset" name="annuler" value="Annuler">
        <input type="submit" name="dessiner" value="Dessiner"></div>
        </div>
    </form>   
    <div style="heigth: 400px;" style="margin: 0% 20% 0% 20%;">
        <?php
            if (isset($_POST['nombre']) || isset($_POST['c1']) || isset($_POST['c2']) || isset($_POST['p'])) {

                $n=$_POST['nombre'];
                $c1=$_POST['c1'];
                $c2=$_POST['c2'];
                $p=$_POST['p'];

                if (empty($n) || !preg_match('/^[0-9]+$/', $n)) {
                    echo "Entrez une bonne valeur!!";
                }else { ?>
                    <table border="1" align="center" style="margin: auto;" height="500px" width="500px" cellpadding="20" cellspacing="0">
                    <?php 
                        if($p == "haut"){
                            for ($i=0; $i < $n; $i++) { ?>
                                <tr>
                                <?php 
                                 for ($j=0; $j < $n; $j++) {
                                 if ($j <= $i){ ?>
                                    <td bgcolor="<?= $c1 ?>"></td> 
                                 <?php } 
                                 elseif (($j > $i) && ($i + $j != $n-1)){
                                 ?>
                                    <td bgcolor="<?= $c2 ?>"></td> 
                                 <?php } 
                                 elseif($i + $j == $n-1){?>
                                 <td bgcolor="<?= $c1 ?>"></td>
                                 <?php }} 
                                 ?>
                                </tr>
                          <?php }} ?>

                          <?php 
                        if($p == "bas"){
                            for ($i=0; $i < $n; $i++) { ?>
                                <tr>
                                <?php 
                                 for ($j=0; $j < $n; $j++) {
                                 if ($j >= $i){ ?>
                                    <td bgcolor="<?= $c1 ?>"></td> 
                                 <?php } 
                                 elseif (($j < $i) && ($i + $j != $n-1)){
                                 ?>
                                    <td bgcolor="<?= $c2 ?>"></td> 
                                 <?php } 
                                 elseif($i + $j == $n-1){?>
                                 <td bgcolor="<?= $c1 ?>"></td>
                                 <?php }} 
                                 ?>
                                </tr>
                          <?php }} ?>
                          
                    </table>
               <?php } 
            }  
        ?>

    </div>
</div>
    
