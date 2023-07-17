<link rel="stylesheet" href="../Clothe-u_Finale/css/styleProdotti.css"> 

<?php 
//var_dump($_SESSION);
$productMgr = new ProductManager();

/*if(!empty($_POST['colore'])){
  foreach($_POST['colore'] as $colore){
    echo "value : ".$colore.'<br/>';
  }
}
if(!empty($_POST['brand'])){
  foreach($_POST['brand'] as $marca){
    echo "value : ".$marca.'<br/>';
  }
}
if(!empty($_POST['slider'])){
  foreach($_POST['slider'] as $prezzo){
    echo "value : ".$prezzo.'<br/>';
  }
}
*/
$_SESSION["no_filtro"]=true;
//memorizza nella sessione i parametri del filtro
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  if (!empty($_POST['colore'])){
    $_SESSION['colore'] = $_POST['colore']; 
  }elseif(!empty($_POST['colore2'])){
    $_SESSION['colore'] = $_POST['colore2'];
  }else{
    $_SESSION['colore'] = [];
  }
  if (!empty($_POST['brand'])){
    $_SESSION['brand'] = $_POST['brand']; 
  }elseif(!empty($_POST['brand2'])){
    $_SESSION['brand'] = $_POST['brand2'];
  }else{
    $_SESSION['brand'] = [];
  }
  if (!empty($_POST['fine'])){
    $_SESSION['inizio'] = $_POST['inizio']; 
    $_SESSION['fine'] = $_POST['fine'];
  }elseif(!empty($_POST['fine2'])){
    $_SESSION['inizio'] = $_POST['inizio2']; 
    $_SESSION['fine'] = $_POST['fine2'];
  }else{
    $_SESSION['inizio'] = [];
    $_SESSION['fine'] = [];
  } 
  if (!empty($_POST['slider'])){
    $_SESSION['slider'] = $_POST['slider'];
  }else{
    $_SESSION['slider'] = $_POST['slider2'];
  }
}

//metto i valori del filtro nelle variabili
$colori = [];
$marche = [];
$prezzi= ['',''];

if (isset($_SESSION['colore'])) {
  $colori = $_SESSION['colore'];
}
if (isset($_SESSION['brand'])) {
  $marche = $_SESSION['brand'];
}
if (isset($_SESSION['slider'])) {
  $prezzi = $_SESSION['slider'];
}
//altre variabili con valori del filtro presi dalla sessione
if (isset($_SESSION['colore']) || isset($_SESSION['brand'])|| isset($_SESSION['slider']) || isset($_SESSION['inizio'])||isset($_SESSION['fine'])){
  if (!empty($_SESSION['colore'])){
    $filtro_colori = $_SESSION['colore']; 
  }else{
    $filtro_colori = [];
  }
  if (!empty($_SESSION['brand'])){
    $filtro_brand = $_SESSION['brand']; 
  }else{
    $filtro_brand = [];
  }
  if (!empty($_SESSION['slider'])){
    $filtro_prezzo = $_SESSION['slider']; 
  }else{
    $filtro_prezzo = [];
  }
  if (!empty($_SESSION['inizio'])){
    $filtro_inizio = $_SESSION['inizio']; 
    $_SESSION["no_filtro"]=false;
  }else{
    $filtro_inizio = [];
  }
  if (!empty($_SESSION['fine'])){
    $filtro_fine = $_SESSION['fine']; 
    $_SESSION["no_filtro"]=false;
  }else{
    $filtro_fine = [];
  }
  $products = $productMgr->getFiltered($filtro_colori,$filtro_brand,$filtro_prezzo,$filtro_inizio,$filtro_fine);
}else{
  $products = $productMgr->getAll();
  $_SESSION["no_filtro"]=true;
}

//gestione dei submit

