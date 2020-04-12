
        
        <style>
        
        * {
	margin: 0;
	padding: 0;
	box-sizing: border-box;
	font-family: sans-serif;
}

body {
	background: #F3F3F3;
}


header {
	display: flex;
	justify-content: center;
	align-items: center;
	height: 60px;
	background-color: #EEE;
	box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.2);
}

main {
	display: flex;
	flex-direction: column;
	align-items: center;
}

main .list {
	width: 100%;
	max-width: 768px;
	background-color: #FFF;
	border: 1px solid #CCC;
	margin-top: 25px;
}

main .list .item {
	padding: 17px;
    float: left;
	border-bottom: 1px solid #CCC;
}
main .list .item:last-of-type {
	border-bottom: none;
}
main .list .item:hover {
	background: rgba(0, 0, 0, 0.05);
}



.pagenumbers {
	display: flex;
	flex-wrap: wrap;
	justify-content: center;
	align-items: center;
}

.pagenumbers button {
	width: 50px;
	height: 50px;

	appearance: none;
	border: none;
	outline: none;
	cursor: pointer;

	background-color: #44AAEE;

	margin: 5px;
	transition: 0.4s;

	color: #FFF;
	font-size: 18px;
	text-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
	box-shadow: 0px 0px 4px rgba(0, 0, 0, 0.2);
}

.pagenumbers button:hover {
	background-color: #44EEAA;
}

.pagenumbers button.active {
	background-color: #44EEAA;
	box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.2);
}
        </style>


        
        
        <h2>Exercice 1.<br /></h2>
            
        <br/>
        <p>
Ecrire un programme qui demande une valeur supérieure à 10 000 ensuite garde dans un tableau T1 l’ensemble des nombres premiers comprise entre 1 et la valeur entrée.
Puis créer un dans Tableau associatif T avec les clés inférieur,supérieur . La clé inférieur est associée à l’ensemble des valeurs qui sont inférieures  à la moyenne du tableau et La clé supérieur est associée  l’ensemble des valeurs qui sont supérieurs à la moyenne. (Vous devez créer votre propre fonction moyenne)</p>
        <br/>

        <form action="index.php?exo=1" method="POST">
        <label style="margin: 1% 0% 0% 26%;" for="val">Entrer un valeur superieur a 10000:</label>
        <input type="text" style="margin: 1% 0% 0% 26%;" name="val" value="<?php if(isset($_POST['valider'])){ echo $_POST['val'];} ?>"><br>
        <label style="margin: 1% 0% 0% 26%;" for="statut">Selectionner un statut inferieur ou superieur a la moyenne</label><br/>
                            <select name="statut" class="statut" style="margin: 1% 0% 0% 26%;">
                                <option value="inferieur">inferieur</option>
                                <option value="superieur">superieur</option>
                            </select><br/>
        <input style="margin: 1% 0% 0% 26%;" type="submit" value="Valider" class="valider" name="valider">
    </form>
    <div style="text-align: center;">
        
        <?php
        function est_premier($premier){
            $i = 2;
            while($premier % $i != 0 ){
                $i = $i +1;
            }
            if($i == $premier){
                return 1;
            }else{
                return 0;
            }
        }

        function moyenne( $tab ){
            $somme = 0; $moy; $indice = 0;
            for($i=0 ; $i< count($tab) ; $i++ ){
                $somme = $somme + $tab[$i];
                
            }
            $moy = $somme / $i;
            return $moy;
        }

        if(empty($_POST['val']))
        {
            echo 'Remplissez les parametres du formulaire svp:';
        }else{
                if(isset($_POST['valider'])){
                        
                    $n = $_POST['val'];
                    $premier = array();
                    $k = 0;
                    $T = array("inferieur" => array(),
                               "superieur" => array());
                    
                    if(preg_match("#[0-9]#",$n) && ($n >= 1000))
                    {
                        for($i=2; $i<=$n ; $i++){
                            
                            if( est_premier($i) == 1 ){
                                
                                $premier[$k] = $i ;
                                $k++;
                            }
                        }

                        $moy = moyenne($premier);
                        $l = 0; $m = 0;

                        for($i=0 ; $i < $k; $i++){
                            if( $premier[$i] <= $moy ){
                                $T['inferieur'][$l] = $premier[$i];
                                $l++;
                            }
                            if( $premier[$i] > $moy ){
                                $T['superieur'][$m] = $premier[$i];
                                $m++;
                            }
                        }

                        ?>
                            

                            <header style="margin-top: 25px;">
                                <h1><?= $_POST['statut']." a ".$moy; ?></h1>
                            </header>
                            <main>
                                <div class="list" id="list"></div>
                                <div class="pagenumbers" id="pagination"></div>
                            </main>

                        <?php
                        
                    }else{
                        
                        echo 'svp saisissez des valeurs numeriques';
                        
                    }

            
                    
                }
            }
        ?>

        

        </div>


        <script type="text/javascript">

            var list_items = <?php echo json_encode($T[$_POST['statut']]); ?>;
    

const list_element = document.getElementById('list');
const pagination_element = document.getElementById('pagination');

let current_page = 1;
let rows = 100;

function DisplayList (items, wrapper, rows_per_page, page) {
	wrapper.innerHTML = "";
	page--;

	let start = rows_per_page * page;
	let end = start + rows_per_page;
	let paginatedItems = items.slice(start, end);

	for (let i = 0; i < paginatedItems.length; i++) {
		let item = paginatedItems[i];

		let item_element = document.createElement('div');
		item_element.classList.add('item');
		item_element.innerText = item;
		
		wrapper.appendChild(item_element);
	}
}

function SetupPagination (items, wrapper, rows_per_page) {
	wrapper.innerHTML = "";

	let page_count = Math.ceil(items.length / rows_per_page);
	for (let i = 1; i < page_count + 1; i++) {
		let btn = PaginationButton(i,items);
		wrapper.appendChild(btn);
	}
}

function PaginationButton (page, items) {
	let button = document.createElement('button');
	button.innerText = page;

	if (current_page == page) button.classList.add('active');

	button.addEventListener('click', function () {
		current_page = page;
        
		DisplayList(items, list_element, rows, current_page);
        
		let current_btn = document.querySelector('.pagenumbers button.active');
		current_btn.classList.remove('active');

		button.classList.add('active');
	});

	return button;
}

DisplayList(list_items, list_element, rows, current_page);
SetupPagination(list_items, pagination_element, rows);

        </script>