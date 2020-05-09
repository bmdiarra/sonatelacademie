<?php
if(isset($_POST['nbrequestion']) && $_POST['nbrequestion'] >= 5 ){

    $json_data = json_encode($_POST['nbrequestion']);
    file_put_contents('./data/nbrequestion.json', $json_data);
}

$nbrequestion = json_decode(file_get_contents('./data/nbrequestion.json'));
?>

<link rel="stylesheet" href="./public/css/listequestion.css">
    <form id="add_name" action="" method="post" enctype="multipart/form-data">
        <div class="form-control">
            <label class="text-nbr" for="">Nbre de question/jeu</label>
            <input class="input-nbr" type="text" error="error-1" value="<?= $nbrequestion  ?>" name="nbrequestion" id="">
            <input type="submit" id="submit" name="submit" class="btn-ok" value="OK">
            <div class="error-form" id="error-1"></div>
        </div>
    </form>
    <div class="conteneur-question">
        <?php
            $file=json_decode(file_get_contents('./data/question.json'));
            for($i=0 ; $i<count($file) ; $i++){
                if($file[$i]->type == "choixtexte"){
                    ?>
                        <div class="reponse">
                        <h3 class="question"><?= ($i+1).".".$file[$i]->question ?></h3>
                        <input class="label" type="text" disabled="disabled" value="<?= $file[$i]->reponse[0]->valeur ?>">
                        <!--<label class="txt"><strong><?= $file[$i]->reponse[0]->valeur ?></strong></label>-->
                        </div>
                    <?php
                }
                if($file[$i]->type == "choixsimple"){
                    ?>
                        <div class="reponse">
                        <h3 class="question"><?= ($i+1).".".$file[$i]->question ?></h3>
                        <?php 
                            
                            for($j=0 ; $j<count($file[$i]->reponse) ; $j++){
                                ?>
                                <input class="inp" value="" type="radio" name="radio<?= $i+$j ?>" <?php if($file[$i]->reponse[$j]->bon_resultat == "on"){ echo "checked";} ?>>
                                <label for="radio<?= $j ?>"><strong><?= $file[$i]->reponse[$j]->valeur ?></strong></label> <br>
                                <?php
                            }
                        ?>
                        </div>
                    <?php
                }
                if($file[$i]->type == "choixmultiple"){
                    ?>
                        <div class="reponse">
                        <h3 class="question"><?= ($i+1).".".$file[$i]->question ?></h3>
                        <?php 
                            
                            for($j=0 ; $j<count($file[$i]->reponse) ; $j++){
                                ?>
                                <input class="inp" type="checkbox" name="checkbox<?= $i+$j ?>" <?php if($file[$i]->reponse[$j]->bon_resultat == "on"){ echo "checked";} ?>>
                                <label for="checkbox<?= $j ?>"><strong><?= $file[$i]->reponse[$j]->valeur ?></strong></label> <br>
                                <?php
                            }
                        ?>
                        </div>
                    <?php
                }
            }
        ?>
    </div>
    <div class="suivant">
        <div class="link-suivant"><a href="#">Suivant</a></div>
    </div>

    

<script>
    const inputs=document.getElementsByTagName("input");
    for(input of inputs){
        input.addEventListener("keyup",function(e){
            if (e.target.hasAttribute("error")) {
                var  idDivError=e.target.getAttribute("error");
                document.getElementById(idDivError).innerText=""
            }
        })
    }
    document.getElementById("add_name").addEventListener("submit",function(e) {
        const inputs=document.getElementsByTagName("input");
        var error=false;
        for(input of inputs){
            if (input.hasAttribute("error")) {
                var  idDivError=input.getAttribute("error");
            if (!input.value) {
                    document.getElementById(idDivError).innerText="Ce champ est obligatoire"
                    error=true
                }
                
            }
            
        }
        if (error) {
            e.preventDefault();
            return false;
        }
        
    })

</script>