if(isset($_POST['submitForms'])){
  if(!empty($_POST['brand']) || !empty($_POST['slider']) || !empty($_POST['colore']) || !empty($_POST['fine'])){
    if (!empty($_POST['colore'])){
      $filtro_colori = $_POST['colore']; 
    }else{
      $filtro_colori = [];
    }
    if (!empty($_POST['brand'])){
      $filtro_brand = $_POST['brand']; 
    }else{
      $filtro_brand = [];
    }
    if (!empty($_POST['slider'])){
      $filtro_prezzo = $_POST['slider']; 
    }else{
      $filtro_prezzo = [];
    }
    if (!empty($_POST['inizio'])){
      $filtro_inizio = $_POST['inizio']; 
    }else{
      $filtro_inizio = [];
    }
    if (!empty($_POST['fine'])){
      $filtro_fine = $_POST['fine']; 
    }else{
      $filtro_fine = [];
    }
    $products = $productMgr->getFiltered($filtro_colori,$filtro_brand,$filtro_prezzo,$filtro_inizio,$filtro_fine);
  }
}
if(isset($_POST['submitForms2'])){
  if(!empty($_POST['brand2']) || !empty($_POST['slider2']) || !empty($_POST['colore2']) || !empty($_POST['fine2'])){
    if (!empty($_POST['colore2'])){
      $filtro_colori = $_POST['colore2']; 
    }else{
      $filtro_colori = [];
    }
    if (!empty($_POST['brand2'])){
      $filtro_brand = $_POST['brand2']; 
    }else{
      $filtro_brand = [];
    }
    if (!empty($_POST['slider2'])){
      $filtro_prezzo = $_POST['slider2']; 
    }else{
      $filtro_prezzo = [];
    }
    if (!empty($_POST['inizio2'])){
      $filtro_inizio = $_POST['inizio2']; 
    }else{
      $filtro_inizio = [];
    }
    if (!empty($_POST['fine2'])){
      $filtro_fine = $_POST['fine2']; 
    }else{
      $filtro_fine = [];
    }
    $products = $productMgr->getFiltered($filtro_colori,$filtro_brand,$filtro_prezzo,$filtro_inizio,$filtro_fine);
  }
}



?> 

