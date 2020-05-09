<?php
    $tab =  [24,32,15,85,22,15,24,26,25,24,26];
    define("NOMBREVALEURPARPAGE",2);
    $totalevaleur = count($tab);
    $nbrePages = ceil($totalevaleur/NOMBREVALEURPARPAGE);
    //echo $nbrePages;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<?php

    if(isset($_GET['page'])){
        $pageActuelle = $_GET['page'];
        if($pageActuelle > $nbrePages){
            $pageActuelle = $nbrePages;
        }
    }else{
        $pageActuelle = 1;
    }

    $indiceDepart = ($pageActuelle - 1) * NOMBREVALEURPARPAGE ;
    $indiceDeFin  = $indiceDepart + NOMBREVALEURPARPAGE - 1 ;

    for($i = $indiceDepart ; $i <= $indiceDeFin ; $i++ ){
        echo $tab[$i]." ";
    }

    for($page=1 ; $page <= $nbrePages ; $page++){
        echo '<a href="pagination.php?page='.$page.'">['.$page.']</a>';
    }
?>
    
</body>
</html>



 <!--    Questionnaire dynamique   -->
 <html>  
      <head>  
           <title>Dynamically Add or Remove input fields in PHP with JQuery</title>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
      </head>  
      <body>  
           <div class="container">  
                <br />  
                <br />  
                <div class="form-group">  
                     <form name="add_name" id="add_name">  
                          <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                               <input type="button" name="submit" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 $(document).ready(function(){  
      var i=1;  
      $('#add').click(function(){  
           i++;  
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');  
      });  
      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
      });  
      $('#submit').click(function(){            
           $.ajax({  
                url:"name.php",  
                method:"POST",  
                data:$('#add_name').serialize(),  
                success:function(data)  
                {  
                     alert(data);  
                     $('#add_name')[0].reset();  
                }  
           });  
      });  
 });  
 </script>

<!--    Questionnaire dynamique   -->



[

{
    "id"        : 0,
    "question" : "",
    "type"      : "",
    "reponse"   : [
        {
            "id"           : 0,
            "valeur"       : "la valeur de la reponse",
            "bon_resultat" : ""
        }
    ],
    "point"     : 5
},
{
    "id"        : 0,
    "question" : "",
    "type"      : "",
    "reponse"   : [
        {
            "id"           : 0,
            "valeur"       : "la valeur de la reponse",
            "bon_resultat" : ""
        },
        {
            "id"           : 1,
            "valeur"       : "la valeur de la reponse",
            "bon_resultat" : ""
        }
    ],
    "point"     : 3
}
]


[
                                   "id"     => $j+1,
                                   "valeur" => $_POST['rep2'],
                                   "bon_resultat" => $_POST['in2']
                                   ],
                                   [
                                        "id"     => $j+1,
                                        "valeur" => $_POST['rep3'],
                                        "bon_resultat" => $_POST['in3']
                                   ],
                                   
                                   [
                                        "id"     => $j+1,
                                        "valeur" => $_POST['rep4'],
                                        "bon_resultat" => $_POST['in4']
                                   ]


                                   [{"login":"admin","mdp":"admin","role":"admin","prenom":"moussa","nom":"DIARRA","score":0,"image":"bmd.jpeg"},
 {"login":"joueur","mdp":"joueur","role":"joueur","prenom":"bmd","nom":"DIARRA","score":10,"image":"bmd.jpeg"},
 {"login":"iboud","mdp":"d","role":"joueur","prenom":"Ibou","nom":"DIATTA","score":30,"image":"om.png"},
 {"login":"alyn","mdp":"a","role":"joueur","prenom":"Aly","nom":"Niang","score":20,"image":"tony3.png"},
 {"login":"salioum","mdp":"m","role":"joueur","prenom":"Saliou","nom":"Mbaye","score":100,"image":"om.png"},
 {"login":"khadyd","mdp":"k","role":"joueur","prenom":"Khady","nom":"DIOUF","score":80,"image":"tony1.png"},
 {"login":"moussas","mdp":"m","role":"joueur","prenom":"Moussa","nom":"Sow","score":90,"image":"om.png"},
 {"login":"youssoum","mdp":"y","role":"joueur","prenom":"Youssou","nom":"Mboup","score":50,"image":"tony1.png"},
 {"login":"djibyn","mdp":"d","role":"joueur","prenom":"Djiby","nom":"Niang","score":70,"image":"tony1.png"},
 {"login":"astoud","mdp":"a","role":"joueur","prenom":"Astou","nom":"DIENG","score":60,"image":"om.png"}]