
        <h2>Exercice 4.<br /></h2>
        <br/>
        <p>Exercice 4
Ecrire un programme qui permet de remplir un tableau N de phrases. Chaque phrase pourra contenir 200 caractères. Le programme enlève tous les espaces inutiles puis réaffiche les phrases corrigées dans un autre textArea. CRÉER VOS PROPRES FONCTIONS
NB: 
●Une phrase commence par lettre majuscule et se termine par un point.
●Les phrases sont saisies dans un textArea</p>
		<br/>

        <form action="index.php?exo=4" method="post">
        <p>Entrer des phrases se terminant par des points.</p>
        <textarea type="textarea" name="text"  rows="10" cols="100" value=""><?php if(isset($_POST['valider'])){ echo $_POST['text'];} ?></textarea><br/>
        <input type="submit" name="valider" value="Valider"> 
        </form>

<?php

function decouperphrase($phrases){
    return (preg_split("#[.!?]#",$phrase));
}

function commencemaj($phrase){
    return (preg_match("#^[A-Z]#", $phrase));
}

function eliminespace($phrase){
    return (preg_replace("#\s\s+#",' ', $phrase));
}

if(isset($_POST['valider'])){
    $phrases = decouperphrase($_POST['text']);
    

    $T=[];

    for($i =0; $i < count($phrases) ; $i++){
        if(commencemaj($phrases[$i]) && eliminespace($phrases[$i]) && count($phrases[$i])<200){
            $T = $phrases;

        }
    }

    for($i=0;$i<count($T);$i++){
        echo "<br/>"."Phrase valide => ".$T[$i];
    }
    
}
?>

</div>