<!--- Inizio della pagina -->
<div class ="titolo">Prodotti</div>
<hr>
<div class = bottone_filtro> <button onclick="myFunction();">Filtra</button></div>
<div class= "contenitore"> 
  <!-- parte sinistra ---------->
  <?php include 'filtri.php' ?>
  <!-- insieme dei prodotti destra-->    
  <div class = "destra">
    <?php 
    if ($_SESSION["no_filtro"] == true){
      echo "
      <div class = 'messaggio'> Non è selezionato nessun filtro sul periodo del noleggio</div>
      ";
    }
    ?>
    <button id="myButton">Filtra</button>
    <!-- pop up filtro se la finestra è piccola --->
    <div id="myPopup">
      <div class= "filtri2">
        <div class="intestazione">
          <div class="testo">Filtri</div>
          <button id="chiudi">Chiudi</button>
        </div>
        <!-- inizio del form per il filtro-->
        <form id="scelte2" method="post" >
          <b>Scelta del prezzo<br></b>
          <div class="slider-prezzo">
          
            <div class="price-content">
              <div>
                <label>Minimo</label>
                <div class ="min_prezzo2">
                  <p>$</p><p id="min-value2"> <?php echo isset($_SESSION['slider']) ? $prezzi[0] : 10; ?></p>
                </div>
              </div>
              <div>
                <label>Massimo</label>
                <div class ="max_prezzo2">
                  <p>$</p><p id="max-value2"> <?php echo isset($_SESSION['slider']) ? $prezzi[1] : 250; ?></p>
                </div>
              </div>
            </div>

            <div class="range-slider">
              <input type="range" id ="min-price2" class="min-price" name ="slider2[]" value="<?php echo isset($_SESSION['slider']) ? $prezzi[0] : 10; ?>" min="10" max="250" step="5">
              <input type="range" id ="max-price2" class="max-price" name = "slider2[]" value="<?php echo isset($_SESSION['slider']) ? $prezzi[1] : 250; ?>" min="10" max="250" step="5" <?php echo $prezzi[1]; ?>>
            </div>
        
          </div>

          <b>Periodo del noleggio<br></b>
          <div class = "in_fin"><small > Inserisci inizio e fine</small></div>
          <div class = "noleggio">
          <?php 
              $month = date('m');
              $day = date('d');
              $year = date('Y');
              $tomorrow = date('Y-m-d', strtotime('+1 days'));
              $today = $year . '-' . $month . '-' . $day;
              $tomorrow2 = date('Y-m-d', strtotime('+2 days'));
            ?>
            <label for="inizio2"> Da: </label>
            <input type="date" id="inizio2" min="<?php echo $tomorrow?>" onchange="setRequired2()" name="inizio" value = "<?php echo isset($_SESSION['inizio']) ? $_SESSION['inizio'] : $today ?>">
            <label for="fine2"> A: </label>
            <input type="date" id="fine2" min="<?php echo $tomorrow2?>" onchange="setRequired2()" name="fine" value = "<?php echo isset($_SESSION['fine']) ? $_SESSION['fine'] : $today ?>">
          </div>

          <b>Scelta del colore<br></b>
          <div class = "insieme_colori">  
            <input class = "col_check" type="checkbox" name="colore2[]" value="Blu" <?php if (in_array('Blu', $colori)) { echo 'checked'; } ?>>Blu<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Rosso" <?php if (in_array('Rosso', $colori)) { echo 'checked'; } ?>>Rosso<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Verde" <?php if (in_array('Verde', $colori)) { echo 'checked'; } ?>>Verde<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Giallo" <?php if (in_array('Giallo', $colori)) { echo 'checked'; } ?>>Giallo<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Arancione" <?php if (in_array('Arancione', $colori)) { echo 'checked'; } ?>>Arancione<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Viola" <?php if (in_array('Viola', $colori)) { echo 'checked'; } ?>>Viola<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Bianco" <?php if (in_array('Bianco', $colori)) { echo 'checked'; } ?>>Bianco<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Nero" <?php if (in_array('Nero', $colori)) { echo 'checked'; } ?>>Nero<br>
            <input class = "col_check" type="checkbox" name="colore2[]" value="Rosa" <?php if (in_array('Rosa', $colori)) { echo 'checked'; } ?>>Rosa<br> 
          </div>

          <b>Scelta del Brand<br></b>
          <div class = "insieme_brand">   
            <input class = "col_check" type="checkbox" name="brand2[]" value="Nike" <?php if (in_array('Nike', $marche)) { echo 'checked'; } ?>>Nike<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="Adidas" <?php if (in_array('Adidas', $marche)) { echo 'checked'; } ?>>Adidas<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="NewBalance" <?php if (in_array('NewBalance', $marche)) { echo 'checked'; } ?>>New Balance<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="Reebok" <?php if (in_array('Reebok', $marche)) { echo 'checked'; } ?>>Reebok<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="Puma" <?php if (in_array('Puma', $marche)) { echo 'checked'; } ?>>Puma<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="Jordan" <?php if (in_array('Jordan', $marche)) { echo 'checked'; } ?>>Jordan<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="DSQUARED2" <?php if (in_array('DSQUARED2', $marche)) { echo 'checked'; } ?>>DSQUARED2<br>
            <input class = "col_check" type="checkbox" name="brand2[]" value="Brooks" <?php if (in_array('Brooks', $marche)) { echo 'checked'; } ?>>Brooks<br>
          </div>

        </form> 

        <script>
        //se viene inserito un solo campo tra inizio e fine anche l'altro diventa required
          function setRequired2() {
            // Verifica se il primo campo è stato compilato
            if (document.getElementById('inizio2').value) {
              // Rendi il secondo campo obbligatorio
              document.getElementById('fine2').required = true;
            } else {
              // Rendi il secondo campo non obbligatorio
              document.getElementById('fine2').required = false;
            }
            if (document.getElementById('fine2').value) {
              // Rendi il secondo campo obbligatorio
              document.getElementById('inizio2').required = true;
            } else {
              // Rendi il secondo campo non obbligatorio
              document.getElementById('inizio2').required = false;
            }
          }

          //imposto il valore minimo e massimo di inizio e fine
          document.getElementById('inizio').addEventListener('change', function() {
          var daraIniziale = document.getElementById('inizio').value;
          var data = new Date(dataIniziale);
          data.setDate(data.getDate() + 1);
          var nuovaData = data.getFullYear() + "-" + ("0" + (data.getMonth() + 1)).slice(-2) + "-" + ("0" + data.getDate()).slice(-2);
          document.getElementById('fine').min = nuovaData;
        });
        document.getElementById('fine').addEventListener('change', function() {
          var dataFinale = document.getElementById('fine').value;
          var data = new Date(dataFinale);
          data.setDate(data.getDate() - 1);
          var nuovaData2 = data.getFullYear() + "-" + ("0" + (data.getMonth() + 1)).slice(-2) + "-" + ("0" + data.getDate()).slice(-2);
          document.getElementById('inizio').max = nuovaData2;
        });
          
          var form2 = document.querySelector('#scelte2');
          var inizio2 = document.getElementById('inizio2');
          var fine2 = document.getElementById('fine2');
          form2.addEventListener('submit', function(e) {
              if (fine2.value < inizio2.value) {
                e.preventDefault();
                alert('La seconda data non può essere minore della prima!');
              }
          });
        </script> 
        <script>
          //script per mostrare i valori degli slider dinamicamente
          const slidermin2 = document.querySelector('#min-price2');
          const slidermax2 = document.querySelector('#max-price2');
          const valoreSlidermin2 = document.querySelector('#min-value2');
          const valoreSlidermax2 = document.querySelector('#max-value2');
          slidermin2.addEventListener('input', function() {
              valoreSlidermin2.textContent = this.value;
            });
          slidermax2.addEventListener('input', function() {
              valoreSlidermax2.textContent = this.value;
          });
        </script>
        <input class = "filtra2" type="button" value="Filtra" onclick="submitForms2()" />
        <script>
          //controllo dei campi obbligatori
          submitForms2 = function(){
          
            let form = document.getElementById("scelte2");
            let requiredFields = form.querySelectorAll('[required]');
            for (let i = 0; i < requiredFields.length; i++) {
              if (requiredFields[i].value === '') {
                alert('Si prega di compilare tutti i campi obbligatori.');
                return false;
              }
            }
            form.submit();
          }
        </script>
    </div>
    </div>

    <script> 
    //mostra i filtri se si preme il pulsante filtra e gestione del tasto chiudi
      const myButton = document.getElementById('myButton'); 
      const closeButton = document.getElementById('chiudi'); 
      const myPopup = document.getElementById('myPopup'); 
      myButton.addEventListener('click', function() { 
        myPopup.classList.add('visible');
      }); 
      closeButton.addEventListener('click', function() { 
        myPopup.classList.remove('visible'); 
      }); 
    </script>
    <script>
      const myPopup = document.getElementById('myPopup');
      function aggiornaVisibilitaElemento() {
        if (window.innerWidth > 768) {
          myPopup.classList.remove('visible');
        } else {
          
        }
      }

      window.addEventListener('resize', aggiornaVisibilitaElemento); // aggiungi l'evento 'resize' alla finestra del browser

      aggiornaVisibilitaElemento(); // verifica la visibilità dell'elemento quando si carica la pagina
    </script>

    <div class="dropdown" id= "dropdown">
      <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
      Ordina per Prezzo
      </button>
      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
        <a class="dropdown-item" >Crescente</a>
        <a class="dropdown-item" >Decrescente</a>
      </div>
    </div>
    
    <div class = "row" id="insieme">
      <?php foreach($products as $product) : ?>
      <div class="card" style="width: 22%;">
        <div class = "resize">
        <a href="<?php echo 'http://localhost/Clothe-u_Finale/?page=view-product.php&id='.$product ->id ?>" ><img src=" <?php echo $product -> foto?>" class="card-img-top" alt="..."></a>
        </div>
        <div class="card-body">
          <div class="card-title"><?php echo $product -> nome?> </div>
          <!--<p class="card-text"><?php echo $product -> descrizione?></p>-->
          <div class="card-text"><div class ="peso"> $ <?php echo $product -> prezzo ?></div> / al giorno</div>
        </div>
        <ul class="list-group list-group-flush">
          <!--<li class="list-group-item"><?php echo $product -> prezzo ?> </li>-->
          <li class="list-group-item">Brand :<?php echo $product -> marca?></li>
          <li class="list-group-item">Colore : <?php echo $product -> colore?></li>
        </ul>
        
      </div>
      <?php endforeach;?>
    </div>
  </div>
