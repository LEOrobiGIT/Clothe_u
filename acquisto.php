<link rel="stylesheet" href="../Clothe-u_Finale/css/styleacquisto.css">

<?php
$cm = new CartManager();
$cartId = $cm->getCurrentCartId();
$totale_carrello = $cm->getTotaleCarrello($cartId);
$prod_car = $cm->getProdottiCarrello($cartId);

$userMgr = new UserManager();
$dati_utente = $userMgr->getDatiUtente($_SESSION["user"]);
$dati = $dati_utente[0];
//gestione del submit per l'ordine
if (isset($_POST['ordina'])){
    $id_utente = $_SESSION["user"];
    $nome = $_POST['nome'];
    $cognome =$_POST['cognome'];
    $indirizzo = $_POST['indirizzo'];
    $civico = $_POST['civico'];
    $cap = $_POST['cap'];
    $opzione_spedizione = $_POST['opzione_spedizione'];
    $carta = $_POST['carta'];
    $prod_carrello = $cm->getProd_Carrello($cartId);
    
    $om = new OrderManager();
    $ordineId = $om ->nuovo_ordine($id_utente,$cartId,$nome,$cognome,$indirizzo,$civico,$cap,$opzione_spedizione,$carta);
    foreach($prod_carrello as $item):
        $modello = $item["id_prodotto"];
        $taglia = $item["taglia"];
        $inizio =$item["inizio"];
        $fine =$item["fine"];
        /*echo " Questa è la taglia = ".$taglia;
        echo " Questo è l' id del prodotto(modello) = ".$modello;
        echo " Questo è l' id del carrello = ".$cartId;*/
        //assegnazione di un prodotto in magazzino all'ordine effettivo
        for ($i = 0 ; $i < $item["quantita"]; $i++){ 
            $codice = $om  ->assegnaProdotto($modello,$inizio,$fine,$taglia);
            //crea dell'ordine e svuota carrello
            $om ->addtoProdOrdine($ordineId,$codice,$inizio,$fine);
            $cm->removefromCart($cartId,$modello,$taglia,$inizio,$fine);
        }
    endforeach;
    echo"<div class= 'conferma'> L'acquisto è andato a buon fine.<a href='http://localhost/Clothe-u_Finale/?page=homepagenew.php'>Torna alla home</a></div>";
}

if (isset($_POST['aggiorna_carrello'])){
    $cm = new CartManager();
    $cartId = $cm->getCurrentCartId();
    $productId = $_POST['id'];
    $inizio = $_POST['inizio'];
    $fine = $_POST['fine'];
    $cm ->updateCart($cartId,$productId,$inizio,$fine);
    header("Refresh:0");
}
?>




<div class= "contenitore"> 
    <title>Form Pagamento</title> 
    <div class ="contenitore2">
        <div class ="compila">
        <h2>Compila il form per il pagamento</h2>
            <form class ="form" onsubmit="return validaForm()" method="post" action="" > 
                <label>Nome:</label> 
                <input type="text" name="nome" value = "<?php echo $dati['nome'] ?>" required minlength = "2" maxlength = "50"><br><br> 
                <label>Cognome:</label> 
                <input type="text" name="cognome" value = "<?php echo $dati['cognome'] ?>" required minlength = "2" maxlength = "50"><br><br> 
                <label>Indirizzo:</label> 
                <input type="text" name="indirizzo" value = "<?php echo $dati['indirizzo'] ?>" required minlength = "4" maxlength = "50"><br><br> 
                <label>Civico:</label> 
                <input type="text" name="civico" value = "<?php echo $dati['civico'] ?>" required maxlength = "10"><br><br> 
                <label>CAP:</label> 
                <input type="text" name="cap" value = "<?php echo $dati['cap'] ?>" required minlength = "5" maxlength ="5"><br><br> 
                
                <!--<label>Scegli l'opzione di spedizione:</label><br><br> -->
                <div class = "scelta">
                    <input type="radio" name="opzione_spedizione" value="ritira_punto_raccolta" required >Ritira in un punto di raccolta<br><br> 
                    <input type="radio" name="opzione_spedizione" value="ricevi_casa" required>Ricevi a casa<br><br> 
                </div>
                <label>Carta di credito</label> 
                <input type="text" name="carta" value = "" required minlength = "13" maxlength = "16"><br><br>
                <input type="submit" name = "ordina" value="Paga"> 
            </form> 
        </div>
        <div class="recap">
            <div class = "prodotti">
                <span class="titolo">Il tuo Carrello </span>
                <span class="quantita"><span class ="badge bg-black rounded-pill"><?php echo $totale_carrello['numero_p'] ?></span></span>
                </h4>
                <ul class="gruppo">
                    <?php foreach($prod_car as $item) :?>
                    <li class="nelcarrello">
                        <div class="nomep">
                            <?php echo $item['nome'] ?>
                        </div>
                        <div class = "taglia">
                            <?php echo "Taglia: ".$item['taglia'] ?>
                        </div>
                        <span class="prezzo">  
                            <?php echo "$". $item['prezzo'] ?>
                        </span>
                        <div class = "quantita">
                            <?php echo "x".$item['quantita'] ?>
                        </div>
                        <div class = "colore">
                            <?php echo "".$item['colore'] ?>
                        </div>
                    </li>
                    <form method = "post" class ="periodo"  name = "noleggio"> 
                        <b>Periodo del noleggio<br></b>
                        <div class = "noleggio-inizio">
                            <label for="inizio"> Da: </label>
                            <?php echo $item['inizio'] ?>
                        </div> 
                        <div class = "noleggio-fine">
                            <label for="fine"> A: </label>
                            <?php echo $item['fine'] ?> 
                        </div>
                        <script>
                            
                            //setta valori minimi e mazzimi per inizio e fine noleggio
                            document.getElementById('inizio').addEventListener('change', function() {
                            var inizio = document.getElementById('inizio').value;
                            document.getElementById('fine').min = inizio;
                            });
                            document.getElementById('fine').addEventListener('change', function() {
                            var fine = document.getElementById('fine').value;
                            document.getElementById('inizio').max = fine;
                            });
                        </script>
                        <input name ="id" type = "hidden" value ="<?php echo $item['id_prod_carrello']?>">                       
                        
                    </form>       




                    <?php endforeach; ?>
                </ul>
                <div class = "totale">
                    <div class = "tot">
                        Totale (USD)
                    </div>
                    <div class = "costo" >
                        <sp><strong><?php echo "$".$totale_carrello['costo_totale'] ?></strong></sp>
                    </div>
                </div>
            </div>
            <div class = "costi">

            </div>

        </div>
    </div>
</div>

<script>
  function validaForm() {
    var nome = document.getElementById('nome').value;
    var cognome = document.getElementById('cognome').value;
    var indirizzo = document.getElementById('indirizzo').value;
    var civico = document.getElementById('civico').value;
    var cap = document.getElementById('cap').value;

    var caratteri = /^[a-zA-Z]+$/;
    var numeri = /^[0-9]+$/;

    if (!caratteri.test(nome)) {
      alert('Inserire solo caratteri per il nome');
      return false;
    }
    if (!caratteri.test(cognome)) {
      alert('Inserire solo caratteri per il cognome');
      return false;
    }
    if (!caratteri.test(indirizzo)) {
      alert('Inserire solo caratteri per l\'indirizzo');
      return false;
    }
    if (!numeri.test(civico)) {
      alert('Inserire solo numeri per il civico');
      return false;
    }
    if (!numeri.test(cap)) {
      alert('Inserire solo numeri per il CAP');
      return false;
    }
    

    return true;
  }
</script>