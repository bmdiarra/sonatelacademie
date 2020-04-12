
<html>
    <head>
        <?php
            include "fonction_exo3.php";
        ?>
        <?php
        
            $formvalide=false;
            $nombre=0;
            $msg="";
                if(isset($_POST['envoyer']))
                {
                    if(!is_number($_POST['nombre']))
                    {
                        $msg= "veuillez saisir un nombre";
                    }
                    else
                    {   
                        $nombre=$_POST['nombre'];
                        $formvalide=true;
                    }

                }
        ?>
        <meta charset="utf-8" />
        <title>Exo3</title>
    </head>
    <body>



            <h1>Exo3</h1>

            <form action="exercice3.php" method ="POST">
                <label form="num1">Ecrivez le texte :</label><br>
                <input name="nombre" type="text" value=""/><br>
                <?php
                    if($formvalide)
                    {
                        for ($i=1; $i <= $nombre; $i++) 
                        { 
                ?>
                    <input type="text" name="nombre<?php echo $i;?>"><br>
                <?php  
                        }
                    }
                ?>
                <input type="submit" name="envoyer" value="envoyer" />
            </form>


    <?php
    ?>

    </body>
</html>
