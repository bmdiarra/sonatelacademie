<?php


include("fonction_exo3.php");

function my_trim1($chaine){
    $chaine2;
    for($i=0;$i<my_strlen($chaine)-1;$i++){
        $chaine2[$i]=$chaine[$i+1];
    }
    return $chaine2;
}

function my_trim2($chaine){
    $chaine2;
    for($i=0;$i<my_strlen($chaine)-1;$i++){
        $chaine2[$i]=$chaine[$i];
    }
    return $chaine2;
}

function my_trim($chaine){
    if($chaine[0]==' '){
        $chaine = my_trim1($chaine);
    }
    if($chaine[my_strlen($chaine)-1]==' '){
        $chaine = my_trim2($chaine);
    }
    return $chaine;
}

?>

<?php
        
    $formvalide=false;
    $nombre=0;
    $msg="";
        if(isset($_POST['valider']))
        {
            if(!is_number($_POST['nbrchamps']))
            {
                $msg= "veuillez saisir un nombre";
            }
            else
            {   
                $nombre=$_POST['nbrchamps'];
                $formvalide=true;
            }
        }
?>


<h2>Exercice 3.<br /></h2>
        <br/>
        <p>Exercice 3
Ecrire un programme qui permet de remplir un tableau N de mots. Chaque mot pourra contenir 20 caractères. Le programme affiche les mots du tableau puis détermine et affiche le nombre de mot contenant la lettre « M » (la casse n’est pas tenue en compte). CRÉER VOS PROPRES FONCTIONS</p>
		<br/>

        <form action="index.php?exo=3" method="post">
        <label form="nbrchamps">Donner le nombre de mots ensuite les mots :</label><br>
                <input name="nbrchamps" type="text" value="<?= $nombre ?>"/><br>
                <?php
                    if($formvalide)
                    {
                        for ($i=1; $i <= $nombre; $i++) 
                        { 
                ?>
                    <input type="text" name="mot<?php echo $i;?>"><br>
                <?php  
                        }
                    }
                ?>
                <input type="submit" name="valider" value="valider">
        </form>

        <?php 
        if(isset($_POST['valider']) && isset($_POST['mot1'])){
            for($j=1;$j<$i;$j++){
                $mot = $_POST['mot'.$j];
                if(is_valide($mot) && (count_char_in_string('m',$mot) > 0  || count_char_in_string('M',$mot) > 0) ){
                    echo " ".$mot." ";
                }
            }
            
        }
        
        
        ?>

</div>