</div>

<script>
  //gestione del tasto back
  //window.location.href = "<?php echo 'http://localhost/Clothe-u_Finale/?page=prodotti.php'?>";
  window.onpopstate = function () { 
    history.pushState(null, null, 'http://localhost/Clothe-u_Finale/?page=homepagenew.php');
    history.go(0);
  };
</script>


<script>
  //Jquery per fare l'ordinamento in base al prezzo
  $(document).ready(function() {
  $('.dropdown-item').click(function(){
    var order = $(this).text();
    if (order == 'Crescente') {
      var sorted = $('.card').sort(function(a, b) {
        return $(a).find('.peso').text().localeCompare($(b).find('.peso').text());
      });
      $('#insieme').html(sorted);
    } else if (order == 'Decrescente') {
      var sorted = $('.card').sort(function(a, b) {
        return $(b).find('.peso').text().localeCompare($(a).find('.peso').text());
      });
      $('#insieme').html(sorted);
    }
  });
});
</script>

<script>
//gestione degli slider con scambio
const minSlider = document.getElementById("min-price");
const maxSlider = document.getElementById("max-price");
const minVal = document.getElementById("min-value");
const maxVal = document.getElementById("max-value");

function swapSliderValues() {
  if (parseInt(maxSlider.value) < parseInt(minSlider.value)) {
    const temp = maxSlider.value;
    maxSlider.value = minSlider.value;
    minSlider.value = temp;
  }
  minVal.textContent = minSlider.value;
  maxVal.textContent = maxSlider.value;
}

minSlider.addEventListener("input", swapSliderValues);
maxSlider.addEventListener("input", swapSliderValues);
</script>