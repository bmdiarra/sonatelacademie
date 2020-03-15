
        <h2>
			Exercice_3.<br />
			
		</h2>
		<br/>
		<br/>

        <form action="index.php?exo=3" method="post">
        <p>Entrer des mots separer par des espaces</p>
        <textarea type="textarea" name="text"  rows="10" cols="100"><?php if(isset($_POST['valider'])){ echo $_POST['text'];} ?></textarea><br/>
        <input type="submit" name="valider" value="Valider"> 
        </form>

<?php
if(isset($_POST['valider'])){
    $k = 0;
    
    $mots = preg_split("#\s#", $_POST['text']);
    
    
    for($i=0;$i<count($mots);$i++){
        if(preg_match("#[^a-z^A-Z]#",$mots[$i])){
            echo "Sa mot Baxool";
        }else{
            if(preg_match('#[m|M]#', $mots[$i])){
                echo $i."=>".$mots[$i];
            }
        }
    }
}
?>

</div>