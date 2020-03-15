
<?php 
session_start();
?>

<!DOCTYPE html>
<html>
<head>
   <title>Formulaires</title>
   <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
   <link rel="stylesheet" href="style.css">
   <link href="https://fonts.googleapis.com/css?family=Inter&display=swap" rel="stylesheet">
</head>
<body>
        <div>
        <nav>
            <ul>
                <li class="deroulant"><a href="?exo=1">Exercice 1</a></li>
                <li class="deroulant"><a href="?exo=2">Exercice 2</a></li>
                <li class="deroulant"><a href="?exo=3">Exercice 3</a></li>
                <li class="deroulant"><a href="?exo=4">Exercice 4</a></li>
                <li class="deroulant"><a href="?exo=5">Exercice 5</a></li>
                <li class="deroulant"><a href="?exo=6">Application 1</a></li>
                <li class="deroulant"><a href="?exo=7">Application 2</a></li>
                <li class="deroulant"><a href="?exo=8">Mini Projet </a></li>
            </ul>
        </nav>
        </div>

        <div height="700px" width="700px">

            <?php 
            if(!empty($_SESSION['page'])){
                echo "SESSION : ".$_SESSION['page'];
                if($_SESSION['page']==1){ include("Miniprojet1.php");}
                if($_SESSION['page']==0){ include("MiniProjet.php");}
            }
            if(isset($_GET['exo'])){
                $exo = $_GET['exo'];
                if( $exo == 1){ include("Exercice_1.php");}
                elseif($exo == 2){ include("Exercice_2.php");}
                elseif($exo == 3){ include("Exercice_3.php");}
                elseif($exo == 4){ include("Exercice_4.php");}
                elseif($exo == 5){ include("Exercice_5.php");}
                elseif($exo == 6){ include("Application_1.php");}
                elseif($exo == 7){ include("Application_2.php");}
                elseif($exo == 8){ include("MiniProjet.php");}

            }


            ?>
        </div>
</body>
</html>