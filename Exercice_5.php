
        <h2>
			Exercice_5.<br />
			
		</h2>
		<br/>
		<br/>

        <form action="index.php?exo=5" method="post">
        <p>Entrer des numeros de telephones.</p>
        <textarea type="textarea" name="numero"  rows="10" cols="100" value=""><?php if(isset($_POST['valider'])){ echo $_POST['numero'];} ?></textarea><br/>
        <input type="submit" name="valider" value="Valider"> 
        </form>

<?php


if(isset($_POST['valider'])){
    $num = explode(" ",$_POST['numero']);
    $k=0; $l=0; $m=0; $n=0; $o=0;
    $T = array(
                "orange" => array(),
                "free" => array(),
                "expresso" => array(),
                "promobile" => array(),
                "invalid" => array()
    );

    for($i=0;$i<count($num);$i++){

        if(preg_match("#^77[0-9]{7}#" , $num[$i]) || preg_match("#^78[0-9]{7}#" , $num[$i])){
            $T["orange"][$k] = $num[$i];
            $k++;
        }elseif(preg_match("#^76[0-9]{7}#" , $num[$i])){
            $T["free"][$l] = $num[$i];
            $l++;
        }elseif(preg_match("#^70[0-9]{7}#" , $num[$i])){
            $T["expresso"][$m] = $num[$i];
            $m++;
        }elseif(preg_match("#^75[0-9]{7}#" , $num[$i])){
            $T["promobile"][$n] = $num[$i];
            $n++;
        }else{
            $T["invalid"][$o] = $num[$i];
            $o++;
        }

    }

    var_dump($T["orange"]);
    echo "<br/>";
    var_dump($T["free"]);
    echo "<br/>";
    var_dump($T["expresso"]);
    echo "<br/>";
    var_dump($T["promobile"]);
    echo "<br/>";
    var_dump($T["invalid"])."<br/> ";
}
?>

</div>