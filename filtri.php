<!-- filtro presente nella sezione di sinistra di products.php-->
<div class = "sinistra">
    <div class= "filtri">
      <div class="testo">Filtri</div>
      <!-- inizio del form per il filtro-->
      <form id="scelte" method="post" >
      <b>Scelta del prezzo<br></b>
        <div class="slider-prezzo">
          

          <div class="price-content">
            <div>
              <label>Minimo</label>
              <div class ="min_prezzo">
                <p>$</p><p id="min-value"> <?php echo isset($_SESSION['slider']) ? $prezzi[0] : 10; ?></p>
              </div>
            </div>
            <div>
              <label>Massimo</label>
              <div class ="max_prezzo">
                <p>$</p><p id="max-value"> <?php echo isset($_SESSION['slider']) ? $prezzi[1] : 250; ?></p>
              </div>
            </div>
          </div>

          <div class="range-slider">
            <input type="range" id ="min-price" class="min-price" name ="slider[]" value="<?php echo isset($_SESSION['slider']) ? $prezzi[0] : 10; ?>" min="10" max="250" step="5">
            <input type="range" id ="max-price" class="max-price" name = "slider[]" value="<?php echo isset($_SESSION['slider']) ? $prezzi[1] : 250; ?>" min="10" max="250" step="5" <?php echo $prezzi[1]; ?>>
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
          <label for="inizio"> Da: </label>
          <input type="date" id="inizio" min="<?php echo $tomorrow?>" onchange="setRequired()" name="inizio" value = "<?php echo isset($_SESSION['inizio']) ? $_SESSION['inizio'] : $tomorrow ?>">
          <label for="fine"> A: </label>
          <input type="date" id="fine" min="<?php echo $tomorrow2?>" onchange="setRequired()" name="fine" value = "<?php echo isset($_SESSION['fine']) ? $_SESSION['fine'] : $tomorrow2 ?>">
        </div>

        <b>Scelta del colore<br></b>
        <div class = "insieme_colori">  
          <input class = "col_check" type="checkbox" name="colore[]" value="Blu" <?php if (in_array('Blu', $colori)) { echo 'checked'; } ?>>Blu<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Rosso" <?php if (in_array('Rosso', $colori)) { echo 'checked'; } ?>>Rosso<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Verde" <?php if (in_array('Verde', $colori)) { echo 'checked'; } ?>>Verde<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Giallo" <?php if (in_array('Giallo', $colori)) { echo 'checked'; } ?>>Giallo<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Arancione" <?php if (in_array('Arancione', $colori)) { echo 'checked'; } ?>>Arancione<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Viola" <?php if (in_array('Viola', $colori)) { echo 'checked'; } ?>>Viola<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Bianco" <?php if (in_array('Bianco', $colori)) { echo 'checked'; } ?>>Bianco<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Nero" <?php if (in_array('Nero', $colori)) { echo 'checked'; } ?>>Nero<br>
          <input class = "col_check" type="checkbox" name="colore[]" value="Rosa" <?php if (in_array('Rosa', $colori)) { echo 'checked'; } ?>>Rosa<br> 
        </div>

        <b>Scelta del Brand<br></b>
        <div class = "insieme_brand">   
          <input class = "col_check" type="checkbox" name="brand[]" value="Nike" <?php if (in_array('Nike', $marche)) { echo 'checked'; } ?>>Nike<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="Adidas" <?php if (in_array('Adidas', $marche)) { echo 'checked'; } ?>>Adidas<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="NewBalance" <?php if (in_array('NewBalance', $marche)) { echo 'checked'; } ?>>New Balance<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="Reebok" <?php if (in_array('Reebok', $marche)) { echo 'checked'; } ?>>Reebok<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="Puma" <?php if (in_array('Puma', $marche)) { echo 'checked'; } ?>>Puma<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="Jordan" <?php if (in_array('Jordan', $marche)) { echo 'checked'; } ?>>Jordan<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="DSQUARED2" <?php if (in_array('DSQUARED2', $marche)) { echo 'checked'; } ?>>DSQUARED2<br>
          <input class = "col_check" type="checkbox" name="brand[]" value="Brooks" <?php if (in_array('Brooks', $marche)) { echo 'checked'; } ?>>Brooks<br>
        </div>

      </form> 

      <script>
      //se viene inserito un solo campo tra inizio e fine anche l'altro diventa required
        function setRequired() {
          // Verifica se il primo campo è stato compilato
          if (document.getElementById('inizio').value) {
            // Rendi il secondo campo obbligatorio
            document.getElementById('fine').required = true;
          } else {
            // Rendi il secondo campo non obbligatorio
            document.getElementById('fine').required = false;
          }
          if (document.getElementById('fine').value) {
            // Rendi il secondo campo obbligatorio
            document.getElementById('inizio').required = true;
          } else {
            // Rendi il secondo campo non obbligatorio
            document.getElementById('inizio').required = false;
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
        
        var form = document.querySelector('form');
        var data1 = document.getElementById('inizio');
        var data2 = document.getElementById('fine');
        form.addEventListener('submit', function(e) {
            if (data2.value < data1.value) {
              e.preventDefault();
              alert('La seconda data non può essere minore della prima!');
            }
        });
      </script> 
      <script src="../Clothe-u_Finale/js/sliderscript.js"></script>
      <input class = "filtra" type="button" value="Filtra" onclick="submitForms()" />
      <script>
        //controllo dei campi obbligatori
        submitForms = function(){
        
          let form = document.getElementById("scelte");
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