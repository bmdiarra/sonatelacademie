<?php
//session_start();
$C = $_SESSION['c'];

?>

        <h2>Exercice_2.<br /></h2>
        <br/>
        <p>Ecrire un programme qui permet de Créer un tableau Contenant les noms et les numéros des 12 mois de l'année en Français et en Anglais. Ensuite demander à l’utilisateur de choisir une langue puis vous affichez les mois sous forme de tableau HTML.</p>
		<br/>

<?php  ?>
   
<form action="index.php?exo=2" method="post">
<input type="submit" value="Changer Langue" name="valider" >

</form>

<br/><br/>

<?php
if(isset($_POST['valider'])){


$T = array(
            "numero" => array(1 , 2 , 3 , 4 , 5 , 6 , 7 , 8 , 9 , 10 , 11 , 12),
            "moisF"  => array("Janvier","Fevrier","Mars","Avril","Mai","Juin","Juillet","Aout","Septembre","Octobre","Novembre","Decembre"),
            "moisA"  => array("January","February","March","April","May","June","July","August","September","October","November","December")
);

function moisF($T){
    echo "<table style=\"border: 1px solid; width: 300px; height: 100px;\" >";
    $k=0;
    for($i=0; $i<4 ; $i++){
        echo "<tr>";
        for($j=0;$j<3;$j++){
            echo "<td style=\"border: 1px solid;\">".$T["numero"][$i+$j+$k]."</td><td style=\"border: 1px solid;\"> ".$T["moisF"][$i+$j+$k]."</td>";
        }
        echo "</tr>";
        $k = $k + 2;
    }
    $_SESSION['c'] = 1;
    
    echo "</table>";
    
}

function moisA($T){
    
    echo "<table style=\"border: 1px solid; width: 300px; height: 100px;\" >";
    $k=0;
    for($i=0; $i<4 ; $i++){
        echo "<tr>";
        for($j=0;$j<3;$j++){
            echo "<td style=\"border: 1px solid;\">".$T["numero"][$i+$j+$k]."</td><td style=\"border: 1px solid;\"> ".$T["moisA"][$i+$j+$k]."</td>";
        }
        echo "</tr>";
        $k = $k + 2;
    }
    $_SESSION['c'] = 2;
    
    echo "</table>";
    
}

//moisF($T);

$_SESSION['c'] = 1;

    if($C == 1){
        moisA($T);
        
    }
    if($C == 2){
        moisF($T);
        
    }
}


?>

</div>