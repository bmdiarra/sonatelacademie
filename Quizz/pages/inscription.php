<script type='text/javascript' src='//code.jquery.com/jquery-1.9.1.js'></script>

<script type='text/javascript'>//<![CDATA[
 $(window).load(function(){
     function readURL(input) {
         if (input.files && input.files[0]) {
             var reader = new FileReader();
              
             reader.onload = function (e) {
                 $('#blah').attr('src', e.target.result);
             }
              
             reader.readAsDataURL(input.files[0]);
         }
     }
      
     $("#fichier").change(function(){
         readURL(this);
     });
 });//]]> 
  
 </script>



<form class="inscription" action="" method="post" id="form-inscription" enctype="multipart/form-data">
        <div class="form-controle">
            <label for="" class="label">Prénom</label>
            <input type="text" class="input-form" error="error-1" name="prenom" id="">
            <div class="error-form" id="error-1"></div>
        </div>
        <div class="form-controle">
            <label for="" class="label">Nom</label>
            <input type="text" class="input-form" error="error-2" name="nom" id="">
            <div class="error-form" id="error-2"></div>
        </div>
        <div class="form-controle">
            <label for="" class="label">Login</label>
            <input type="text" class="input-form" error="error-3" name="login" id="">
            <div class="error-form" id="error-3"></div>
        </div>
        <div class="form-controle">
            <label for="" class="label">Password</label>
            <input type="password" class="input-form" error="error-4" name="password" id="">
            <div class="error-form" id="error-4"></div>
        </div>
        <div class="form-controle">
            <label for="" class="label">Confirmer Password</label>
            <input type="password" class="input-form" error="error-5" name="verifypassword" id="">
            <div class="error-form" id="error-5"></div>
        </div>
        <div class="form-controle avatar" id="div-avatar">
            <label for="" class="avatar-text">Avatar</label>
            <label for="fichier" class="btn-file">Choisir un fichier</label>
            <input type="file" name="fichier" id="fichier">
        </div>
        <div class="form-controle submitjoueur">
            <input type="submit" value="Créer compte" class="btn-submit" name="btn" id="">
        </div>
        <div class="avat-img"><img class="avatar-img" src="#" id="blah" alt="error" srcset=""></div>
        <label for="" id="avatar-texte">Avatar du Joueur</label>
    </form>




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
    document.getElementById("form-inscription").addEventListener("submit",function(e) {
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