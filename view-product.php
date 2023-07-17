<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<script src="https://code.jquery.com/jquery-1.10.2.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<!--
<script>
//gestione della posizione dello scroll nel caso ci isa un refresh

    document.addEventListener("DOMContentLoaded", function(event) { 
        var scrollpos = localStorage.getItem('scrollpos');
        if (scrollpos) window.scrollTo({top: scrollpos,behavior: "smooth",});
    });

    window.onbeforeunload = function(e) {
        localStorage.setItem('scrollpos', window.scrollY);
    };

</script>

<script>
    $(document).ready(function() {
        $('a[href^="http://localhost/Clothe-u_Finale/?page=view-product.php&id="]').on('click',function (e) {
            e.preventDefault();

            var target = this.hash;
            var $target = $(target);

            $('html, body').stop().animate({
                'scrollTop': $target.offset().top
            }, 1000, 'swing', function () {
                window.location.hash = target;
            });
        });
    });
</script>
-->

<?php 
    //calcola il numero di prodotti già inseriti nel carrello di una determiata taglia e modello
    function disponibilitacarrello($productId,$size,$inizio,$fine){
        $query = "SELECT quantita FROM prod_carrello WHERE prod_carrello.inizio >= '$inizio' 
        AND prod_carrello.fine <= '$fine' AND prod_carrello.id_prodotto = '$productId'
        AND prod_carrello.taglia = '$size'";
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $result = mysqli_query($conn, $query);
        $row = mysqli_fetch_array($result);
        if ($row == NULL){
            return 0;
        }else{
            return $row['quantita'];
        }
        
      }

    //ritorna il numero di singoli prodotti disponibili in magazzino di una determinato modello e taglia in un certo periodo
    function disponibilita($productId,$size,$inizio,$fine){
        $query = "SELECT * FROM magazzino WHERE magazzino.codice NOT IN 
        (SELECT id_prod_magazzino FROM prod_ordine WHERE prod_ordine.inizio >= '$inizio' AND prod_ordine.fine <= '$fine') 
        AND modello = '$productId' AND taglia = '$size'";
        
        $conn = mysqli_connect(DB_HOST,DB_USER,DB_PASS,DB_NAME);
        $result = mysqli_query($conn, $query);
        $num_rows = mysqli_num_rows($result);
        return $num_rows;
      }

    //crea variabili per informazioni sul prodotto e aggiunge al carrello il prodotto selezionato. Crea anche il carrello se non esistente
    if (isset($_POST['aggiungi_al_c'])){
        $productId = $_POST['id'];
        $size = $_POST['taglia'];
        $inizio = $_POST['inizio'];
        $fine = $_POST['fine'];
        $cm = new CartManager();
        $cartId = $cm->getCurrentCartId();
        $cm ->addtoCart($cartId,$productId,$size,$inizio,$fine);
        $_SESSION['inizio'] = $_POST['inizio']; 
        $_SESSION['fine'] = $_POST['fine'];
        echo "<meta http-equiv='refresh' content='0'>";
    }
    if (isset($_POST['vedi_disp'])){
        $_SESSION['inizio'] = $_POST['inizio']; 
        $_SESSION['fine'] = $_POST['fine'];
        $_SESSION['slider'] = ['10','250'];
    }
    // crea variabile prodotto su id
    $id = trim($_GET['id']);
    $pm = new ProductManager();
    $product = $pm->get($id);
    if (!(property_exists($product,'id'))){
        echo "<script>location.href = '".ROOT_URL."';</script>";
        exit;
    }
    
?>

<?php if(isset($_GET['taglia']) ){
    $taglia = $_GET['taglia'];
    echo "
    <style>
        #".$taglia."{
            border: rgb(98 80 80) solid 2px;
            background-color: rgb(195 94 104);
            border-radius: 10px;
            margin-top: 5px;
            color: white;
            margin-left: 7px;
            width: 80px;
        }
    </style>
    ";} 
