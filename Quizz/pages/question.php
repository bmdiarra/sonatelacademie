
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
           <link rel="stylesheet" href="./public/css/question.css">

<h1 class="titrelistequestion">PARAMETREZ VOS QUESTION</h1>


    <div class="container">  
                <br />  
                <br />  
                <div class="form-group">  
                     <form action="" name="add_name" method="post" id="add_name" enctype="multipart/form-data">  

                     <label for="question">Question</label>
                            <input class="question" type="text" error="error-1" name="question">
                            <div class="error-form" id="error-1"></div>
                            <label for="nbpoint">Nbre de points</label>
                            <input class="nbpoint" type="number" error="error-2" name="nbpoint">
                            <div class="error-form" id="error-2"></div>
                            
                                   <div class="table-responsive">  
                                   <table class="table ">
                                   <tr>  
                                         <td><!--input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /-->
                                            <select name="type" id="type" error="error-3" class="form-control name_list">
                                                <option>Type de reponse</option>
                                                <option value="choixtexte">choix texte</option>
                                                <option value="choixsimple">choix simple</option>
                                                <option value="choixmultiple">choix multiple</option>
                                           </select>     
                                           <div class="error-form" id="error-3"></div>  
                                        </td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>
                                    </table>

                               <table class="table" id="dynamic_field">  
                                      
                               </table>  
                               <input type="submit" name="envoyer" id="submit" class="btn btn-info" value="Submit" />  
                          </div>  
                     </form>  
                </div>  
           </div>

   <?php
     if(isset($_POST['envoyer'])){
          if($_POST['nbpoint'] >= 1){
               $comp=$_POST['comp'];
               $i = 0;
               //$j = 0;
               $file=json_decode(file_get_contents('./data/question.json'));
               
               $extra = array(
                    "id" => (($file[(count($file)-1)]->id)+1) ,
                    "question"   => $_POST['question'],
                    "type"  => $_POST['type'],
                    "reponse"=> array(),
                    "point" => $_POST['nbpoint']
                );
                for( $j=0 ; $j< ($comp-1) ; $j++){
                     if(isset($_POST['rep'.($j+2)])){
                         $extra["reponse"][$j]["id"] = $j ;
                         $extra["reponse"][$j]["valeur"] = $_POST['rep'.($j+2)] ;
                     }
                     if(isset($_POST['in'.($j+2)])){
                         $extra["reponse"][$j]["bon_resultat"] = $_POST['in'.($j+2)] ;
                     }else{
                         $extra["reponse"][$j]["bon_resultat"] = "off" ;
                     }
               }
                $file[] = $extra ;
                $json_data = json_encode($file);
                
                file_put_contents('./data/question.json', $json_data);
        
          }else{
               echo "Nbre de point insuffisant";
          }
     }
   ?>        


<script>  
var i=1;
 $(document).ready(function(){  
      //var i=1;  
      $('#add').click(function(){  
           i++;
           //console.log(document.getElementById('type').value);
           //$('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" name="name[]" placeholder="Reponse" class="form-control name_list" /><input class="radio" style="margin: 3px 20px 0px 20px;" type="radio"/></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button></td></tr>');
           if(document.getElementById('type').value == 'choixsimple'){  
               
           $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" error="error-4'+i+'" name="rep'+i+'" placeholder="Reponse" class="form-control name_list" /><input class="radio" name="in'+i+'" style="margin: 3px 20px 0px 20px;" type="radio"/><div class="error-form" id="error-4'+i+'"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button><input id="prodId" name="comp" type="hidden" value="'+i+'"></td></tr>');  
           }
           if(document.getElementById('type').value == 'choixmultiple'){
            
            $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" error="error-5'+i+'" name="rep'+i+'" placeholder="Reponse" class="form-control name_list" /><input class="checkbox" name="in'+i+'" style="margin: 3px 20px 0px 20px;" type="checkbox"/><div class="error-form" id="error-5'+i+'"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button><input id="prodId" name="comp" type="hidden" value="'+i+'"></td></tr>');  
           }
           if(document.getElementById('type').value == 'choixtexte'){
            console.log(i);
            if(i == 2){
                   
                   $('#dynamic_field').append('<tr id="row'+i+'"><td><input type="text" error="error-6'+i+'" name="rep'+i+'" placeholder="Reponse" style="heigth: 50px;" class="form-control name_list" /><div class="error-form" id="error-6'+i+'"></div></td><td><button type="button" name="remove" id="'+i+'" class="btn btn-danger btn_remove">X</button><input id="prodId" name="comp" type="hidden" value="'+i+'"></td></tr>');
               }
               if(i>2){alert('Un seule champ texte pour le type de texte');}
            }
      });  

      $(document).on('click', '.btn_remove', function(){  
           var button_id = $(this).attr("id");   
           $('#row'+button_id+'').remove();  
           i=i-1;
           console.log(i);
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

 var reponse = document.getElementById("dynamic_field");
    var a = document.getElementById("type");
    a.addEventListener("change",function(){
        reponse.innerHTML="";
        i=1;
    })
 </script>

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

