<?php
    session_start();
    $log=$_SESSION['login'];
    echo 'BIENVENUE '." ".$log." ".'DIALLO SUR LA PLATFORME D\'EDITION DES QUESTIONNAIRES ';
    
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<title>adminquestion</title>
</head>
<body>
        <form method="post" action="adminquestion.php" id="aly">
        <p>
            <label for="questions">Questions</label>
            <textarea name="questions" id="questions" rows="10" cols="50"></textarea>
        </p>
        <p>
            <label for="login"> Score</label>
            <input type="number" name="login"/><br><br>
        </p>
        <p>
            <label for="choix">Type</label><br />
            <select name="choix" id="choix">
            <option value="Choix multiple">Choix multiple</option>
            <option value="Choix simple">Choix simple</option>
            <option value="Choix texte">Choix texte</option>
            </select>
        </p>
        <p>
            <label for="rep">NBRE REPONSE</label>
            <input onclick="addinput()" type="text" name="rep" placeholder="Ex:3" /><br><br>
        </p>
        </form>


                            
      


<script>
    //code javascript
    function addinput(){
        i=1;
        var form = document.getElementById("aly"); //le noeud parent
        var input = document.createElement('input');  //creation de l'element
            input.setAttribute('id','menu'+i)
            input.setAttribute('type','text');
            form.appendChild(input);
        }
</script>
</body>
</html>