?>
<link rel="stylesheet" href="../Clothe-u_Finale/css/stylePaginaP.css">
<section class="sproduct">
    <div class = "sinistra">
        <div class = "contenitoreimmagini">
            <div class="immagine">
                <img src="<?php echo $product->foto?>" id="MainImg" alt="">
            </div>
            <hr>
            <div class="small-img-group">
                <div class="small-img">
                    <img src="<?php echo $product->foto?>" onclick="showImg(this.src)" class = "small-img" alt="">
                </div>
                <div class="small-img">
                    <img src="<?php echo $product->foto2?>" onclick="showImg(this.src)" class = "small-img" alt="">
                </div>
                <div class="small-img">
                    <img src="<?php echo $product->foto3?>" onclick="showImg(this.src)" class = "small-img" alt="">
                </div>
            </div>
        </div>
        <hr>
        <div class="dettagli">Dettagli prodotto:</div>
        <div class="descrizione"> <d><?php echo $product->descrizione?></d></div>
    </div>
    <div class = "right">
        <div class="indirizzo" >Home > Prodotti > <?php echo $product->categoria?></div>
        <hr>
        <div class = "nomep"> <?php echo $product->nome?> </div> 
        <div class = "marca"> <?php echo $product->marca?> </div>  
        <hr>
        <div class="prezzo">Prezzo  :<?php echo "<div class = 'costo'>  $ ".$product->prezzo."</div>"?>  / al giorno</div>  
        <div class="container1">
            <?php
            if (!isset($_SESSION["inizio"]) && !isset($_SESSION["fine"])){
                echo "<div class = 'messaggio'> Seleziona un periodo per conoscere la disponibilità.</div>";
            }
            ?>
            <n>Taglia:</n>
            <div class = "taglia" >  
                <?php 
                //inserimento dei bottoni per la taglia a seconda della disponibilità
                    if (!isset($_SESSION["inizio"]) && !isset($_SESSION["fine"])){
                        echo "<button id = 'b38' value = '38' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>38</button>";
                        echo "<button id = 'b39' value = '39' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>39</button>";
                        echo "<button id = 'b40' value = '40' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>40</button>";
                        echo "<button id = 'b41' value = '41' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>41</button>";
                        echo "<button id = 'b42' value = '42' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>42</button>";
                        echo "<button id = 'b43' value = '43' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>43</button>";
                        echo "<button id = 'b44' value = '44' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>44</button>";
                        echo "<button id = 'b45' value = '45' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>45</button>";
                    }
                    elseif($_SESSION["inizio"] ==[] && $_SESSION["fine"] == []){
                        echo "<button id = 'b38' value = '38' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>38</button>";
                        echo "<button id = 'b39' value = '39' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>39</button>";
                        echo "<button id = 'b40' value = '40' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>40</button>";
                        echo "<button id = 'b41' value = '41' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>41</button>";
                        echo "<button id = 'b42' value = '42' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>42</button>";
                        echo "<button id = 'b43' value = '43' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>43</button>";
                        echo "<button id = 'b44' value = '44' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>44</button>";
                        echo "<button id = 'b45' value = '45' class = 'numeroscarpa' onclick='aggiorna(this.id)' disabled>45</button>";
                    } else {
                        if (disponibilita($id,'38',$_SESSION["inizio"],$_SESSION["fine"]) - disponibilitacarrello($id,'38',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b38' value = '38' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>38</button>";
                        }
                        else{
                            echo "<button id = 'b38' value = '38' class = 'numeroscarpa' onclick='aggiorna(this.id)'>38</button>";
                        }
                        if (disponibilita($id,'39',$_SESSION["inizio"],$_SESSION["fine"])- disponibilitacarrello($id,'39',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b39' value = '39' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>39</button>";
                        }
                        else{
                            echo "<button id = 'b39' value = '39' class = 'numeroscarpa' onclick='aggiorna(this.id)'>39</button>";
                        }
                        if (disponibilita($id,'40',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b40' value = '40' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>40</button>";
                        }
                        else{
                            echo "<button id = 'b40' value = '40' class = 'numeroscarpa' onclick='aggiorna(this.id)'>40</button>";
                        }
                        if (disponibilita($id,'41',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b41' value = '41' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>41</button>";
                        }
                        else{
                            echo "<button id = 'b41' value = '41' class = 'numeroscarpa' onclick='aggiorna(this.id)'>41</button>";
                        }
                        if (disponibilita($id,'42',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b42' value = '42' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>42</button>";
                        }
                        else{
                            echo "<button id = 'b42' value = '42' class = 'numeroscarpa' onclick='aggiorna(this.id)'>42</button>";
                        }
                        if (disponibilita($id,'43',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b43' value = '43' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>43</button>";
                        }
                        else{
                            echo "<button id = 'b43' value = '43' class = 'numeroscarpa' onclick='aggiorna(this.id)'>43</button>";
                        }
                        if (disponibilita($id,'44',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b44' value = '44' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>44</button>";
                        }
                        else{
                            echo "<button id = 'b44' value = '44' class = 'numeroscarpa' onclick='aggiorna(this.id)'>44</button>";
                        }
                        if (disponibilita($id,'45',$_SESSION["inizio"],$_SESSION["fine"]) == 0){
                            echo "<button id = 'b45' value = '45' class = 'numeroscarpa' disabled style='color:white;background-color: #a1a1a1;border-color: #727272;'>45</button>";
                        }
                        else{
                            echo "<button id = 'b45' value = '45' class = 'numeroscarpa' onclick='aggiorna(this.id)'>45</button>";
                        }
                    }                     
                ?>
            </div>
        </div>
        <div class="dettagli2">Dettagli prodotto:</div>
        <div class="descrizione2"> <d><?php echo $product->descrizione?></d></div>
        <script>

        /////disabilita bottoni se non c'è dispinibilita
            function controlButton($size) {
                if (disponibilita($id,$size,$_SESSION["inizio"],$_SESSION["fine"]) = 0) {
                    return true;
                } else {
                    return false;
                }
            }
            var buttons = document.getElementsByClassName("numeroscarpa");
            for (var i = 0; i < buttons.length; i++) {
                if (controlButton(buttons[i].value)){
                        buttons[i].disabled = true;
                    }else{
                        buttons[i].disabled = false;
                    }
                };
            
        </script>
        
        <!--<div class = "quantita">
            <n> Quantità:</n>
            <input name = "quan" type="number" value = "1">
        </div>-->
        <div class="btnshopping">
            <form method = "post" class ="periodo" > 
                <b>Periodo del noleggio<br></b>
                <div class = "scritta">
                    <small > Inserisci inizio e fine</small>
                </div>
                <div class = "noleggio-inizio">
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
                </div> 
                <div class = "noleggio-fine">
                    <label for="fine"> A: </label>
                    <input type="date" id="fine" min="<?php echo $tomorrow2?>" onchange="setRequired()" name="fine" value = "<?php echo isset($_SESSION['fine']) ? $_SESSION['fine'] : $tomorrow2 ?>"> 
                </div>
                <script>
                    //gestione degli input di tipo date
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

                    //setta valori minimi e mazzimi per inizio e fine noleggio
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
                </script>
                <input name ="id" type = "hidden" value ="<?php echo $product->id?>">
                <input name ="taglia" id = "formtaglia" type = "hidden" >
                <?php
                //aggounta dei bottoni per aggiunta al carrello o controllo della disponibilità a seconda dei casi
                    if (!isset($_SESSION["inizio"]) && !isset($_SESSION["fine"])){
                        echo "<input name = 'vedi_disp' type ='submit' class = 'btndisponibilita' value ='Controlla la disponibilità'>";
                    }elseif($_SESSION["inizio"] ==[] && $_SESSION["fine"] == []){
                        echo "<input name = 'vedi_disp' type ='submit' class = 'btndisponibilita' value ='Controlla la disponibilità'>";
                    }elseif(!isset($_GET['taglia'])){
                        echo "<input name = 'vedi_disp' type ='submit' class = 'btndisponibilita' value ='Controlla la disponibilità'>";
                        echo "<small > Scegli una taglia per aggiungere al carrello</small>";
                    }else{
                        echo "<input name = 'vedi_disp' type ='submit' class = 'btndisponibilita' value ='Controlla la disponibilità'>";
                        echo "<input name = 'aggiungi_al_c' type ='submit' class = 'btncarrello' value ='Aggiungi al carrello'>";
                    }
                ?>
                
            </form>
            <script>
                //prende il valore id dall'URL
                function getParametroDaUrl(nomeParametro) {
                var url = new URL(window.location.href);
                var valore = url.searchParams.get(nomeParametro);
                return valore;
                }

                var id = getParametroDaUrl("taglia");
                let bottone = document.getElementById(id);
                let valore = bottone.value;
                let inputForm = document.getElementById("formtaglia");
                inputForm.setAttribute("value", valore);
            </script>
            
        </div>
    </div>
                
</section>




<!----------inizio script---------------------------->
<!-- mostra le immagini se clickate -->
        <script>
            let immagine = document.querySelector('.immagine img');
            function showImg(pic){
                immagine.src = pic;
            }
        </script>
        
        <script> 
        //gestisce il tasto back
        function aggiorna(id_p) { 
            var button = document.getElementById(id_p);
            history.pushState(null, null, 'http://localhost/Clothe-u_Finale/?page=prodotti.php');
            window.location.href = "<?php echo 'http://localhost/Clothe-u_Finale/?page=view-product.php&id='.$product ->id ?>" + "&taglia=" +button.id;
        }
        
        </script>
        <script>
            
            window.onpopstate = function () {
                
                history.go(1);
            };
        </script>
        
        