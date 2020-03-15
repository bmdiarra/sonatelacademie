
        <h2>
			Exercice_4.<br />
			
		</h2>
		<br/>
		<br/>

        <form action="index.php?exo=4" method="post">
        <p>Entrer des phrases se terminant par des points.</p>
        <textarea type="textarea" name="text"  rows="10" cols="100" value=""><?php if(isset($_POST['valider'])){ echo $_POST['text'];} ?></textarea><br/>
        <input type="submit" name="valider" value="Valider"> 
        </form>

<?php


if(isset($_POST['valider'])){
    $phrases = preg_split("#[.!?]#",$_POST['text']);
    

    $T=[];

    for($i =0; $i < count($phrases) ; $i++){
        if(preg_match("#^[A-Z]#", $phrases[$i]) && preg_replace("#\s\s+#",' ', $phrases) && count($phrases)<200){
            $T = $phrases;

        }
    }

    for($i=0;$i<count($T);$i++){
        echo "<br/>"."Phrase valide => ".$T[$i];
    }
    
}
?>

</div>